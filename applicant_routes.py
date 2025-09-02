from flask import Blueprint, request, jsonify, send_from_directory, current_app
from db import get_db_connection
import uuid
import os
import re
import datetime
from werkzeug.utils import secure_filename
from PIL import Image
import mysql.connector
import json
from utils.auth_utils import token_required

applicant_bp = Blueprint('applicant', __name__)


@applicant_bp.route('/applicant_details', methods=['POST'])
@token_required
def submit_cv(current_user):
    try:
        first_name = request.form.get('first_name')
        middle_name = request.form.get('middle_name')
        last_name = request.form.get('last_name')
        email1 = request.form.get('email1')
        mobile_no = request.form.get('mobile_no')
        emergency_mobile_no = request.form.get('emergency_mobile_no')
        date_of_birth = request.form.get('date_of_birth')
        linkedin_url = request.form.get('linkedin_url')
        present_address = request.form.get('present_address')
        permanent_address = request.form.get('permanent_address')
        city = request.form.get('city')
        state = request.form.get('state')
        country = request.form.get('country')
        pin_code = request.form.get('pin_code')
        source = request.form.get('source')
        applicant_status = request.form.get('applicant_status')
        referred_by = request.form.get('referred_by')
        job_applying_for = request.form.get('job_applying_for')
        expected_pay = request.form.get('expected_pay')
        notice_period = request.form.get('notice_period')
        skills = request.form.get('skills')
        marital_status = request.form.get('marital_status')
        language = request.form.get('language')
        current_ctc = request.form.get('current_ctc')
        experience = request.form.get('experience')
        image = request.files.get('image')

        
        try:
            current_ctc_int = int(current_ctc)
            if current_ctc_int <= 0:
                current_ctc = None
            else:
                current_ctc = current_ctc_int
        except (ValueError, TypeError):
            current_ctc = None

        applicant_uuid = str(uuid.uuid4())

        image_filename = ''
        if image:
            ext = os.path.splitext(image.filename)[1].lower()
            unique_name = f"{uuid.uuid4().hex}_{int(datetime.datetime.now().timestamp())}{ext}"
            image_filename = secure_filename(unique_name)
            image_path = os.path.join(current_app.config['UPLOAD_FOLDER'], image_filename)

            img = Image.open(image.stream)
            if img.mode != 'RGB' and ext in ['.jpg', '.jpeg', '.webp']:
                img = img.convert('RGB')

            img.save(image_path, quality=60, optimize=True)

        conn = get_db_connection()
        cursor = conn.cursor()

        query = """
            INSERT INTO applicant_detail (
                uuid, first_name, middle_name, last_name, email1, mobile_no, emergency_mobile_no, date_of_birth, current_ctc,
                linkedin_url, present_address, permanent_address, city, state, country, pin_code, source, applicant_status,
                referred_by, job_applying_for, expected_pay, notice_period, skills, image, marital_status, language, experience
            ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s,
                      %s, %s, %s, %s, %s, %s, %s, %s, %s,
                      %s, %s, %s, %s, %s, %s, %s, %s, %s)
        """

        values = (
            applicant_uuid, first_name, middle_name, last_name, email1, mobile_no, emergency_mobile_no, date_of_birth, current_ctc,
            linkedin_url, present_address, permanent_address, city, state, country, pin_code, source, applicant_status,
            referred_by, job_applying_for, expected_pay, notice_period, skills, image_filename,
            marital_status, language, experience
        )

        cursor.execute(query, values)
        conn.commit()
        inserted_id = cursor.lastrowid

        cursor.close()
        conn.close()

        return jsonify({
            "message": "Data saved successfully",
            "applicant_id": inserted_id,
            "uuid": applicant_uuid
        }), 200

    except Exception as e:
        return jsonify({"error": str(e)}), 500








@applicant_bp.route('/update_score', methods=['POST'])
@token_required
def update_score(current_user):
    applicant_id = request.form.get('id')
    score = request.form.get('score')

    if not applicant_id or score is None:
        return jsonify({'error': 'id and score are required'}), 400

    try:
        conn = get_db_connection()
        cur = conn.cursor()
        cur.execute("UPDATE applicant_detail SET score = %s WHERE id = %s", (score, applicant_id))
        conn.commit()
        affected_rows = cur.rowcount
        cur.close()
        conn.close()

        if affected_rows == 0:
            return jsonify({'message': 'No record found for given id'}), 404

        return jsonify({'message': 'Score updated successfully'}), 200

    except Exception as e:
        return jsonify({'error': str(e)}), 500









#API to store documents

@applicant_bp.route('/documents', methods=['POST'])
@token_required
def submit_doc(current_user):
    try:
        applicant_id = request.form.get('applicant_id')
        document_names = request.form.getlist('Name')  
        documents = request.files.getlist('File')           
                
        if not applicant_id:
            return jsonify({"error": "Applicant ID is required"}), 400

        if not documents or not document_names or len(documents) != len(document_names):
            return jsonify({"error": "Documents and names are required and should match in count"}), 400

        os.makedirs(current_app.config['UPLOAD_FOLDER'], exist_ok=True)

        conn = get_db_connection()
        cursor = conn.cursor()

        inserted_files = []

        for i in range(len(documents)):
            document = documents[i]
            doc_name = document_names[i]

            original_filename = secure_filename(document.filename)
            file_ext = os.path.splitext(original_filename)[1]
            unique_id = str(uuid.uuid4())
            unique_filename = f"{unique_id}{file_ext}"

            document_path = os.path.join(current_app.config['UPLOAD_FOLDER'], unique_filename)
            document.save(document_path)

            query = """
                INSERT INTO document_details (document_name, document_file, applicant_id)
                VALUES (%s, %s, %s)
            """
            values = (doc_name, unique_filename, applicant_id)
            cursor.execute(query, values)
            inserted_files.append(unique_filename)

        conn.commit()
        cursor.close()
        conn.close()

        return jsonify({"message": "All documents saved successfully", "files": inserted_files}), 200

    except Exception as e:
        return jsonify({"error": str(e)}), 500






#API to add work ecperience details

@applicant_bp.route('/work_experience', methods=['POST', 'GET', 'PUT', 'DELETE'])
@token_required
def experience(current_user):
    try:
        conn = get_db_connection()
        cursor = conn.cursor()

        if request.method == 'POST':
            form_data = request.form
            applicant_id = form_data.get('applicant_id')

            
            work_experience_data = {}
            pattern = re.compile(r'work_experience\[(\d+)\]\[(\w+)\]')

            for key in form_data:
                match = pattern.match(key)
                if match:
                    index = int(match.group(1))
                    field = match.group(2)
                    value = form_data.get(key)

                    if index not in work_experience_data:
                        work_experience_data[index] = {}
                    work_experience_data[index][field] = value

            if not work_experience_data:
                return jsonify({'error': 'No valid work experience data received'}), 400

            inserted = []

           
            for index in sorted(work_experience_data):
                work = work_experience_data[index]

                query = """
                    INSERT INTO work_experience_tbl (
                        company_name, employer_type, designation, start_date, end_date, applicant_id
                    ) VALUES (%s, %s, %s, %s, %s, %s)
                """
                values = (
                    work.get('company_name'),
                    work.get('employer_type'),
                    work.get('designation'),
                    work.get('start_date'),
                    work.get('end_date'),
                    applicant_id
                )
                cursor.execute(query, values)
                inserted.append({
                    "company_name": work.get('company_name'),
                    "designation": work.get('designation')
                })

            conn.commit()
            return jsonify({"message": "All experiences saved", "records": inserted}), 200

    except Exception as e:
        print("Error in work_experience:", e)
        return jsonify({"error": "Server error"}), 500

    finally:
        cursor.close()
        conn.close()




 
 
 
 
 

#API to add application details
@applicant_bp.route('/education_details', methods=['POST', 'GET', 'PUT', 'DELETE'])
@token_required 
def education(current_user):
    try:
        conn = get_db_connection()
        cursor = conn.cursor()

        if request.method == 'POST':
            form_data = request.form
            applicant_id = form_data.get('applicant_id')

            
            education_data = {}
            pattern = re.compile(r'educational_qualifications\[(\d+)\]\[(\w+)\]')

            for key in form_data:
                match = pattern.match(key)
                if match:
                    index = int(match.group(1))
                    field = match.group(2)
                    value = form_data.get(key)

                    if index not in education_data:
                        education_data[index] = {}
                    education_data[index][field] = value

            if not education_data:
                return jsonify({'error': 'No valid education data received'}), 400

            
            inserted = []
            for index in sorted(education_data):
                edu = education_data[index]

                query = """
                    INSERT INTO education_detail_tbl (
                        school_college_university, degree_class, year_completed,
                        cgpa_percentage, country, state, city, applicant_id
                    ) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)
                """
                values = (
                    edu.get('school_college_university'),
                    edu.get('degree_class'),
                    edu.get('year_completed'),
                    edu.get('cgpa_percentage'),
                    edu.get('country'),
                    edu.get('state'),
                    edu.get('city'),
                    applicant_id
                )
                cursor.execute(query, values)
                inserted.append({
                    "school_college_university": edu.get('school_college_university'),
                    "degree_class": edu.get('degree_class')
                })

            conn.commit()
            return jsonify({"message": "All education records saved", "records": inserted}), 200

    except Exception as e:
        print("Error in education_details:", e)
        return jsonify({"error": "Server error"}), 500

    finally:
        cursor.close()
        conn.close()

 
      
                
        
        
 #API to add certification details       
        
        
@applicant_bp.route('/certification', methods=['POST'])
@token_required 
def certificate(current_user):
    try:
        conn = get_db_connection()
        cursor = conn.cursor()

        form_data = request.form 
        applicant_id = form_data.get('applicant_id')

        
        certifications = {}
        pattern = re.compile(r'certification\[(\d+)\]\[(\w+)\]')

        for key in form_data:
            match = pattern.match(key)
            if match:
                index = int(match.group(1))
                field = match.group(2)
                value = form_data.get(key)

                if index not in certifications:
                    certifications[index] = {}
                certifications[index][field] = value

        
        inserted = []
        for index in sorted(certifications):
            cert = certifications[index]

            query = """
                INSERT INTO certification_detail_tbl (
                    name, authority, certification_no, issue_date, expiry_date, url, applicant_id
                ) VALUES (%s, %s, %s, %s, %s, %s, %s)
            """
            values = (
                cert.get('name'),
                cert.get('authority'),
                cert.get('certification_no'),
                cert.get('issue_date'),
                cert.get('expiry_date'),
                cert.get('url'),
                applicant_id
            )
            cursor.execute(query, values)
            inserted.append({
                "name": cert.get('name'),
                "certification_no": cert.get('certification_no')
            })

        conn.commit()
        return jsonify({
            "message": "All certifications saved successfully",
            "records": inserted
        }), 200

    except Exception as e:
        print("Error:", e)
        return jsonify({"error": "Server error"}), 500

    finally:
        cursor.close()
        conn.close()        
        
        
        
        



#Contries Data API
#https://hr.infomagine.in/api/countries
#hit this url for list of all countries
    
@applicant_bp.route('/countries',methods=['GET'])
@token_required
def country(current_user):
    try:
        conn = get_db_connection()
        cursor = conn.cursor()
        
        
        cursor.execute("SELECT * FROM tbl_countries")
        rows = cursor.fetchall()
        result = []
        for row in rows:
            result.append({
                'id':row[0],
                'name':row[1],
                'phoneCode':row[2]
            })    
        return jsonify(result), 200
    
        
        
    except Exception as e:
        return jsonify({"error": str(e)}), 500      

    
    finally:
        if cursor:
            cursor.close()
        if conn:
            conn.close

    





#State Data API
#https://hr.infomagine.in/api/state?countryId=(pass here countryID from which country you want states)

@applicant_bp.route('/state', methods=['GET'])
@token_required
def state(current_user):
    try:
        conn = get_db_connection()
        cursor = conn.cursor()

        con_id = request.args.get('countryId')
        if not con_id:
            return jsonify({'error': 'countryId query parameter is required'}), 400

        try:
            con_id = int(con_id)
        except ValueError:
            return jsonify({'error': 'countryId must be a number'}), 400

        cursor.execute("SELECT * FROM tbl_states WHERE countryId = %s", (con_id,))
        rows = cursor.fetchall()  

        if rows:
            result = []
            for row in rows:
                result.append({
                    'id': row[0],
                    'name': row[1],
                    'countryId': row[3]  
                })
            return jsonify(result), 200
        else:
            return jsonify({'message': 'No states found for this country'}), 404

    except Exception as e:
        return jsonify({'error': str(e)}), 500

    finally:
        if cursor:
            cursor.close()
        if conn:
            conn.close()




#Cities Data API
#https://hr.infomagine.in/api/city?stateId=(pass here stateId from which state you want to find cities)


@applicant_bp.route('/city', methods=['GET'])
@token_required
def city(current_user):
    try:
        conn = get_db_connection()
        cursor = conn.cursor()

        state_id = request.args.get('stateId')
        if not state_id:
            return jsonify({'error': 'stateId query parameter is required'}), 400

        try:
            state_id = int(state_id)
        except ValueError:
            return jsonify({'error': 'stateId must be a number'}), 400

        cursor.execute("SELECT * FROM tbl_cities WHERE stateId = %s", (state_id,))
        rows = cursor.fetchall()  

        if rows:
            result = []
            for row in rows:
                result.append({
                    'id': row[0],
                    'name': row[1],
                    'stateId': row[2]  
                })
            return jsonify(result), 200
        else:
            return jsonify({'message': 'No states found for this country'}), 404

    except Exception as e:
        return jsonify({'error': str(e)}), 500

    finally: 
        if cursor:
            cursor.close()
        if conn:
            conn.close()





#API for list view and also of a particular applicant

@applicant_bp.route('/list_view', methods=['GET'])
@applicant_bp.route('/list_view/<int:applicant_id>', methods=['GET'])
@token_required
def get_applicants(current_user, applicant_id=None):
    conn = get_db_connection()
    cursor = conn.cursor(dictionary=True)

    def get_related_data(a_id):
        cursor.execute("SELECT * FROM work_experience_tbl WHERE applicant_id = %s", (a_id,))
        work_exp = cursor.fetchall()

        cursor.execute("SELECT * FROM education_detail_tbl WHERE applicant_id = %s", (a_id,))
        education = cursor.fetchall()

        cursor.execute("SELECT * FROM certification_detail_tbl WHERE applicant_id = %s", (a_id,))
        certifications = cursor.fetchall()

        cursor.execute("SELECT * FROM document_details WHERE applicant_id = %s", (a_id,))
        documents = cursor.fetchall()

        return work_exp, education, certifications, documents

    results = []

    if applicant_id:
        cursor.execute("SELECT * FROM applicant_detail WHERE id = %s", (applicant_id,))
        applicant = cursor.fetchone()

        if not applicant:
            return jsonify({'error': 'Applicant not found'}), 404

        work_exp, education, certifications, documents = get_related_data(applicant_id)

        applicant.update({
            'work_experience': work_exp,
            'education': education,
            'certifications': certifications,
            'documents': documents
        })

        results.append(applicant)

    else:
        cursor.execute("SELECT * FROM applicant_detail ORDER BY id DESC")
        applicants = cursor.fetchall()

        for applicant in applicants:
            a_id = applicant['id']
            work_exp, education, certifications, documents = get_related_data(a_id)

            applicant.update({
                'work_experience': work_exp,
                'education': education,
                'certifications': certifications,
                'documents': documents
            })

            results.append(applicant)

    cursor.close()
    conn.close()

    return jsonify(results)








# API to Edit details of applicant
# API to Edit details of applicant
def generate_unique_filename(filename):
    name, ext = os.path.splitext(filename)
    return f"{name}_{uuid.uuid4().hex[:8]}{ext}"

def delete_file_if_exists(filename):
    if not filename:
        return
    file_path = os.path.join(current_app.config['UPLOAD_FOLDER'], filename)
    if os.path.exists(file_path):
        os.remove(file_path)

def insert_json_array(cursor, table_name, data_array, applicant_id):
    if not isinstance(data_array, list):
        return
    cursor.execute(f"SHOW COLUMNS FROM {table_name}")
    table_columns = [row['Field'] for row in cursor.fetchall() if row['Field'] not in ['id', 'applicant_id']]
    for row in data_array:
        filtered_row = {k: v for k, v in row.items() if k in table_columns}
        if not filtered_row:
            continue
        filtered_row['applicant_id'] = applicant_id
        columns = ', '.join(filtered_row.keys())
        placeholders = ', '.join(['%s'] * len(filtered_row))
        values = tuple(filtered_row.values())
        cursor.execute(f"INSERT INTO {table_name} ({columns}) VALUES ({placeholders})", values)

def insert_documents(cursor, form, files, applicant_id):
    cursor.execute("SELECT document_name, document_file FROM document_details WHERE applicant_id = %s", (applicant_id,))
    existing_docs = cursor.fetchall()
    existing_map = {doc['document_name']: doc['document_file'] for doc in existing_docs if doc.get('document_name')}

    cursor.execute("DELETE FROM document_details WHERE applicant_id = %s", (applicant_id,))
    cursor.execute("SHOW COLUMNS FROM document_details")
    columns = [row['Field'] for row in cursor.fetchall() if row['Field'] not in ['id', 'applicant_id']]

    i = 0
    while True:
        prefix = f'documents[{i}]'
        if not any(f"{prefix}[{col}]" in form or f"{prefix}[{col}]" in files for col in columns):
            break

        data = {}
        doc_name = form.get(f"{prefix}[document_name]", f"Document {i}")
        existing_file = existing_map.get(doc_name)

        for col in columns:
            key = f"{prefix}[{col}]"
            if key in files:
                file = files[key]
                if file and file.filename:
                    incoming_filename = file.filename
                    if existing_file and existing_file != incoming_filename:
                        delete_file_if_exists(existing_file)

                    unique_name = generate_unique_filename(incoming_filename)
                    file_path = os.path.join(current_app.config['UPLOAD_FOLDER'], unique_name)
                    file.save(file_path)
                    data[col] = unique_name
            elif key in form:
                data[col] = form[key]

        if data:
            data['applicant_id'] = applicant_id
            insert_cols = ', '.join(data.keys())
            placeholders = ', '.join(['%s'] * len(data))
            cursor.execute(
                f"INSERT INTO document_details ({insert_cols}) VALUES ({placeholders})",
                tuple(data.values())
            )
        i += 1

@applicant_bp.route('/edit_detail/<int:applicant_id>', methods=['PUT'])
@token_required
def update_applicant(current_user, applicant_id):
    conn = get_db_connection()
    cursor = conn.cursor(dictionary=True)
    try:
        form = request.form
        files = request.files

        cursor.execute("SHOW COLUMNS FROM applicant_detail")
        applicant_columns = [row['Field'] for row in cursor.fetchall() if row['Field'] != 'id']

        update_fields = []
        update_values = []

        for col in applicant_columns:
            
            if col == 'current_ctc' and 'current_ctc' in form:
                raw_value = form['current_ctc'].strip()
                if raw_value == '':
                    current_ctc = None
                else:
                    try:
                        current_ctc_int = int(raw_value)
                        if current_ctc_int <= 0:
                            current_ctc = None
                        else:
                            current_ctc = current_ctc_int
                    except (ValueError, TypeError):
                        current_ctc = None

                update_fields.append("current_ctc = %s")
                update_values.append(current_ctc)

            
            elif col in form:
                update_fields.append(f"{col} = %s")
                update_values.append(form[col])

        
        if 'image' in files and files['image'].filename:
            image_file = files['image']
            unique_image_name = generate_unique_filename(image_file.filename)
            image_path = os.path.join(current_app.config['UPLOAD_FOLDER'], unique_image_name)

            cursor.execute("SELECT image FROM applicant_detail WHERE id = %s", (applicant_id,))
            row = cursor.fetchone()
            if row and row.get('image'):
                delete_file_if_exists(row['image'])

            image_file.save(image_path)
            update_fields.append("image = %s")
            update_values.append(unique_image_name)

       
        if update_fields:
            update_values.append(applicant_id)
            sql = f"UPDATE applicant_detail SET {', '.join(update_fields)} WHERE id = %s"
            cursor.execute(sql, update_values)

        
        cursor.execute("DELETE FROM education_detail_tbl WHERE applicant_id = %s", (applicant_id,))
        cursor.execute("DELETE FROM certification_detail_tbl WHERE applicant_id = %s", (applicant_id,))
        cursor.execute("DELETE FROM work_experience_tbl WHERE applicant_id = %s", (applicant_id,))

        
        if 'education' in form:
            try:
                education_data = json.loads(form['education'])
                insert_json_array(cursor, 'education_detail_tbl', education_data, applicant_id)
            except json.JSONDecodeError as e:
                current_app.logger.error(f"Invalid JSON in education: {e}")

        
        if 'certifications' in form:
            try:
                cert_data = json.loads(form['certifications'])
                insert_json_array(cursor, 'certification_detail_tbl', cert_data, applicant_id)
            except json.JSONDecodeError as e:
                current_app.logger.error(f"Invalid JSON in certifications: {e}")

        
        if 'work_experience' in form:
            try:
                work_data = json.loads(form['work_experience'])
                insert_json_array(cursor, 'work_experience_tbl', work_data, applicant_id)
            except json.JSONDecodeError as e:
                current_app.logger.error(f"Invalid JSON in work_experience: {e}")

        
        insert_documents(cursor, form, files, applicant_id)

        conn.commit()
        return jsonify({'message': 'Applicant updated successfully'}), 200

    except mysql.connector.Error as e:
        conn.rollback()
        current_app.logger.error(f"Database error: {e}")
        return jsonify({'error': str(e)}), 500

    finally:
        cursor.close()
        conn.close()






#API to DELETE applicant and related data by id
@applicant_bp.route('/delete_applicant/<int:applicant_id>', methods=['DELETE'])
@token_required
def delete_applicant(current_user, applicant_id):
    conn = get_db_connection()
    cursor = conn.cursor()

    
    cursor.execute("DELETE FROM work_experience_tbl WHERE applicant_id = %s", (applicant_id,))
    cursor.execute("DELETE FROM education_detail_tbl WHERE applicant_id = %s", (applicant_id,))
    cursor.execute("DELETE FROM certification_detail_tbl WHERE applicant_id = %s", (applicant_id,))
    cursor.execute("DELETE FROM document_details WHERE applicant_id = %s", (applicant_id,))

    
    cursor.execute("DELETE FROM applicant_detail WHERE id = %s", (applicant_id,))

    conn.commit()
    cursor.close()
    conn.close()

    return jsonify({'message': 'Applicant deleted successfully'}), 200





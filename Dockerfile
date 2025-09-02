FROM node:22-bullseye-slim
WORKDIR /app
COPY package*.json .
RUN npm install
COPY . ./app
EXPOSE 5000
CMD ["npm","start"]

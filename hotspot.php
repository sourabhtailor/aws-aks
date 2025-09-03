<?php
// hotspot_only.php

// This will be flagged as a Security Hotspot (XSS risk) but not always a vulnerability
echo $_GET['input']; 

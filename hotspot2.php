<?php
// Example: Hardcoded HTTP header (Security Hotspot, not a Vulnerability)

// Setting a header directly with user data is considered a hotspot,
// but it's not flagged as a vulnerability in Sonar.
$userAgent = $_SERVER['HTTP_USER_AGENT'];
header("X-User-Agent: $userAgent");

echo "Security Hotspot Example";

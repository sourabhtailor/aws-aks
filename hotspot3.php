<?php
// Example: Using md5() for hashing passwords (Security Hotspot, not Vulnerability)

$password = "mySecretPassword";
$hash = md5($password);

echo "Hash: $hash";

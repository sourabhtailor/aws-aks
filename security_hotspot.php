<?php
// test_hotspot.php

// ❌ Insecure: Using eval() on user input will be flagged as a Security Hotspot
$code = $_GET['code'];
eval($code);

// ✅ Safer alternative would be avoiding eval, but here we intentionally keep it
echo "Executed user input: " . htmlspecialchars($code);

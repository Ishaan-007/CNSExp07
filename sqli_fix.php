<?php

// Recommend: set CSP elsewhere centrally; example header shown below.
// header("Content-Security-Policy: default-src 'self'; script-src 'self'");

// Disable legacy XSS filter (keeps original behavior), but CSP is stronger.
// Note: keeping X-XSS-Protection: 0 as original, but you can remove it if you add CSP.
header ("X-XSS-Protection: 0");

// Is there any input?
if ( array_key_exists( "name", $_GET ) && $_GET['name'] != NULL ) {

    // Safely handle user input:
    $input_name = $_GET['name'];

    // Trim and limit length to avoid extremely long inputs
    $input_name = substr(trim($input_name), 0, 200);

    // Encode output so injected HTML/JS cannot execute
    $safe_name = htmlspecialchars($input_name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

    // Feedback for end user with encoded value
    $html .= '<pre>Hello ' . $safe_name . '</pre>';
}

?>



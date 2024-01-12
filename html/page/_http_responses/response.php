<?php
// response.php

$httpStatusCode = isset($_GET['status']) ? intval($_GET['status']) : 200;

header("HTTP/1.1 $httpStatusCode");

// Your custom response logic here
echo "Custom response for HTTP $httpStatusCode";
?>

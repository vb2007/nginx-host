<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>head</h1>
</body>
</html>
<?php
$file = '/media/vb2007/2TB-HDD/nginx-webhost/vazlatok/vazlatok.zip'; // Cseréld ki a valós elérési útvonalra
$filename = '2022_2023_tori_vazlatok.zip'; // A letöltött fájl neve a látogató számára

header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . filesize($file));

readfile($file);
?>
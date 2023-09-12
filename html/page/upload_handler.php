<?php
$uploadDir = '/path/to/your/html/uploads/';  // Replace with the actual path to your "uploads" folder

if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $uploadFile = $uploadDir . basename($_FILES['file']['name']);
    
    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "File upload failed with error code: " . $_FILES['file']['error'];
}
?>

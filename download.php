<?php
if (isset($_GET['file'])) {
    $file = $_GET['file']; // Get the file name from the query parameter
    
    // Set the correct MIME type for the file. Adjust as needed based on your file type.
    header('Content-Type: application/octet-stream');
    
    // Use "Content-Disposition" to prompt the user to save the file with its original name.
    header('Content-Disposition: attachment; filename="' . $file . '"');
    
    // Path to the file. Make sure to adjust this path based on your file's location.
    $file_path = 'Jap-Esp/' . $file;
    
    // Check if the file exists and is readable before proceeding with the download.
    if (file_exists($file_path) && is_readable($file_path)) {
        // Output the file content to the browser for download.
        readfile($file_path);
        exit; // Terminate the script after the file has been downloaded.
    } else {
        // File not found or inaccessible.
        die('Error: File not found or inaccessible.');
    }
} else {
    // File parameter not provided in the URL.
    die('Error: File not specified.');
}
?>

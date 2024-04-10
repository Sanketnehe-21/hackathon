<?php
include 'config.php';
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    // Sanitize the ID parameter
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Query to fetch the PDF path from the database based on the provided ID
    $sql = "SELECT pdf_document FROM form1 WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
        // Fetch the PDF path from the database
        $row = mysqli_fetch_assoc($result);
        $pdf_path = $row['pdf_document'];

        // Construct the full path to the PDF file
        $full_path = 'uploads/' . $pdf_path;

        // Check if the file exists
        if(file_exists($full_path)) {
            // Set the content type header to indicate that it's a PDF file
            header("Content-type: application/pdf");

            // Output the PDF file
            readfile($full_path);
            exit;
        } else {
            // PDF file not found
            echo "PDF file not found.";
        }
    } else {
        // PDF file path not found or invalid ID
        echo "PDF file path not found.";
    }
} else {
    // Invalid request
    echo "Invalid request.";
}

// Close database connection
mysqli_close($conn);
?>
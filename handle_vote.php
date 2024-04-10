<?php
include 'config.php';
// Debugging output
echo "<pre>";
print_r($_POST);
// print_r($_SESSION);
echo "</pre>";
// Check if the necessary form data is received
if (isset($_POST['vote'], $_POST['card_id'], $_POST['name'])) {
    $vote = mysqli_real_escape_string($conn, $_POST['vote']);
    $card_id = mysqli_real_escape_string($conn, $_POST['card_id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);

    // Update the vote count based on the received vote value
    if ($vote == 'yes') {
        $sql_update = "UPDATE form1 SET yes_count = yes_count + 1, voted = 1 WHERE id={$card_id} AND name='{$name}'";
    } elseif ($vote == 'no') {
        $sql_update = "UPDATE form1 SET no_count = no_count + 1, voted = 1 WHERE id={$card_id} AND name='{$name}'";
    } else {
        echo "Invalid vote selection!";
        exit;
    }

    // Execute the SQL query
    if (mysqli_query($conn, $sql_update)) {
        echo "Vote submitted successfully!";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "Unauthorized Access!";
}

mysqli_close($conn);
?>


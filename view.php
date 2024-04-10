<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            min-height: 100vh;
        }
        video {
            width: 640px;
            height: 360px;
            margin-bottom: 20px;
        }
        .remove-btn {
            background-color: #FF0000;
            color: #FFFFFF;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 1rem;
        }
        a {
            text-decoration: none;
            color: #006CFF;
            font-size: 1.5rem;
            margin-bottom: 20px;
            display: block;
        }
    </style>
</head>
<body>
    <a href="index.php">UPLOAD</a>

    <div class="alb">
        <?php 
        // Include database connection
        include "db_conn.php";

        // Check if a form was submitted for video removal
        if(isset($_POST['remove_video'])) {
            $video_id = $_POST['video_id'];

            // Fetch video URL from the database using the video ID
            $fetch_video_url_query = "SELECT video_url FROM videos WHERE id = $video_id";
            $fetch_video_url_result = mysqli_query($conn, $fetch_video_url_query);
            $video_url_row = mysqli_fetch_assoc($fetch_video_url_result);
            $video_url = $video_url_row['video_url'];

            // Construct absolute path to the file
            $video_file = "uploads1/" . $video_url;

            // Check if the file exists
            if (file_exists($video_file)) {
                // Attempt to delete the file
                if (unlink($video_file)) {
                    // File successfully deleted
                    echo "File deleted successfully.";
                } else {
                    // Failed to delete the file
                    echo "Error deleting file.";
                }
            } else {
                // File doesn't exist
                echo "File does not exist.";
            }

            // Delete the video entry from the database
            $delete_video_query = "DELETE FROM videos WHERE id = $video_id";
            mysqli_query($conn, $delete_video_query);
        }

        // Prepare SQL query to fetch videos
        $sql = "SELECT * FROM videos ORDER BY id DESC";

        // Execute SQL query
        $res = mysqli_query($conn, $sql);

        // Check if there are videos
        if (mysqli_num_rows($res) > 0) {
            // Loop through fetched videos
            while ($video = mysqli_fetch_assoc($res)) { 
        ?>
            <!-- Display each video -->
            <div>
                <video controls>
                    <!-- Construct video source URL using PHP -->
                    <source src="uploads1/<?php echo htmlspecialchars($video['video_url']); ?>" type="video/mp4">
                    <!-- Fallback for browsers that do not support video tag -->
                    Your browser does not support the video tag.
                </video>
                <!-- Add a form with a remove button for each video -->
                <form method="post" action="">
                    <input type="hidden" name="video_id" value="<?php echo $video['id']; ?>">
                    <input type="submit" class="remove-btn" name="remove_video" value="Remove">
                </form>
            </div>
        <?php 
            }
        } else {
            // If no videos found
            echo "<h1>Empty</h1>";
        }
        ?>
    </div>
</body>
</html>

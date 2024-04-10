<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <title>Education</title>
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
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="margin-top:-0rem;margin-left:-51rem;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    
        <div class="image">
            <img style="width: 30rem;margin-left: 60rem;" src="./../../images/education1.png" alt="">
        </div>
        <div class="box" style="margin-left:10rem;margin-top:-15rem;">
                <h1 style=" margin-top: -20rem;margin-left: 1rem;padding-left:2rem">Education </h1>
                <div class="desc-1"
                style=" display: block;
                        width: 30rem;
                        margin-left:2rem;
                        padding-left:2rem;">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere placeat atque porro consequatur voluptate cupiditate hic architecto sit inventore sint sapiente, distinctio nulla fugiat laboriosam illum tempore nam odio doloremque excepturi rem magnam explicabo, voluptatem magni! Earum delectus officiis cumque.</p>
                </div>
                <button type="button" style="margin-left: 3.5rem;font-size: large;margin-top: 1rem;margin-left:5rem" class="btn btn-outline-secondary">Lesss Go</button>
        </div>
        <!-- <p style="align-items:center;justify-content:center;margin-left:-25rem;font-size:larger;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero, obcaecati.</p>    -->
    </div>

    <div class="alb">
        <?php 
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
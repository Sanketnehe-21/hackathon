<div class="container main">
  <div class="row">
<?php
include 'config.php';

$msg = "";
$uploads_path = "uploads/";
$sql = "SELECT * FROM form1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <?php
                        if (!empty($row['image'])) {
                            $image_path = $uploads_path . $row['image'];
                            echo '<img src="'.$image_path.'" class="img-fluid rounded-start" alt="Image">';
                        } else {
                            echo '<img src="placeholder.jpg" class="img-fluid rounded-start" alt="Placeholder Image">';
                        }
                        ?>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text"><?php echo $row['city']; ?></p>
                            <p class="card-text"><?php echo $row['criminal_charges']; ?></p>
                            <!-- <p class="card-text"><?php echo $row['votes']; ?></p> -->
                            <a href="feedback1.php?card_id=<?php echo $row['id']; ?>" class="btn btn-success">Give Feedback</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "No data found.";
}

mysqli_close($conn);
?>
</div>
</div>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style1.css" />
  </head>
  <body>

  </head>
  <body>
    <!-- <div class="card user">
      <div class="card-header">
        Featured
      </div>
      <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Name</h5>
                  <p class="card-text">Address</p>
                  <p class="card-text">Previous Criminal Charges</p>
                  <p class="card-text">Votes</p>
                  <button type="button" class="btn btn-success">Approve</button>
                  <button type="button" class="btn btn-danger">Reject</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </body>


  <script>
    // JavaScript to handle button click and redirect to feedback.php with card_id
    document.addEventListener('DOMContentLoaded', function () {
        const feedbackButtons = document.querySelectorAll('.give-feedback');

        feedbackButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                const cardId = this.getAttribute('data-card-id');
                window.location.href = 'feedback1.php?card_id=' + cardId;
            });
        });
    });
</script>
</html>

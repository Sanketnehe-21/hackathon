<?php
include 'config.php';


if (isset($_GET['card_id'])) {
    $card_id = $_GET['card_id'];
    $sql = "SELECT * FROM form1 WHERE id={$card_id}";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Feedback</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        </head>
        <body>
            <div class="container">
                <h1><?php echo $row['name']; ?></h1>
                <p style="font-size: 1.4rem;">City: <?php echo $row['city']; ?></p>
                <p style="font-size: 1.4rem;">Criminal Charges: <?php echo $row['criminal_charges']; ?></p>
                <p style="font-size: 1.4rem;">Should we give him/her another chance to reenter into society??? </p>
                <form id="voteForm">
                    <input type="hidden" name="card_id" value="<?php echo $card_id; ?>">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vote" id="vote_yes" value="yes" checked>
                        <label class="form-check-label" for="vote_yes" style="font-size: 1.4rem;">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="vote" id="vote_no" value="no">
                        <label class="form-check-label" for="vote_no" style="font-size: 1.4rem;">
                            No
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Vote</button>
                </form>
            </div>

            <script>
            $(document).ready(function() {
                $('#voteForm').submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'handle_vote.php',
                        data: $(this).serialize(),
                        success: function(response) {
                            // Handle success response
                            alert(response);
                            // You can update the UI if needed
                        },
                        error: function(xhr, status, error) {
                            // Handle error response
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
            </script>
        </body>
        </html>
        <?php
    } else {
        echo "<div class='alert alert-danger'>Card not found!</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Invalid request!</div>";
}

mysqli_close($conn);
?>

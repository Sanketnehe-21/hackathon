<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';
    $name = $email = $phone_number = $city = $criminal_charges = $image = $pdf_document = "";
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $criminal_charges = mysqli_real_escape_string($conn, $_POST['criminal_charges']);

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image = $_FILES["image"]["name"];
        $image_tmp = $_FILES["image"]["tmp_name"];
        $image_dir = "uploads/";
        move_uploaded_file($image_tmp, $image_dir . $image);
    }

    if (isset($_FILES["pdf_document"]) && $_FILES["pdf_document"]["error"] == 0) {
        $pdf_document = $_FILES["pdf_document"]["name"];
        $pdf_document_tmp = $_FILES["pdf_document"]["tmp_name"];
        $pdf_document_dir = "uploads/";
        move_uploaded_file($pdf_document_tmp, $pdf_document_dir . $pdf_document);
    }

    $sql = "INSERT INTO form1 (name, email, phone_number, city, criminal_charges, image, pdf_document) VALUES ('$name', '$email', '$phone_number', '$city', '$criminal_charges', '$image', '$pdf_document')";

    if (mysqli_query($conn, $sql)) {
        echo "Records inserted successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UserForm</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style1.css" />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Reintegrate360</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
            </li>
            
          
        </div>
      </div>
    </nav>
    <h1 style="margin-left: 34rem; margin-bottom:-2rem;">User Application Form</h1>
    <form method="post" enctype="multipart/form-data" class="input_form">
      <div class="mb-3">
        <label for="exampleInputCity" class="form-label">Full Name</label>
        <input
          type="text"
          class="form-control"
          name="name"
          id="exampleInputCity"
          required
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input
          type="email"
          class="form-control"
          name="email"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
          required
        />
        <!-- <div id="emailHelp" class="form-text">
          We'll never share your email with anyone else.
        </div> -->
      </div>
      <div class="mb-3">
        <label for="exampleInputPhoneNumber" class="form-label"
          >Phone Number</label
        >
        <input
          type="tel"
          class="form-control"
          name="phone_number"
          id="exampleInputPhoneNumber"
          required
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputCity" class="form-label">City</label>
        <input
          type="text"
          class="form-control"
          name="city"
          id="exampleInputCity"
          required
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputState" class="form-label">State</label>
        <input
          type="text"
          class="form-control"
          name="state"
          id="exampleInputState"
          required
        />
      </div>
      <div class="mb-3">
        <label for="exampleInputCriminalCharges" class="form-label"
          >Previous Criminal Charges</label
        >
        <textarea
          class="form-control"
          name="criminal_charges"
          id="exampleInputCriminalCharges"
          rows="3"
        ></textarea>
      </div>

      <div class="mb-3">
        <label for="exampleInputImage" class="form-label">Upload Image</label>
        <input
          type="file"
          class="form-control"
          name="image"
          id="exampleInputImage"
          accept="image/*"
          required
        />
        <div id="imageHelp" class="form-text">Please upload an image file.</div>
      </div>

      <div class="mb-3">
        <label for="exampleInputPdfDocument" class="form-label"
          >Upload PDF Document</label
        >
        <input
          type="file"
          class="form-control"
          name="pdf_document"
          id="exampleInputPdfDocument"
          accept=".pdf"
          required
        />
        <div id="imageHelp" class="form-text">
          Please upload documents mentioning your previous criminal charges .
        </div>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">
        Submit
      </button>
    </form>
  </body>
</html>

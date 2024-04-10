<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Service/main.css">
    <title>Education</title>
	<style>
		body {
			display: flex;
			justify-content: center;
			align-items: center;
			flex-direction: column;
			min-height: 100vh;
		}
		input {
			font-size: 2rem;
		}
		a {
			text-decoration: none;
			color: #006CFF;
			font-size: 1.5rem;
		}
	</style>
</head>
<body>

</body>
    <!-- <div class="">
        <div class="image">
            <img style="width: 30rem;margin-left: 10rem;" src="./../../images/education1.png" alt="">
        </div>
                <h1 style=" margin-top: -20rem;margin-left: 1rem;">Education </h1>
                <div class="desc-1">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere placeat atque porro consequatur voluptate cupiditate hic architecto sit inventore sint sapiente, distinctio nulla fugiat laboriosam illum tempore nam odio doloremque excepturi rem magnam explicabo, voluptatem magni! Earum delectus officiis cumque.</p>
                </div>
                <button type="button" style="margin-left: 3.5rem;font-size: large;margin-top: 1rem;" class="btn btn-outline-secondary">Lesss Go</button>

    </div> -->
<body>
	<a href="Education.php">Videos</a>
	<?php if (isset($_GET['error'])) {  ?>
		<p><?=$_GET['error']?></p>
	<?php } ?>
	 <form action="upload.php"
	       method="post"
	       enctype="multipart/form-data">

	 	<input type="file"
	 	       name="my_video">

	 	<input type="submit"
	 	       name="submit" 
	 	       value="Upload">
	 </form>
</body>
</html>

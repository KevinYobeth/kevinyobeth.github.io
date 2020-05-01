<!DOCTYPE HTML>
<html>
	<head>
		<title>File Uploader</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">

            <?php
            $target_dir = "userContent/" . strtolower($_POST["uploadCode"]) . "/";

            if (strpos($_POST["uploadCode"], "!") !== false && !is_dir($target_dir)) mkdir($target_dir);

            if(!is_dir($target_dir)){
                echo "<h1>Invalid Upload Code!";
                //mkdir($target_dir);
            } else {
           
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if (file_exists($target_file)) {
            echo "<h1>Sorry, file already exists.</h1>";
            }

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "<h1>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded." . "</h1>";
                } else {
                    echo "<h1>Sorry, there was an error uploading your file.</h1>";
                }

            }
            ?>

			</header>

		<!-- Signup Form -->
			<!-- <form id="signup-form" method="post" enctype="multipart/form-data" action="upload.php"> -->
            <form method="POST" enctype="multipart/form-data">
                <input type="button" onclick="window.location.href='index.html'" value="Back to Upload" name="submit">
			</form>

        
			<script src="assets/js/main.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	</body>
</html>
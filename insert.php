<?php
require_once 'connection1.php';
require_once 'insert_trigger.php';

// Drop the existing stored procedure if it exists
$sqlDrop = "DROP PROCEDURE IF EXISTS InsertDog";
$con->exec($sqlDrop);

// Create the new stored procedure for image insertion
$sqlCreate = "
CREATE PROCEDURE InsertDog(
    IN strImg VARCHAR(255),
    IN strDetails VARCHAR(255),
    IN strPrice INT
)
BEGIN
    INSERT INTO dogs (image, details,price) VALUES (strImg, strDetails, strPrice);
END";
$con->exec($sqlCreate);

if (isset($_POST['submit'])) {
    $details = $_POST['details'];
    $price = $_POST['price'];
    $folder = 'images\ ';
    $image_file = $_FILES['image']['name'];
    $file = $_FILES['image']['tmp_name'];
    $target_file = $folder . basename($image_file);
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    // Check file type
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $error[] = 'Sorry, only JPG, JPEG, PNG, GIF files are allowed!';
    }

    // Check file size
    if ($_FILES['image']['size'] > 1048576) {
        $error[] = 'Sorry, your image is too large. Upload less than 1 MB';
    }

    // If no errors, upload the image and insert details into database
    if (!isset($error)) {
        move_uploaded_file($file, $target_file);
        $stmt = $con->prepare("CALL InsertDog(:image, :details, :price)");
$stmt->bindParam(':image', $image_file);
$stmt->bindParam(':details', $details);
$stmt->bindParam(':price', $price);


        try {
            $stmt->execute();
            $image_success = true;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    // Display errors if any
    if (isset($error)) {
        foreach ($error as $error) {
            echo '<div class="message">' . $error . '</div><br>';
        }
    }
}

if (isset($image_success)) {
    echo '<div class="success">Image uploaded successfully!</div>';
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Adopt me</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Simple line icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
       
        
        <!-- Callout-->
        <section class="callout">
            <div class="container px-4 px-lg-5 text-center">
            <div class="cta-inner bg-faded text-center rounded">
            <br/><a href="pagina1admin.php">Back</a>
                            
                        </div>
            </div>
        </section>
        
   

        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container px-4 px-lg-5">
                <ul class="list-inline mb-5">
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white mr-3" href="#!"><i class="icon-social-twitter"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a class="social-link rounded-circle text-white" href="#!"><i class="icon-social-github"></i></a>
                    </li>
                </ul>
                
                
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

<?php
require_once 'connection1.php';
require_once 'delete_trigger.php';

// Drop the existing stored procedure if it exists
$sql1 = "DROP PROCEDURE IF EXISTS deleteDog";
$con->exec($sql1);

// Create the new stored procedure
$sql2 = "
CREATE PROCEDURE deleteDog(
    IN strImage VARCHAR(255)
)
BEGIN
    DELETE FROM dogs WHERE image = strImage;
END";
$con->exec($sql2);

// Check if a deletion request has been submitted
if (isset($_POST['submit'])) {
    $imageToDelete = $_POST['imageToDelete']; // Image you want to delete

    // Delete the specified image
    $stmt = $con->prepare("CALL deleteDog(:image)");
    $stmt->bindParam(':image', $imageToDelete, PDO::PARAM_STR);
    $stmt->execute();

    echo "Data was successfully deleted!";
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
            <section class="callout">
    <div class="container px-4 px-lg-5 text-center">
        <div class="cta-inner bg-faded text-center rounded">
            <form method="post">
                <div class="form-group">
                    <label>Select Image to Delete</label>
                    <select class="form-control" name="imageToDelete">
                        <?php
                        // Interogare pentru a obține toate imaginile din baza de date
                        $res = $con->query("SELECT image FROM dogs");
                        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['image'] . '">' . $row['image'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Delete</button>
            </form>
            <br/><a href="pagina1admin.php">Back</a>
        </div>
    </div>
</section>                            
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

<?php
require_once 'connection1.php';
require_once 'update_trigger.php';

// Drop the existing stored procedure if it exists
$sql1 = "DROP PROCEDURE IF EXISTS updateDog";
$con->exec($sql1);

// Create the new stored procedure
$sql2 = "
CREATE PROCEDURE updateDog(
    IN strDetails VARCHAR(255),
    IN strImage VARCHAR(255),
    IN strPrice INT,
    IN intID INT
)
BEGIN
    IF strImage IS NOT NULL THEN
        UPDATE dogs SET details = strDetails, image = strImage, price = strPrice WHERE id = intID;
    ELSE
        UPDATE dogs SET details = strDetails, rice = strPrice WHERE id = intID;
    END IF;
END";
$con->exec($sql2);

// Check if an update request has been submitted
if (isset($_POST['submit'])) {
    $idToUpdate = $_POST['id']; // ID-ul rândului pe care utilizatorul dorește să-l actualizeze
    $details = $_POST['details']; // Noile detalii asociate rândului

    $imageToUpdate = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageToUpdate = $_FILES['image']['name'];
        $file = $_FILES['image']['tmp_name'];
        $folder = 'upload\ '; // Directorul în care se va salva imaginea
        move_uploaded_file($file, $folder . $imageToUpdate);
    }
    $price = $_POST['price']; // Noile detalii asociate rândului


    // Call the stored procedure to update the item
    $stmt = $con->prepare("CALL updateDog(:details, :image, :price, :id)");
    $stmt->bindParam(':details', $details, PDO::PARAM_STR);
    $stmt->bindParam(':image', $imageToUpdate, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':id', $idToUpdate, PDO::PARAM_INT);
    $stmt->execute();

    echo "Data was successfully updated!";
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
        <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                        <div class="form-group">
                            <label>New Details</label>
                            <input type="text" class="form-control" name="details" required>
                        </div>
                        <div class="form-group">
                            <label>New Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
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

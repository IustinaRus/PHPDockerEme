<?php

include('session.php');
?>
<?php 
require_once 'connection1.php';
?>

<?php

class CuteDog {

    private $name;
    public $details;

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

}

$cuteDog = new CuteDog();
$cuteDog->details = 'because all the dogs are cute!';
$cuteDog->setName("CUTE DOGS");
?>

<?php

class EnergicDog {

    private $name;
    public $details;

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

}

$EnergicDog = new CuteDog();
$EnergicDog->details = 'they will keep you in shape';
$EnergicDog->setName("ENERGIC DOGS");
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
        <!-- Navigation-->
        <a class="menu-toggle rounded" href="#"><i class="fas fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="#page-top">Adopt me</a></li>
                <li class="sidebar-nav-item"><a href="#page-top">Home</a></li>
                <li class="sidebar-nav-item"><a href="#about">About</a></li>
                <li class="sidebar-nav-item"><a href="#services">Services</a></li>
                <li class="sidebar-nav-item"><a href="#portfolio">Portfolio</a></li>
                <li class="sidebar-nav-item"><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1>Welcome <?php echo $login_session; ?>!</h1>
                <h3 class="mb-5"><em>Are you ready to make a new best friend?</em></h3>
                <a class="btn btn-primary btn-xl" href="#about">Find Out More</a>
            </div>
        </header>
        <!-- About-->
        <section class="content-section bg-light" id="about">
            <div class="container px-4 px-lg-5 text-center">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-10">
                        <h2>You can choose who to adopt based on their breed, color, smile!</h2>
                        <p class="lead mb-5">
                            And more important... as many as you want as long as you'll keep them safe!
                        </p>
                        <a class="btn btn-dark btn-xl" href="#services">What kind of dog are you looking for?</a>
                    </div>
                    <iframe width="695" height="500" src="https://www.youtube.com/embed/SN3vjq3Df1w"></iframe>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="content-section bg-primary text-white text-center" id="services">
            <div class="container px-4 px-lg-5">
            <audio controls>
                                    <source src="audio\music.mp3" type="audio/mpeg">
                                </audio>
                <div class="content-section-heading">
                    <h3 class="text-secondary mb-0">Make your own ideea</h3>
                    <h2 class="mb-5">What will you find here?</h2>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-screen-smartphone"></i></span>
                        <h4><strong><?php
                                            echo $cuteDog->getName();
                                        ?></strong></h4>
                        <p class="text-faded mb-0"><?php
                                            echo $cuteDog->details;
                                        ?></strong></h4></p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                        <h4><strong><?php
                                            echo $EnergicDog->getName();
                                        ?></strong></h4>
                        <p class="text-faded mb-0"><?php
                                            echo $EnergicDog->details;
                                        ?></p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-like"></i></span>
                        <h4><strong>SMALL EATERS</strong></h4>
                        <p class="text-faded mb-0">
                            don't worry if your food suddenly disapears
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-mustache"></i></span>
                        <h4><strong>HAIRY DOGS</strong></h4>
                        <p class="text-faded mb-0">don't worry.. they don't have a mustache</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Callout-->
        <section class="callout">
            <div class="container px-4 px-lg-5 text-center">
            <div class="cta-inner bg-faded text-center rounded">
                            <video width="600" height="400" controls>
                                <source src="audio/video.mp4" type="video/mp4">
                            </video>
                            
                        </div>
            </div>
        </section>
        <!-- Portfolio-->
        <section class="content-section" id="portfolio">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    <h3 class="text-secondary mb-0">Our Portfolio</h3>
                    <h2 class="mb-5">Take a look at our bosses</h2>
                </div>
                <div class="container">
                <div class="product-item">
                    <div class="product-item-title d-flex">
                        <div class="bg-faded p-5 rounded"><p class="mb-0"> 
                                <div class="form-group">
                                <table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Image</th>
            <th>Details</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $res = $con->query("SELECT * FROM dogs ORDER BY id DESC");
        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>
                <td><img src="images/' . $row['image'] . '" height="200"></td>
                <td>' . $row['details'] . '</td>
                <td>' . $row['price'] . '</td>
                <td>
                    <a href="update.php?id=' . $row['id'] . '" class="btn btn-primary">Update</a>
                    <a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>
                </td>
            </tr>';
        }                                        
        ?>
    </tbody>
</table>

                                    <form method="post" action="insert.php" enctype="multipart/form-data">
    <div class="form-group">
        <label>New doggie</label>
        <input type="file" class="form-control" name="image" required>
    </div>
    <div class="form-group">
        <label>Details</label>
        <input type="text" class="form-control" name="details">
    </div>
    <div class="form-group">
        <label>Price</label>
        <input type="text" class="form-control" name="price">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Insert</button>
</form>

                                </div>
                            </form>
                        </p></div>
                    </div>
                </div>
            </div>
                    
            </div>
            <div class="bg-faded p-5 rounded">
                <p class="mb-0"> 
                    Are you looking for a dog? 
                </p>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" class="form-control" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Id</td>
                                        <td>Image</td>
                                        <td>Details</td>
                                        <td>Prices</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Connection to database using PDO
                                    try {
                                        $dsn = "mysql:host=mysql_db;dbname=dogs";
                                        $user = "root";
                                        $pass = "toor"; // Password for MySQL user
                                        $con = new PDO($dsn, $user, $pass);
                                        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    } catch (PDOException $e) {
                                        echo 'Connection failed: ' . $e->getMessage();
                                        exit();
                                    }

                                    if (isset($_GET['search'])) {
                                        $filtervalues = $_GET['search'];
                                        // Query using PDO
                                        $query = "SELECT * FROM dogs WHERE CONCAT(image,details,price) LIKE :filtervalues";
                                        $stmt = $con->prepare($query);
                                        $stmt->bindValue(':filtervalues', '%' . $filtervalues . '%', PDO::PARAM_STR);
                                        $stmt->execute();

                                        if ($stmt->rowCount() > 0) {
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr>
                                                    <td><?= $row['id']; ?></td>
                                                    <td><?= $row['image']; ?></td>
                                                    <td><?= $row['details']; ?></td>
                                                    <td><?= $row['price']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="4">No record found!</td>
                                            </tr> 
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to Action-->
        <section class="content-section bg-primary text-white">
    <div class="container px-4 px-lg-5 text-center">
        <div class="product-item-description d-flex me-auto">
            <p>Image to use:</p>
            <img id="leslie" src="assets/img/leslie.png" alt="Leslie" width="220" height="227"><p>    <p>
            <p>Canvas to fill:</p>
            <canvas id="myCanvas" width="220" height="227" style="border:1px solid #d3d3d3;">
                Your browser does not support the HTML canvas tag.
            </canvas>
            <p><button onclick="copyImageToCanvas()">Try it</button></p>
        </div>
    </div>
</section>

<script>
    function copyImageToCanvas() {
        var c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        var img = document.getElementById("leslie");

        // Set the canvas size to match the desired dimensions
        c.width = 220;
        c.height = 227;

        // Draw the image on the canvas
        ctx.drawImage(img, 0, 0, 220, 227);
    } 
</script>

        <!-- Map-->
        <div class="map" id="contact">
        <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d5424.376556564999!2d27.571996875307615!3d47.17375015789209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2sUniversitatea%20%E2%80%9EAlexandru%20Ioan%20Cuza%E2%80%9D%2C%20Bulevardul%20Carol%20I%2011%2C%20Ia%C8%99i%20700506!3m2!1d47.174358899999994!2d27.571503999999997!4m5!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2suaic!3m2!1d47.174358899999994!2d27.571503999999997!5e0!3m2!1sro!2sro!4v1710340924630!5m2!1sro!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <br />
            <small><a href="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d5424.376556564999!2d27.571996875307615!3d47.17375015789209!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2sUniversitatea%20%E2%80%9EAlexandru%20Ioan%20Cuza%E2%80%9D%2C%20Bulevardul%20Carol%20I%2011%2C%20Ia%C8%99i%20700506!3m2!1d47.174358899999994!2d27.571503999999997!4m5!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2suaic!3m2!1d47.174358899999994!2d27.571503999999997!5e0!3m2!1sro!2sro!4v1710340924630!5m2!1sro!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></a></small>
        </div>
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
                
                <h2><a href = "logout.php">Sign Out</a></h2>
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

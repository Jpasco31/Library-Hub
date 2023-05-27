<?php

session_start();

    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="main.js" defer></script>
    <title>Library Hub</title>
    
</head>
<body>
    <!-- Navbar -->
    <?php include 'navbar.php';?>

    <!-- Showcase -->

    <section class="text-light p-5 text-center d-flex justify-content-center welcome">
        <div class="container my-3">
        <h1 class="fw-bold">Hello, <?php echo $user_data['firstName']; ?>!</h1>
            <h1 class="fw-bold">Welcome to Our Library</h1>
            <p class="lead">Explore our vast collection of books and enjoy reading!</p>
            <input href="#bookpage" type="button" class="btn btn-warning btn-lg mt-3" value="View Books" onclick="scrollToBookPage()">
        </div>
    </section>

    <!-- Boxes -->
   
    <section class="p-5">
        <div class="container d-flex justify-content-center mb-4" id="bookpage">
            <h1>Books</h1>
        </div>
        <div class="container d-flex justify-content-center">
            <div class="card-group text-center">
                <?php
                        // Create a query
                        $sql = "SELECT bookId,bookTitle,author,publishDate,photo,synopsis FROM books";
                        // Execute the query
                        $result = mysqli_query($con, $sql);
                        // If there is no result, display an error message
                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="booksize text-center">
                                    <img src="images/book/'.$row['photo'].'"class="image-fluid booksize mx-4 my-2">
                                    <p> Book ID:'.$row['bookId'].
                                        '<br>'.$row['bookTitle'].'</p>
                                    </div>';
                            }
                          } else {
                            echo "0 results";
                          }
                    ?>        
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'footer.php';?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>

<?php
mysqli_close($con);

?>
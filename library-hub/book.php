<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

if($user_data['accountId'] != 1){
    header("Location: index.php");
    exit;
}
// Add book
$bookId = NULL;
$bookTitle = NULL;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addButton'])) {
    // Retrieve form data
    $bookTitle = $_POST['bookTitle'];
    $author = $_POST['author'];
    $publishDate = $_POST['publishDate'];
    $synopsis = $_POST['synopsis'];

    // File upload handling
    $photoName = $_FILES['photo']['name'];
    $photoTmpName = $_FILES['photo']['tmp_name'];
    $photoError = $_FILES['photo']['error'];

    $query = "INSERT INTO books (bookTitle, author, publishDate, synopsis, photo) VALUES ('$bookTitle', '$author', '$publishDate', '$synopsis', '$photoName')";

    if ($photoError === UPLOAD_ERR_OK) {
        $uploadDir = 'C:/xampp/htdocs/final/library-hub/images/book/';// Modify this path to match the absolute path to your htdocs directory
        $photoDestination = $uploadDir . $photoName;
        move_uploaded_file($photoTmpName, $photoDestination);
        

        // Prepare and execute the SQL query
        if (mysqli_query($con, $query)) {
            // Book added successfully
            echo "Book added successfully!";
        } else {
            // Error occurred
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "File upload error: " . $photoError;
    }
}

//search for book
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchButton'])) {
    $bookId = $_POST['bookId'];
    
    $query = "SELECT bookTitle FROM books WHERE bookId = '$bookId'";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $bookTitle = $row['bookTitle'];
    } else {
        // Book not found
        $bookTitle = "Book not found";
    }
}

// Delete book data
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteButton'])) {
    $bookIdSelect = $_POST['bookIdSelect'];
    
    $query = "DELETE FROM books WHERE bookId = '$bookIdSelect'";
    
    if (mysqli_query($con, $query)) {
        // Book deleted successfully
        echo "Book deleted successfully!";
    } else {
        // Error occurred
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>LibraryHub Books</title>
</head>
<body>
    <!-- Navbar -->
    <?php include 'navbar.php';?>

    <!-- Showcase -->
    <section class="text-light p-4 text-center d-flex justify-content-center borrow mb-5">
        <div class="container my-3">
            <h1 class="fw-bold">Books</h1>
            <p class="fs-3">Add or remove books</p>
        </div>
    </section>

    <!--Input-->
    <section class="container-fluid mt-5">
        <div class="row px-5 pb-3">
            <!-- Add books -->
            <div class="col-md-6">
                <div class="container custom-container mt-4 mb-5 border p-4">
                    <h3 class="fw-bold">Add</h3>
                    <form class="container p-3 bg-white rounded-3 pt-4 mt-1" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-2">
                            <label for="bookTitle">Book Title</label>
                            <input type="text" class="form-control custom-input" id="bookTitle" name="bookTitle">
                        </div>
                        <div class="form-group mb-2">
                            <label for="author">Author</label>
                            <input type="text" class="form-control custom-input" id="author" name="author">
                        </div>
                        <div class="form-group mb-2">
                            <label for="publishDate">Date Published</label>
                            <input type="date" class="form-control custom-input" id="publishDate" name="publishDate">
                        </div>
                        <div class="form-group mb-2">
                            <label for="synopsis">Synopsis</label>
                            <textarea rows="4" class="form-control custom-input" id="synopsis" name="synopsis"></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="photo">Upload Book cover</label>
                            <input type="file" id="photo" name="photo">
                        </div>
                        <div class="d-grid gap-2">
                            <input class="btn btn-primary p-3 my-3 rounded-5" type="submit" value="Add" name="addButton">
                        </div>
                    </form>
                </div>
            </div>
            <!-- Delete -->
            <div class="col-md-6">
                <div class="container custom-container mt-4 mb-5 border p-4">
                    <h3 class="fw-bold">Delete</h3>
                    <form class="container p-3 bg-white rounded-3 pt-4 mt-1" method="post">
                        <div class="form-group mb-2">
                            <label for="bookId">Book ID</label>
                            <input type="text" class="form-control custom-input" id="bookId" placeholder="Enter Book ID" name="bookId">
                        </div>
                        <div class="d-grid gap-2">
                            <input class="btn btn-primary p-3 my-3 rounded-5" type="submit" value="Search" name="searchButton">
                        </div>
                        <div class="form-group mb-2">
                            <label for="bookId">Book ID</label>
                            <input type="text" class="form-control custom-input" id="bookId" name="bookIdSelect" value="<?php echo $bookId; ?>">
                        </div>
                        <div class="form-group mb-2">
                            <label for="bookTitle">Book Title</label>
                            <input type="text" class="form-control custom-input" id="bookTitle" value="<?php echo $bookTitle; ?>">
                        </div>
                        <div class="d-grid gap-2">
                            <input class="btn btn-primary p-3 my-3 rounded-5" type="submit" value="Delete" name="deleteButton">
                        </div>
                    </form>
                </div>
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
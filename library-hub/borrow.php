<?php
session_start();

    include("connection.php");
    include("functions.php");

    $bookId = NULL;
    $bookTitle = NULL;
    
    $user_data = check_login($con);

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchButton'])) {
        $bookId = $_POST['bookId'];
        
        $query = "SELECT bookTitle FROM books WHERE bookId = '$bookId'";
        $result = mysqli_query($con, $query);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $bookTitle = $row['bookTitle'];
        } else {
            // Book not found
            $bookId = "Book not found";
            $bookTitle = "Book not found";
        }
    }

    date_default_timezone_set('Asia/Manila');
    $currentDate = date('Y-m-d');

    // Borrow book
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['borrowButton'])) {
        $currentUserId = $user_data['accountId'];
        $bookIdSelect = $_POST['bookIdSelect'];
        $borrowDate = $_POST['borrowDate'];
        $toReturnDate = date('Y-m-d', strtotime($borrowDate . ' + 20 days'));
      
        // Insert the borrow record into the database
        $query = "INSERT INTO borrow (bookId, accountId, borrowDate, toReturnDate,late, returned) VALUES ('$bookIdSelect', '$currentUserId', '$borrowDate', '$toReturnDate','0','0')";
      
        mysqli_query($con, $query);
    }

    // Return book
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['returnButton'])) {
        $borrowId = $_POST['borrowId'];
        $returnDate = $_POST['returnDate'];
    
        $query = "UPDATE borrow SET returnDate = '$returnDate', returned = 1 WHERE borrowId = '$borrowId'";
    
        mysqli_query($con, $query);
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
            <p class="fs-3">Borrow and Return</p>
        </div>
    </section>

    <!-- forms -->
    <section class="container-fluid mt-5">
        <div class="row px-5 pb-3">
            <!-- Borrow -->
            <?php
            if (!$user_data['admin']) {
                echo '
                <div class="col-md-4">
                    <div class="container mt-4 mb-5 border p-4">
                        <h3 class="fw-bold">Borrow</h3>
                        <p><em>Duration of borrowed books - 20 days from borrow date return</em></p>
                        <p><em>Please return book on or before return date</em></p>
                        <form class="container p-3 bg-white rounded-3 pt-4 mt-1" method="post" onsubmit="return validateBorrowDate()">
                            <div class="form-group mb-2">
                                <label for="bookId">Book ID</label>
                                <input type="text" class="form-control custom-input" id="bookId" placeholder="Enter Book ID" name="bookId">
                            </div>
                            <div class="d-grid gap-2">
                                <input class="btn btn-primary p-3 my-3 rounded-5" type="submit" value="Search" name="searchButton">
                            </div>
                            <div class="form-group mb-2">
                                <label for="bookIdSelect">Book ID</label>
                                <input type="text" class="form-control custom-input" id="bookIdSelect" name="bookIdSelect" value="' . $bookId . '" readonly>
                            </div>
                            <div class="form-group mb-2">
                                <label for="bookTitle">Book Title</label>
                                <input type="text" class="form-control custom-input" id="bookTitle" value="' . $bookTitle . '" readonly>
                            </div>
                            <div id="borrowDateGroup" class="form-group mb-2">
                                <label for="borrowDate">Borrow Date</label>
                                <input type="date" class="form-control custom-input" id="borrowDate" name="borrowDate" value="' . $currentDate . '" required>
                            </div>
                            <div class="d-grid gap-2">
                                <input class="btn btn-primary p-3 my-3 rounded-5" type="submit" value="Borrow" name="borrowButton">
                            </div>
                        </form>
                    </div>
                </div>';
            }
            ?>


            <!-- To Return -->
            <div class="col-md-4">
                <div class="container mt-4 mb-5 border p-4">
                    <h3 class="fw-bold">To Return</h3>
                    <p><em>Red Highlight- Return Date has passed<br> RETURN BOOK ASAP</em></p>
                    <div class="table-responsive-xxl">
                        <?php
                        // Create a query to retrieve data from the borrow table
                        if ($user_data['accountId'] == 1) {
                            $sql = "SELECT borrow.borrowId, borrow.bookId, borrow.borrowDate, borrow.toReturnDate, borrow.returnDate, borrow.late, borrow.accountId, books.bookTitle
                                    FROM borrow
                                    INNER JOIN books ON borrow.bookId = books.bookId
                                    WHERE borrow.returned = 0";
                        } else {
                            $sql = "SELECT borrow.borrowId, borrow.bookId, borrow.borrowDate, borrow.toReturnDate, borrow.returnDate, borrow.late, borrow.accountId, books.bookTitle
                                    FROM borrow
                                    INNER JOIN books ON borrow.bookId = books.bookId
                                    WHERE borrow.accountId = '{$user_data['accountId']}' AND borrow.returned = 0";
                        }

                        // Execute the query
                        $result = mysqli_query($con, $sql);

                        $currentDate = date('Y-m-d');
                        while ($returnCheck = mysqli_fetch_assoc($result)) {
                            if ($currentDate > $returnCheck['toReturnDate']) {
                                $lateUpdateQuery = "UPDATE borrow SET late = 1 WHERE borrowId = '{$returnCheck['borrowId']}'";
                                mysqli_query($con, $lateUpdateQuery);
                            }
                        }

                        // Execute the query again to fetch the updated result set
                        $result = mysqli_query($con, $sql);

                        // Check if there are any rows returned (excluding the header row)
                        if (mysqli_num_rows($result) > 0) {
                            echo "<table class='table table-hover'>
                                <thead>
                                    <tr>
                                        <th>Borrow ID</th>";
                                        if ($user_data['accountId'] == 1) {
                                            echo "<th>Account ID</th>";
                                        }
                                        echo "<th>Book ID</th>
                                        <th>Book Title</th>
                                        <th>Borrow Date</th>
                                        <th>To Return Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>";

                            // Loop through each row and display the data
                            while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr";
                                    if ($row['late'] == 1) {
                                        echo " style='background-color: red;'";
                                    }
                                    echo ">";
                                    echo "<td>{$row['borrowId']}</td>";
                                    if ($user_data['accountId'] == 1) {
                                        echo "<td>{$row['accountId']}</td>";
                                    }
                                    echo "<td>{$row['bookId']}</td>";
                                    echo "<td>{$row['bookTitle']}</td>";
                                    echo "<td>{$row['borrowDate']}</td>";
                                    echo "<td>{$row['toReturnDate']}</td>";
                                    echo "</tr>";
        
                            }

                            echo "</tbody></table>";
                        } else {
                            echo "<p>No books borrowed.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Return -->
            <div class="col-md-4">
                <div class="container mt-4 mb-5 border p-4">
                    <h3 class="fw-bold">Return</h3>
                    <form class="container p-3 bg-white rounded-3 pt-4 mt-1" method="post">
                        <div class="form-group mb-2">
                            <label for="borrowId">Borrow ID</label>
                            <input type="text" class="form-control custom-input" id="borrowId" placeholder="Enter Book ID" name="borrowId">
                        </div>
                        <div class="form-group mb-2">
                            <label for="returnDate">Return Date</label>
                            <input type="date" class="form-control custom-input" id="returnDate" name="returnDate" value="<?php echo $currentDate; ?>" required>
                        </div>
                        <div class="d-grid gap-2">
                                <input class="btn btn-primary p-3 my-3 rounded-5" type="submit" value="Return" name="returnButton">
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    

    <!-- Footer -->
    <?php include 'footer.php';?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="main.js"></script>

</body>
</html>

<?php
mysqli_close($con);

?>

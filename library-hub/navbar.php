<?php
include("connection.php");
$user_data = check_login($con);

    echo '<nav class="navbar sticky-top navbar-expand-lg" data-bs-theme="dark" id="navbar">
        <div class="container">
            <a href="index.php" class="navbar-brand fs-1 fw-bold logo">LIBRARYHUB</a> 

            <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navmenu"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="borrow.php" class="nav-link">Borrow</a>
                    </li>';

                    if ($user_data['admin'] == 1) {
                        echo '<li class="nav-item">
                                <a href="book.php" class="nav-link" >Manage</a>
                              </li>';
                    }
                    
                    echo'<li class="nav-item">
                        <a href="logout.php" class="nav-link">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>';
?>

<?php
require 'includes/dbhandler.php';
require 'includes/header.php';
?>

<main>
<link rel="stylesheet" href="css/gallery.css">
<link href="css/reviews.css" rel="stylesheet">
    <h1>Gallery</h1>
    <div class="gallery-container">
        <?php
        $sql = "SELECT * FROM items ORDER BY upload_date DESC";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
           echo 'SQL Failure';
        }
        else{
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="card">
                <a href="review.php?id='.$row['pid'].'">
                <img src="items/'.$row["picpath"].'">
                <h3>'.$row["title"].'</h3>
                <p>'.$row["descript"].'</p>
                </a>
                </div>';
            }

        }
        ?>
    </div>

</main>
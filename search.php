<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G-Discuss! -- Tech Community</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&family=Limelight&family=National+Park:wght@200..800&family=Playwrite+DE+Grund:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Winky+Rough:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "National Park", sans-serif !important;
            font-optical-sizing: auto;
        }
    </style>
</head>

<body>
    <?php include "./partials/_dbconnect.php" ?>
    <?php include "./partials/_header.php" ?>

    <div class="container py-3">
        <h4 class="text-center m-2 text">G-discuss | A tech community forums</h4>
        <h1 class="text-center m-2 text">Search Results... for "<code><?php echo $_GET['search'] ?></code>"</h1>

    <?php
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $search_sql = "SELECT * FROM `threads` WHERE `thread_title` LIKE '%$search%' OR `thread_desc` LIKE '%$search%'";
        $result_sql = mysqli_query($conn, $search_sql);
    
        if (!$result_sql) {
            die("Error: " . mysqli_error($conn));
        }
    
        if (mysqli_num_rows($result_sql) == 0) {
            echo '<p class="text-center">No results found for "<code>' . htmlspecialchars($_GET['search']) . '</code>".</p>
                <div class="body">Suggestions : </div>
                <ul>
                    <li>Make sure that all words spelled correctly.</li>
                    <li>Try different keyword.</li>
                    <li>Try more general keywords.</li>
                </ul>
            ';
        } else {
            while ($row = mysqli_fetch_assoc($result_sql)) {
                $date = new DateTime($row["timestamp"]);
                $time = $date->format('F j, Y \a\t h:i A');
                echo '
                    <div>
                        <div class="card text-center my-3">
                            <div class="card-header">
                                Featured
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">' . htmlspecialchars($row['thread_title']) . '</h5>
                                <p class="card-text">' . htmlspecialchars($row['thread_desc']) . '</p>
                                <a href="threads.php?tid=' . $row["thread_id"] . '" class="btn btn-warning">View now</a>
                            </div>
                            <div class="card-footer text-body-secondary">
                                ' . $time . '
                            </div>
                        </div>
                    </div>
                ';
            }
        }

    ?>

    </div>

        <!-- <div>
            <div class="card text-center my-3">
                <div class="card-header">
                    Featured
                </div>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer text-body-secondary">
                    2 days ago
                </div>
            </div>
        </div> -->  
        <?php include "./partials/_footer.php" ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
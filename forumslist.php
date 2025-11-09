<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Categories -- G-Discuss!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+DE+Grund:wght@100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "National Park", sans-serif !important;
            font-optical-sizing: auto;
        }

        .uimage {
            width: 34px;
            height: 34px;
        }
    </style>
</head>

<body>
    <?php include "./partials/_dbconnect.php" ?>
    <?php include "./partials/_header.php" ?>

    <?php
    $id = $_GET["cid"];
    $sql = "SELECT * FROM `categories` WHERE `category_id`=$id";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $catdesc = $row["category_description"];
        $cattitle = $row["category_name"];
        $formatted_date = date("F j, Y", strtotime($row["createdAt"]));
    }
    ?>
    <?php
    $showAlert = false;
    $method = $_SERVER["REQUEST_METHOD"];
    if ($method == "POST") {
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        // remove any <> from our comment and replate it with &lt; and &gt;

        $reth_title = str_replace("<", "&lt;", $th_title);
        $reth_title2 = str_replace(">", "&gt;", $reth_title);

        $reth_desc = str_replace("<", "&lt;", $th_desc);
        $reth_desc2 = str_replace(">", "&gt;", $reth_desc);

        $checkUsername = $_SESSION['username'];
        $sql2 = "SELECT user_id FROM `users` WHERE `username`='$checkUsername'";
        $result2 = mysqli_query($conn, $sql2);

        $row2 = mysqli_fetch_assoc($result2);
        $thread_by_id = $row2['user_id'];

        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$reth_title2', '$reth_desc2', '$id', '$thread_by_id', current_timestamp())";

        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success ! </strong>Your thread is added wait for sometime while any other respond to your thread.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
        }
    }
    ?>
    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title fs-1 text-warning-emphasis">Welcome to' <?php echo $cattitle; ?> 'forums</h5>
            <p class="card-text fs-5 text-info-emphasis">'<?php echo $catdesc; ?>'</p>
            <a href="forumsGuidelines.php" class="btn btn-warning">Read Forums Guidelines</a>
        </div>
        <div class="card-footer text-body-secondary fs-6">created on : ' <?php echo $formatted_date; ?> '</div>
    </div>

    <div class="container my-5">
        <h2>Start a Dicussion</h2>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '
            
            <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Problem Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="" Enter your problem title.>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Details description about your problem.</label>
                    <textarea class="form-control" id="desc" name="desc" rows="5"></textarea>
                </div>
            <button type="submit" class="btn btn-warning">Post</button>
            </form>';
        } else {
            echo '<div class="fs-5">You are not login.Please login for posting anything.</div>';
        }
        ?>

        <?php
        $id = $_GET['cid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);
        $hasResults = false;

        // <!--  iterate through loop in categories -->
        while ($row = mysqli_fetch_assoc($result)) {
            $hasResults = true;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $time = $formatted_date = date("F j, Y", strtotime($row["timestamp"]));
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT username FROM `users` WHERE user_id=$thread_user_id";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);

            $username = $row2['username'];

            echo '
            <div class="card d-flex mb-2">
                <div class="d-flex align-items-center justify-content-between gap-2 card-header">
                <div>
                <img src="./public/user.jpg" class="uimage rounded-full">
                ' . $username . '
                </div>
                <div>since ' . $time . '</div>
                </div>
                <div class="card-body">
                    <a class="float-right" href="threads.php?tid=' . $id . '">' . $title . '</a>
                    <blockquote class="blockquote bg-warning-subtle mb-0 p-2 rounded">
                        <p class="fs-6"> ' . $desc . '</p>
                    </blockquote>
                </div>
            </div>
            ';
        }
        if (!$hasResults) {
            echo "<div class='fs-3'>No Question found regarding this topic</div>
                <div>Be the first person to ask your question,</div>";
        }
        ?>
    </div>

    <?php include "./partials/_footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
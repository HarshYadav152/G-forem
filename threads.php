<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>G-Discuss! -- Tech Community</title>
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
    $threadid = $_GET['tid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$threadid";
    $result = mysqli_query($conn, $sql);

    // <!--  iterate through loop in categories -->
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $time = $formatted_date = date("F j, Y", strtotime($row["timestamp"]));

        $thread_uid = $row['thread_user_id'];
        // for getting username for the thread added 
        $sqlUsername = "SELECT * from users WHERE `user_id`='$thread_uid'";
        $resultUsername = mysqli_query($conn, $sqlUsername);

        $rowUsername = mysqli_fetch_assoc($resultUsername);
        $threadUsername = $rowUsername['username'];

        
    }
    ?>
    <?php
    $showAlert = false;
    $method = $_SERVER["REQUEST_METHOD"];
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        if ($method == "POST") {
            $comment = $_POST['comment'];
            // remove any <> from our comment and replate it with &lt; and &gt;
            $reComment = str_replace("<", "&lt;", $comment);
            $reComment2 = str_replace(">", "&gt;", $reComment);

            $checkUsername = $_SESSION['username'];
            // echo $checkUsername;
            // retrive user_id from db
            $sql2 = "SELECT user_id FROM `users` WHERE `username`='$checkUsername'";
            $result2 = mysqli_query($conn, $sql2);

            $row2 = mysqli_fetch_assoc($result2);
            $comment_by_id = $row2['user_id'];
            $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$reComment2', '$threadid', '$comment_by_id', current_timestamp())";

            $result = mysqli_query($conn, $sql);

            $showAlert = true;
            if ($showAlert) {
                echo '  <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success ! </strong>Your comment has beed added. Thankyou for your time.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                ';
            }
        }
    }
    ?>

    <div class="card text-center">
        <div class="card-body">
            <h5 class="card-title fs-1 text-warning-emphasis"><?php echo $title ?> forums</h5>
            <p class="card-text fs-5 text-info-emphasis"><?php echo $desc ?> </p>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-between">
            <div class="btn btn-success text-left">By <b><?php echo $threadUsername; ?></b></div>
            <div>since : <?php echo $time ?></div>
        </div>
    </div>

    <div class="container my-5">
        <h3>Post a comment.</h3>
        <?php
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '
            <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Describe your solution</label>
                    <textarea class="form-control" id="comment" name="comment" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-warning">Add comment</button>
            </form>';
        } else {
            echo '<div class="fs-5">You are not loggedin. Please login for post a comment.</div>';
        }
        ?>


        <?php
        $thread_id = $_GET['tid'];
        $sql = "SELECT * FROM `comments` WHERE thread_id=$thread_id";
        $result = mysqli_query($conn, $sql);
        $hasResults = false;

        // <!--  iterate through loop in categories -->
        while ($row = mysqli_fetch_assoc($result)) {
            $hasResults = true;
            // $id = $row['thread_id'];
            $comment = $row['comment_content'];
            $date = new DateTime($row["comment_time"]);
            $time = $date->format('F j, Y \a\t h:i A');

            $comment_by = $row['comment_by'];
            $sql2 = "SELECT username FROM `users` WHERE user_id=$comment_by";
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
                <div>' . $time . '</div>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote bg-warning-subtle mb-0 p-2 rounded">
                        <p class="fs-6"> ' . $comment . '</p>
                    </blockquote>
                </div>
            </div>
            ';
        }
        if (!$hasResults) {
            echo "<div class='fs-3'>No Comments found regarding this thread</div>
                <div>Be the first person to ask your question,</div>";
        }
        ?>
    </div>

    <?php include "./partials/_footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
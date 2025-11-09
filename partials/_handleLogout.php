<?php
session_start();
echo "<div class='d-flex align-items-center justify-content-center'>
        <div>Logging out, Please wait.</div>
      </div>";
session_unset();

session_destroy();

header("Location: /forumsapplication/index.php?logout=true");

?>
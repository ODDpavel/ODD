<?php
session_start();
require_once 'header.php';
require_once 'footer.php';
session_destroy();
?>
<div class="container container-top">
    <h4> You have been logged out. <a href="../index.php">Go back</a></h4>
</div>
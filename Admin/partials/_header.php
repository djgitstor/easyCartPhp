<nav class="navigation">
<ul class="d-flex navmenu">
    <div class="d-flex">
    <li class="Homelink"><a href="index.php">

        <?php 
        
        session_start();
        if (!isset($_SESSION['admin'])) {
            echo 'Welcome Admin';
        }else{
            echo 'Welcome  ' . $_SESSION['admin'] ;
        }
        ?>
    
    </a></li>
</div>
<div>
<!-- <li class="raglink"><a href="signin.php"> SignIn </a></li> -->
<?php
        
        if (!isset($_SESSION['admin'])) {
            echo '<li class="raglink" style="
            width: fit-content;
        "><a href="signin.php"> SignIn </a></li>';
        } else {
            echo '<li class="raglink"style="
            width: fit-content;
        "><a href="partials/Logout.php"> SignOut </a></li>';
        }
        ?>
</div>
</ul>
<ul>
</ul>
</nav>

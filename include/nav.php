<?php include 'active.php';
require_once 'db.php';
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/index.php">WtfWeb</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
	            <?php
	            getNav($db, function ($row){
		            echo  '<li ' . isActive($row['slug']) . '><a href="index.php?p=' . $row['slug'] . '">' . $row['nav_title'] . '</a></li>';
                    });
	            ?>
            </ul>

        </div>
    </div>
</nav>


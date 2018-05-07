<?php
require '../include/db.php';

if(isset($_POST['id'])){
	$id = htmlentities($_POST['id']);
}

if (deletePage($db, $id)) {
	redirectToIndex();
}
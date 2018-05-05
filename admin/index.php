<?php
require '../include/db.php'
?>

<ul>
	<?php
    $page = isset($_GET['page']) ? max(0, intval($_GET['page'])) : 0;
    $pages = getPages($db, $page);

	foreach ( $pages as $page ) {
		?>

        <li><?= $page['title'] ?></li>
	<?php } ?>


</ul>

<form method="post">
	<input name="title" type="text" placeholder="Title">
	<input name="pageTitle" type="text" placeholder="Page title">
	<input name="text" type="text" placeholder="Text">
	<input name="tagClass" type="text" placeholder="Tag class">
	<input name="tagText" type="text" placeholder="Tag text">
	<input name="imgDescription" type="text" placeholder="Image description">
	<input name="imgSrc" type="text" placeholder="Image source">
	<input name="navTitle" type="text" placeholder="Menu title">
	<input type="submit">
</form>
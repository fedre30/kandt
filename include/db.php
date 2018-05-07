<?php

/**
 * @connection to DATABASE
 *
 * @functions for CRUD divided into four sections:
 * - CREATE = @addPage function to add a page to database
 * - READ   = @getPage, @getPages, @getPageID functions get pages and every page's details
 * - UPDATE = @editPage function to edit a page by its ID
 * - DELETE = @deletePage function for deleting a page by its ID
 *
 * @redirectToIndex : redirection to admin page
 *
 * @generateSlug : generation of a slug from page title
 */

const DB_NAME = "kandt";
const DB_PORT = 8889;
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASSWORD = 'root';

$dsn = 'mysql:host=' . DB_HOST . ':' . DB_PORT . ';dbname=' . DB_NAME;

$options = array(
	PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

$db = new PDO($dsn, DB_USER, DB_PASSWORD, $options);



//CREATE

function addPage($db, $title, $h1, $p, $span_class, $span_text, $img_alt, $img_src, $nav_title){
	$stmt = $db->prepare(
		'INSERT INTO `page`(`slug`,`title`,`h1`,`p`,`span_class`,`span_text`,`img_alt`,`img_src`,`nav_title`)
		VALUES ( :slug, :title, :h1, :p, :span_class, :span_text, :img_alt, :img_src, :nav_title)');
		$stmt->execute([
			':slug' => generateSlug($title),
			':title' => $title,
			':h1' => $h1,
			':p' => $p,
			':span_class' => $span_class,
			':span_text' => $span_text,
			':img_alt' => $img_alt,
			':img_src' => $img_src,
			':nav_title' => $nav_title
		]);

		$result = $stmt->rowCount();

		return $result === 1;


}




//READ

function getPages($db, $page){
	$stmt = $db->prepare('SELECT `id`, `slug`, `title` FROM `page` LIMIT 20 OFFSET :ppage');
	$stmt->bindValue(':ppage', (int) $page, PDO::PARAM_INT);
	$stmt->execute();
	return $stmt->fetchAll();
}

function getPage($db, $slug){
	$stmt = $db->prepare('SELECT `id`, `slug`, `title`, `h1`, `p`, `span_class`, `span_text`, `img_alt`, `img_src`, `nav_title` FROM `page` WHERE `slug` = :slug');
	$stmt->execute([
		':slug' => $slug
	]);

	return $stmt->fetch();
}

function getPageID($db, $id){
	$stmt = $db->prepare('SELECT `id`, `slug`, `title`, `h1`, `p`, `span_class`, `span_text`, `img_alt`, `img_src`, `nav_title` FROM `page` WHERE `id` = :id');
	$stmt->execute([
		':id' => $id
	]);

	return $stmt->fetch();
}

function getNav($db, $callback){
	$stmt = $db->prepare('SELECT `slug`, `nav_title` FROM `page`');
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	while($row !== false){
		$callback($row);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
	}
}


//UPDATE

function editPage($db, $id, $title, $h1, $p, $span_class, $span_text, $img_alt, $img_src, $nav_title){
	$stmt = $db->prepare(
		'UPDATE page SET `slug`= :slug, `title` = :title, `h1` = :h1, `p` = :p, `span_class`= :span_class, `span_text` = :span_text, `img_alt`= :img_alt, `img_src`= :img_src, `nav_title` = :nav_title WHERE id = :id');
	$stmt->execute([
		':id' => $id,
		':slug' => generateSlug($title),
		':title' => $title,
		':h1' => $h1,
		':p' => $p,
		':span_class' => $span_class,
		':span_text' => $span_text,
		':img_alt' => $img_alt,
		':img_src' => $img_src,
		':nav_title' => $nav_title
	]);

	$result = $stmt->rowCount();

	return $result === 1;

}


//DELETE

function deletePage($db, $id){
	$stmt = $db->prepare('DELETE FROM `page` WHERE id = :id');
	$stmt->execute([
		':id' => $id
	]);
	return $stmt->rowCount() === 1;
}


//REDIRECTION

function redirectToIndex() {
	header("Location: /admin");
	die();
}

// GENERATE

function generateSlug($title) {
	$title = strtolower($title); // Transform title to lowercase
	$title = str_replace(' ', '-', $title); //replace spaces with hyphens
	$title = preg_replace('/[^A-Za-z0-9\-]/', '', $title); // Remove all special characters
	return $title;
}


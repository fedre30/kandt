<!DOCTYPE html>
<html lang="en">
<?php include 'include/head.php';
include 'include/nav.php';
require_once "include/db.php";
// definition de la page par defaut
define('APP_DEFAUT_PAGE', 'teletubbies');
define('APP_PAGE_PARAM', 'p');
// est-ce que j'ai le parametre p dans l'url? (isset)
if (isset($_GET[APP_PAGE_PARAM])) {
	// si oui, affectation de p dans $currentPage
	$currentPage = $_GET[APP_PAGE_PARAM];
} else {
	// si non, affectation de la page par defaut dans $currentPage
	$currentPage = APP_DEFAUT_PAGE;
}

// est-ce que ce $currentPage pointe vers une page qui existe?
$page = getPage($db, $currentPage);

if ($page === null) {
    //response code 404 et affichage de la page par defaut
	http_response_code(404);
	$currentPage = APP_DEFAUT_PAGE;
	$page = &$content[$currentPage];
}
?>
<div class="container theme-showcase" role="main">
    <div class="jumbotron">
        <h1><?=$page['h1']?></h1>
        <p><?=$page['p']?></p>
        <span class="label <?=$page['span_class']?>"><?=$page['span_text']?></span>
    </div>
    <img class="img-thumbnail" alt="<?=$page['img_alt']?>" src="img/<?=$page['img_src']?>" data-holder-rendered="true">
</div>

<div style="margin: 100px auto; text-align: center;"><a href="admin/index.php">Go to admin Page</a></div>
<?php include "include/footer.php"?>

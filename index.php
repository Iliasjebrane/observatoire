<?php
require_once(__DIR__ . "/helpers/autoloader.php");
// use App\Models\Population;

// $popuModel = new Population();

// $popuModel->getPopulationLast12Month_v2();


if (str_starts_with($_SERVER['REQUEST_URI'], "/observatoire/admin")) {
    require_once(__DIR__ . "/router/router.php");

} else {

    include 'inc/header.php';

    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $page = htmlentities($_GET['page']);
        $pages = array(
            'articles',
            'add-article',
            'contents',
            'add-content',
            'edit-content',
            'add-suggestion',
            'add-suggestionMRE',
            'suggestions',
            'suggestionsMRE',
            'show-article'

        );
        if (in_array($page, $pages))
            getPage($page);
        else
            getPage('404');
    } else {
        getPage('index');
    }

    include 'inc/footer.php';

}
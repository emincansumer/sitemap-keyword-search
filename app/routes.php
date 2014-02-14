<?php

use Goutte\Client;

$app->get('/', function () use ($app) {
    $app->render('home.php');
});

$app->post('/search', function () {
    $sites = get_sitemap_sites($_POST['sitemap']);
    echo json_encode($sites);
});

$app->post('/process', function () use ($app) {
    $url     = $_POST['url'];
    $keyword = $_POST['keyword'];

    $client  = new Client();
    $crawler = $client->request('GET', $url);
    $node    = $crawler->filter('body');
    $count   = $crawler->filter('body')->count();
    if($count > 0){
        $html = $node->text();
        if(stristr($html, $keyword)){
            echo 1;
            exit;
        }
        echo 0;
    }    
    exit;
});
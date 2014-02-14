<?php

function get_sitemap_sites($sitemap_url)
{
    $sites   = array();
    $xml = simplexml_load_file($sitemap_url); 

    foreach($xml->url as $loc){
        $sites[] = (string) $loc->loc;
    }

    return $sites;
}
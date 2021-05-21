<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

$json = [];

foreach( $page->children()->listed() as $post ){
  $json[] = [
    'url' => (string)$post->uri(),
    'title' => (string)$post->title()
  ];
}

echo json_encode($json);

<?php

$json = [];

foreach($site->children() as $item) {

  $json[] = [
    'url'   => (string)$item->url(),
    'title' => (string)$item->title(),
  ];

}

echo json_encode($json);

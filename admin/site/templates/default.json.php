<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

$json = [
  'url' => (string)$page->url(),
  'title' => (string)$page->title(),
  'text' => (string)$page->text()->kt(),
];

echo json_encode($json);

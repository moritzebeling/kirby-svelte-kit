<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

$json = [
  'time' => date('Y-m-d H:i:s'),
  'url' => (string)$page->url(),
  'title' => (string)$page->title(),
  'text' => (string)$page->text()->kt(),
];

echo json_encode($json);

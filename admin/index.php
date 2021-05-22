<?php

$root = 'admin';

require 'kirby/bootstrap.php';

$kirby = new Kirby([
    'roots' => [
        'index'    => __DIR__,
        'base'     => $base    = dirname(__DIR__),
        'content'  => $base . '/content',
        'site'     => $base . '/'.$root.'/site',
        'assets'   => $base . '/'.$root.'/assets',
        'storage'  => $storage = $base . '/'.$root.'/storage',
        'accounts' => $storage . '/accounts',
        'cache'    => $storage . '/cache',
        'sessions' => $storage . '/sessions',
    ]
]);

echo $kirby->render();

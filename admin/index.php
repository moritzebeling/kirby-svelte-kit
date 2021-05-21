<?php

require 'kirby/vendor/autoload.php';

$admin = 'admin';

$kirby = new Kirby(
    [
        'roots' => [
            'index'    => __DIR__,
            'base'     => $base    = dirname(__DIR__),
            'content'  => $base . '/content',
            'site'     => $base . '/'.$admin.'/site',
            'assets'   => $base . '/'.$admin.'/assets',
            'storage'  => $storage = $base . '/'.$admin.'/storage',
            'accounts' => $storage . '/accounts',
            'cache'    => $storage . '/cache',
            'sessions' => $storage . '/sessions',
        ]
    ]
);

echo $kirby->render();

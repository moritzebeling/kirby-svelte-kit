<?php

Kirby::plugin('moritzebeling/site', [
    'routes' => [
        [
            'pattern' => 'index.json',
            'action'  => function() {

                $json = [];
                foreach(kirby()->site()->index()->listed() as $page) {
                    $json[] = [
                        'slug' => $page->uri(),
                        'title' => (string)$page->title(),
                    ];
                }
                return $json;

            }
        ],
        [
            'pattern' => 'sitemap.json',
            'action'  => function() {

                $domain = option('frontend.url');

                $json = [];
                foreach(kirby()->site()->index()->listed() as $page) {
                    $json[] = [
                        'loc' => $domain.'/'. $page->uri(),
                        'lastmod' => $page->modified('c', 'date'),
                        'priority' => $page->isHomePage() ? 1 : number_format( 0.8 / $page->depth(), 1 ),
                        'image' => ( $image = $page->titleImage()->toFile() ) ? $image->url() : false
                    ];
                }
                return $json;

            }
        ],
    ]
]);

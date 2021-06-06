<?php

date_default_timezone_set('Europe/Berlin');

Str::$language = [
	'ä' => 'ae',
	'ö' => 'oe',
	'ü' => 'ue',
	'ß' => 'ss',
	't’s' => 'ts',
	'n’t' => 'nt',
	't\'s' => 'ts',
	'n\'t' => 'nt',
];

return [

	'frontend.url' => 'https://kirby-svelte-kit.netlify.app',
	'pju.webhook-field.hooks' => [
		'netlify_deploy' => [
			'url' => 'https://api.netlify.com/build_hooks/60aa586197bedd414680eed8'
		]
	],

	'debug' => true,
	'whoops' => true,

	'locale' => 'en_US.utf-8',
	'smartypants' => true,

	'thumbs' => [
		'autoOrient' => false,
		'quality' => 80,
		'presets' => [
			'mini' => ['width' => 64],
			's' => ['width' => 426],
			'm' => ['width' => 1280],
			'l' => ['width' => 1920],
			'xl' => ['width' => 2560],
		],
		'srcsets' => [
			's' => [320, 426, 640],
			'm' => [426, 640, 854, 1280],
			'l' => [640, 854, 1280, 1920],
			'xl' => [640, 854, 1280, 1920, 2560],
		]
	],
];

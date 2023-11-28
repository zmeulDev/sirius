<?php

return [ 

	/*
	|--------------------------------------------------------------------------
	| Application Name
	|--------------------------------------------------------------------------
	|
	| This value is the name of your application. This value is used when the
	| framework needs to place the application's name in a notification or
	| any other location as required by the application or its packages.
	|
	*/

	'name' => env('APP_NAME', 'Sirius'),


	'public' => [
		'global' => [
			'css' => [
				'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				'css/style.css',
			],
			'js' => [
				'top'=> [
					'vendor/global/global.min.js',
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
				],
				'bottom'=> [
					'js/custom.min.js',
					'js/dlabnav-init.js',
					
				],
			],
		],
		'pagelevel' => [
			'css' => [
				'VoraAdminController_profile_password' => [
					'vendor/toastr/css/toastr.min.css',
				],
			],
			'js' => [
				'VoraAdminController_profile_password' => [
					'vendor/toastr/js/toastr.min.js',
					'js/plugins-init/toastr-init.js',
				],
			]
		],
	]
];

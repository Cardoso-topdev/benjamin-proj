<?php

require_once '../vendor/autoload.php';
require_once '../app/LinkResolver.php';
require_once '../app/includes/PrismicHelper.php';
require_once '../config.php';

// Initialize the Slim & prismic apps
$composer = json_decode(file_get_contents(__DIR__.'/../composer.json'));
$config = ['settings' => [
    'version'        => $composer->version,
    'prismic.url'    => PRISMIC_URL,
    'prismic.token'  => PRISMIC_TOKEN,
    'site.title'     => SITE_TITLE,
    'site.description' => SITE_DESCRIPTION,
    'displayErrorDetails' => DISPLAY_ERROR_DETAILS,
]];
$app = new \Slim\App($config);
$prismic = new PrismicHelper($app);

global $WPGLOBAL;
$WPGLOBAL = array(
    'app' => $app,
    'prismic' => $prismic,
);

// Launch the app
require_once __DIR__.'/../app/app.php';
$app->run();

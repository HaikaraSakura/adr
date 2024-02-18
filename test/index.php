<?php

declare(strict_types=1);

use Haikara\Adr\Http\Payload\ViewAdapter\Typewriter\TypewriterAdapter;
use Haikara\Adr\Test\IndexAction;
use Haikara\Adr\Test\IndexResponder;
use Haikara\Typewriter\Typewriter;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

ini_set('display_errors', 'On');

require_once __DIR__ . '/../vendor/autoload.php';

$psr17Factory = new Psr17Factory();

$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$templateEngine = new TypewriterAdapter(new Typewriter(), $psr17Factory->createResponse());
$templateEngine->setBasePath(__DIR__ . '/templates');

$responder = new IndexResponder($templateEngine);
$action = new IndexAction($responder);

$request = $creator->fromGlobals();
echo $action($request, [])->getBody();

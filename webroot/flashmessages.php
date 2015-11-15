<?php 
/**
 * This is an Anax pagecontroller.
 *
 */

// Get environment & autoloader and the $app-object.
require __DIR__.'/config_with_app.php';


$di->setShared('flashmessage', function() use ($di){
    $flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
    $flashMessages->setDI($di);
    return $flashMessages;
}); 

// Test Route
$app->router->add('', function() use ($app) {
	$app->theme->addStylesheet('css/flashmsg.css');
	$app->theme->setTitle("Flash messages");

	$app->flashmessage->alert('Testing alert');
	$app->flashmessage->notice('Testing notice');
	$app->flashmessage->success('Testing success');
	$app->flashmessage->info('Testing info');
	$app->flashmessage->error('Testing error');
	$app->flashmessage->warning('Testing warning');

	$app->views->add('theme/index', ['content' => $app->flashmessage->outputMsgs()]);

	$app->flashmessage->clearMessages();

});

// Check for matching routes and dispatch to controller/handler of route
$app->router->handle();
// Render the response using theme engine.
$app->theme->render();
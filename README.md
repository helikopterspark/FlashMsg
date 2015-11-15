# FlashMessageControl

This is a module for the Anax-MVC web framework. The module has been developed as a part of a course on Blekinge Tekniska Högskola.

Flash messages are used to display status messages, results of actions or notices. Use this component to generate these types of messages.

#Installation

1. To install, use composer.
2. Add this line into your composer.json file:
```
"require": {"helikopterspark/flashmsg": "dev-master"}
```
3. Move or copy the css/flashmsg.css file to the webroot/css folder in your Anax-MVC installation.
4. In the router you also need to add the css-stylesheet flashmsg.css.
5. You can move or copy the file flashmessages.php to your webroot to test in a web browser.

#Access the controller in your frontcontroller:

```
$di->setShared('flashmessage', function() use ($di){
    $flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
    $flashMessages->setDI($di);
    return $flashMessages;
});
```

#Add the route in your front controller:

```
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
```
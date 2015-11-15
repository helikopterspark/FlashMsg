# FlashMessageControl

This is a module for the Anax-MVC web framework. The module has been developed as a part of a course on Blekinge Tekniska Högskola.

Flash messages are used to inform the user about the state of the action he / she has made or simply displaying information to users. These types of messages can be generated using this component.

#Installation

1. To install, use composer.
2. Add this line into your composer.json file: "require": {"helikopterspark/flashmsg": "dev-master"}

#Access the controller in your frontcontroller:

```
$di->setShared('flashmessage', function() use ($di){
    $flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
    $flashMessages->setDI($di);
    return $flashMessages;
});
```

In the router you also need to add the css-stylesheet flashmsg.css.


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
You can move or copy the file flashmessages.php to your webroot to test.
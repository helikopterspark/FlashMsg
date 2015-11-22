<?php

namespace helikopterspark\FlashMsg;

/**
 * A test class
 *
 */
 class FlashMsgTest extends \PHPUnit_Framework_TestCase {

    /**
     * Test
     *
     * @return void
     */
     public function testSetMessage() {
        $message = new \helikopterspark\FlashMsg\FlashMsg();
        $di = new \Anax\DI\CDIFactoryDefault();
        $message->setDI($di);

        $di->setShared('session', function () {
            $session = new \Anax\Session\CSession();
            $session->configure(ANAX_APP_PATH . 'config/session.php');
            $session->name();
            //$session->start();
            return $session;
        });

        $di->setShared('flashmessage', function() use ($di){
        	$flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
        	$flashMessages->setDI($di);
        	return $flashMessages;
        });

        $type = 'Alert';
        $text = 'Message text.';

        $message->flashmessage->setMessage('Alert', 'Message text.');
        $res = $di->session->get('flashmsgs');
        foreach ($res as $key => $value) {
            $this->assertEquals($type, $value['type'], "Type mismatch.");
            $this->assertEquals($text, $value['content'], "Content mismatch.");
        }
     }
 }

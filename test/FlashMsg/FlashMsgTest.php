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
         // Setup
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

        // Test
        $type = 'Alert';
        $text = 'Message text';

        $message->flashmessage->setMessage('Alert', 'Message text');
        $res = $di->session->get('flashmsgs');
        foreach ($res as $key => $value) {
            $this->assertEquals($type, $value['type'], "Type mismatch.");
            $this->assertEquals($text, $value['content'], "Content mismatch.");
        }
     }

     /**
      * Test
      *
      * @return void
      */
      public function testAlert() {
          // Setup
          $message = new \helikopterspark\FlashMsg\FlashMsg();
          $di = new \Anax\DI\CDIFactoryDefault();
          $message->setDI($di);

          $di->setShared('session', function () {
              $session = new \Anax\Session\CSession();
              $session->configure(ANAX_APP_PATH . 'config/session.php');
              $session->name();
              return $session;
          });

          $di->setShared('flashmessage', function() use ($di){
          	$flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
          	$flashMessages->setDI($di);
          	return $flashMessages;
          });

          // Test
          $type = 'alert';
          $text = 'Alert flash message';

          $message->flashmessage->alert('Alert flash message');
          $res = $di->session->get('flashmsgs');
          foreach ($res as $key => $value) {
              $this->assertEquals($type, $value['type'], "Type mismatch.");
              $this->assertEquals($text, $value['content'], "Content mismatch.");
          }
      }

      /**
       * Test
       *
       * @return void
       */
       public function testError() {
           // Setup
           $message = new \helikopterspark\FlashMsg\FlashMsg();
           $di = new \Anax\DI\CDIFactoryDefault();
           $message->setDI($di);

           $di->setShared('session', function () {
               $session = new \Anax\Session\CSession();
               $session->configure(ANAX_APP_PATH . 'config/session.php');
               $session->name();
               return $session;
           });

           $di->setShared('flashmessage', function() use ($di){
           	$flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
           	$flashMessages->setDI($di);
           	return $flashMessages;
           });

           // Test
           $type = 'error';
           $text = 'Error flash message';

           $message->flashmessage->error('Error flash message');
           $res = $di->session->get('flashmsgs');
           foreach ($res as $key => $value) {
               $this->assertEquals($type, $value['type'], "Type mismatch.");
               $this->assertEquals($text, $value['content'], "Content mismatch.");
           }
       }

       /**
        * Test
        *
        * @return void
        */
        public function testInfo() {
            // Setup
            $message = new \helikopterspark\FlashMsg\FlashMsg();
            $di = new \Anax\DI\CDIFactoryDefault();
            $message->setDI($di);

            $di->setShared('session', function () {
                $session = new \Anax\Session\CSession();
                $session->configure(ANAX_APP_PATH . 'config/session.php');
                $session->name();
                return $session;
            });

            $di->setShared('flashmessage', function() use ($di){
            	$flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
            	$flashMessages->setDI($di);
            	return $flashMessages;
            });

            // Test
            $type = 'info';
            $text = 'Info flash message';

            $message->flashmessage->info('Info flash message');
            $res = $di->session->get('flashmsgs');
            foreach ($res as $key => $value) {
                $this->assertEquals($type, $value['type'], "Type mismatch.");
                $this->assertEquals($text, $value['content'], "Content mismatch.");
            }
        }

        /**
         * Test
         *
         * @return void
         */
         public function testNotice() {
             // Setup
             $message = new \helikopterspark\FlashMsg\FlashMsg();
             $di = new \Anax\DI\CDIFactoryDefault();
             $message->setDI($di);

             $di->setShared('session', function () {
                 $session = new \Anax\Session\CSession();
                 $session->configure(ANAX_APP_PATH . 'config/session.php');
                 $session->name();
                 return $session;
             });

             $di->setShared('flashmessage', function() use ($di){
             	$flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
             	$flashMessages->setDI($di);
             	return $flashMessages;
             });

             // Test
             $type = 'notice';
             $text = 'Notice flash message';

             $message->flashmessage->notice('Notice flash message');
             $res = $di->session->get('flashmsgs');
             foreach ($res as $key => $value) {
                 $this->assertEquals($type, $value['type'], "Type mismatch.");
                 $this->assertEquals($text, $value['content'], "Content mismatch.");
             }
         }

         /**
          * Test
          *
          * @return void
          */
          public function testSuccess() {
              // Setup
              $message = new \helikopterspark\FlashMsg\FlashMsg();
              $di = new \Anax\DI\CDIFactoryDefault();
              $message->setDI($di);

              $di->setShared('session', function () {
                  $session = new \Anax\Session\CSession();
                  $session->configure(ANAX_APP_PATH . 'config/session.php');
                  $session->name();
                  return $session;
              });

              $di->setShared('flashmessage', function() use ($di){
              	$flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
              	$flashMessages->setDI($di);
              	return $flashMessages;
              });

              // Test
              $type = 'success';
              $text = 'Success flash message';

              $message->flashmessage->success('Success flash message');
              $res = $di->session->get('flashmsgs');
              foreach ($res as $key => $value) {
                  $this->assertEquals($type, $value['type'], "Type mismatch.");
                  $this->assertEquals($text, $value['content'], "Content mismatch.");
              }
          }

          /**
           * Test
           *
           * @return void
           */
           public function testWarning() {
               // Setup
               $message = new \helikopterspark\FlashMsg\FlashMsg();
               $di = new \Anax\DI\CDIFactoryDefault();
               $message->setDI($di);

               $di->setShared('session', function () {
                   $session = new \Anax\Session\CSession();
                   $session->configure(ANAX_APP_PATH . 'config/session.php');
                   $session->name();
                   return $session;
               });

               $di->setShared('flashmessage', function() use ($di){
               	$flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
               	$flashMessages->setDI($di);
               	return $flashMessages;
               });

               // Test
               $type = 'warning';
               $text = 'Warning flash message';

               $message->flashmessage->warning('Warning flash message');
               $res = $di->session->get('flashmsgs');
               foreach ($res as $key => $value) {
                   $this->assertEquals($type, $value['type'], "Type mismatch.");
                   $this->assertEquals($text, $value['content'], "Content mismatch.");
               }
           }

           /**
            * Test
            *
            * @return void
            */
            public function testOutputMsgs() {
                // Setup
                $message = new \helikopterspark\FlashMsg\FlashMsg();
                $di = new \Anax\DI\CDIFactoryDefault();
                $message->setDI($di);

                $di->setShared('session', function () {
                    $session = new \Anax\Session\CSession();
                    $session->configure(ANAX_APP_PATH . 'config/session.php');
                    $session->name();
                    return $session;
                });

                $di->setShared('flashmessage', function() use ($di){
                	$flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
                	$flashMessages->setDI($di);
                	return $flashMessages;
                });

                // Test
                $html = '<div class="alert"><p>Alert flash message</p></div>';
                $html .= '<div class="error"><p>Error flash message</p></div>';
                $html .= '<div class="info"><p>Info flash message</p></div>';
                $html .= '<div class="notice"><p>Notice flash message</p></div>';
                $html .= '<div class="warning"><p>Warning flash message</p></div>';
                $html .= '<div class="success"><p>Success flash message</p></div>';

                $message->flashmessage->alert('Alert flash message');
                $message->flashmessage->error('Error flash message');
                $message->flashmessage->info('Info flash message');
                $message->flashmessage->notice('Notice flash message');
                $message->flashmessage->warning('Warning flash message');
                $message->flashmessage->success('Success flash message');
                $htmloutput = $message->flashmessage->outputMsgs();

                $this->assertEquals($html, $htmloutput, "Output does not match.");
            }

            /**
             * Test
             *
             * @return void
             */
             public function testClearMessages() {
                 // Setup
                 $message = new \helikopterspark\FlashMsg\FlashMsg();
                 $di = new \Anax\DI\CDIFactoryDefault();
                 $message->setDI($di);

                 $di->setShared('session', function () {
                     $session = new \Anax\Session\CSession();
                     $session->configure(ANAX_APP_PATH . 'config/session.php');
                     $session->name();
                     return $session;
                 });

                 $di->setShared('flashmessage', function() use ($di){
                 	$flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
                 	$flashMessages->setDI($di);
                 	return $flashMessages;
                 });

                 // Test
                 $message->flashmessage->alert('Alert flash message');
                 $message->flashmessage->error('Error flash message');
                 $message->flashmessage->info('Info flash message');
                 $message->flashmessage->notice('Notice flash message');
                 $message->flashmessage->warning('Warning flash message');
                 $message->flashmessage->success('Success flash message');

                 $this->assertTrue($di->session->has('flashmsgs'));
                 $message->flashmessage->clearMessages();
                 $res = $di->session->get('flashmsgs');
                 $this->assertTrue(count($res) === 0);
             }
 }

<?php

namespace helikopterspark\FlashMsg;

/**
 * A test class
 *
 */
 class FlashMsgTest extends \PHPUnit_Framework_TestCase {

     private $di;
     private $message;

     /**
      * Setup
      *
      * @return void
      */
      public function setUp() {
          $this->message = new \helikopterspark\FlashMsg\FlashMsg();
          $this->di = new \Anax\DI\CDIFactoryDefault();
          $this->message->setDI($this->di);

          $this->di->setShared('session', function () {
              $session = new \Anax\Session\CSession();
              $session->configure(ANAX_APP_PATH . 'config/session.php');
              $session->name();
              //$session->start();
              return $session;
          });

          $this->di->setShared('flashmessage', function() {
          	$flashMessages = new \helikopterspark\FlashMsg\FlashMsg();
          	$flashMessages->setDI($this->di);
          	return $flashMessages;
          });
      }

    /**
     * Test
     *
     * @return void
     */
     public function testSetMessage() {
        $type = 'Alert';
        $text = 'Message text';

        $this->message->flashmessage->setMessage('Alert', 'Message text');
        $res = $this->di->session->get('flashmsgs');
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
          $type = 'alert';
          $text = 'Alert flash message';

          $this->message->flashmessage->alert('Alert flash message');
          $res = $this->di->session->get('flashmsgs');
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
           $type = 'error';
           $text = 'Error flash message';

           $this->message->flashmessage->error('Error flash message');
           $res = $this->di->session->get('flashmsgs');
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
            $type = 'info';
            $text = 'Info flash message';

            $this->message->flashmessage->info('Info flash message');
            $res = $this->di->session->get('flashmsgs');
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
             $type = 'notice';
             $text = 'Notice flash message';

             $this->message->flashmessage->notice('Notice flash message');
             $res = $this->di->session->get('flashmsgs');
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
              $type = 'success';
              $text = 'Success flash message';

              $this->message->flashmessage->success('Success flash message');
              $res = $this->di->session->get('flashmsgs');
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
               $type = 'warning';
               $text = 'Warning flash message';

               $this->message->flashmessage->warning('Warning flash message');
               $res = $this->di->session->get('flashmsgs');
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
                $html = '<div class="alert"><p>Alert flash message</p></div>';
                $html .= '<div class="error"><p>Error flash message</p></div>';
                $html .= '<div class="info"><p>Info flash message</p></div>';
                $html .= '<div class="notice"><p>Notice flash message</p></div>';
                $html .= '<div class="warning"><p>Warning flash message</p></div>';
                $html .= '<div class="success"><p>Success flash message</p></div>';

                $this->message->flashmessage->alert('Alert flash message');
                $this->message->flashmessage->error('Error flash message');
                $this->message->flashmessage->info('Info flash message');
                $this->message->flashmessage->notice('Notice flash message');
                $this->message->flashmessage->warning('Warning flash message');
                $this->message->flashmessage->success('Success flash message');
                $htmloutput = $this->message->flashmessage->outputMsgs();

                $this->assertEquals($html, $htmloutput, "Output does not match.");
            }

            /**
             * Test
             *
             * @return void
             */
             public function testClearMessages() {
                 $this->message->flashmessage->alert('Alert flash message');
                 $this->message->flashmessage->error('Error flash message');
                 $this->message->flashmessage->info('Info flash message');
                 $this->message->flashmessage->notice('Notice flash message');
                 $this->message->flashmessage->warning('Warning flash message');
                 $this->message->flashmessage->success('Success flash message');

                 // Check that we have messages in the array
                 $this->assertTrue($this->di->session->has('flashmsgs'));
                 $this->message->flashmessage->clearMessages();
                 $res = $this->di->session->get('flashmsgs');
                 $this->assertTrue(count($res) === 0);
             }
 }

<?php 

namespace Snappy\Apps\BigBoard;

use Snappy\Apps\App as BaseApp;

use Snappy\Apps\IncomingMessageHandler;
use Snappy\Apps\OutgoingMessageHandler;
 
class App extends BaseApp implements IncomingMessageHandler, OutgoingMessageHandler {

	/**
	 * The name of the application.
	 *
	 * @var string
	 */
	public $name = 'BigBoard';

	/**
	 * The application description.
	 *
	 * @var string
	 */
	public $description = 'Generate BigBoard events from Snappy.';

	/**
	 * Any notes about this application
	 *
	 * @var string
	 */
	public $notes = '<p>To generate an API Token, visit your <a href="https://bigboard.us/account/settings/services" target="_blank">BigBoard Service Settings</a> and choose "Connect an app with our API". After you\'ve registered Snappy, copy and paste the generated API token here.</p>";

	/**
	 * The application's icon filename.
	 *
	 * @var string
	 */
	public $icon = 'bigboard.png';

	/**
	 * The application service's website.
	 *
	 * @var string
	 */
	public $website = "https://bigboard.us";

	/**
	 * The application author name.
	 *
	 * @var string
	 */
	public $author = 'The Outfit, Inc.';

	/**
	 * The application author e-mail.
	 *
	 * @var string
	 */
	public $email = 'support@fromtheoutfit.com';

	/**
	 * The settings required by the application.
	 *
	 * @var array
	 */
	public $settings = array(
		array('name' => 'token', 'type' => 'text', 'help' => 'Enter your BigBoard API Token', 'validate' => 'required'),
	);
 
 	/**
	* Get the BigBoard client instance.
	*
	* @return \BigBoardSDK\APIClient
	*/
	public function getClient()
	{
		return new \BigBoardSDK\APIClient($this->config['token']);
	}



   /**
	* Track an incoming message
	*
	* @param array $message
	* @return void
	*/
	public function handleIncomingMessage (array $message)
	{
		$client = $this->getClient();

		$status = $client->sendEvent(
			array (
			    "person_id" => $message['creator']['value'],
			    "person_label" =>  $message['creator']['first_name'].' '. $message['creator']['last_name'],
			    "summary" => $message["ticket"]['default_subject'],
			    "time" => strtotime($message['updated_at']), 
			    "label" => "Incoming Message",
			    'unique_id' => $message['id']."_".$message['ticket_id'],
			    "url"	=> "https://app.besnappy.com/home#ticket/".$message['ticket_id'],
			)
		);
 	
	}

   /**
	* Track an outgoing message
	*
	* @param array $message
	* @return void
	*/
	public function handleOutgoingMessage (array $message)
	{
		$client = $this->getClient();

		$status = $client->sendEvent(
			array (
			    "person_id" => $message['creator']['email'],
			    "person_label" =>  $message['creator']['first_name'].' '. $message['creator']['last_name'],
			    "summary" => $message["ticket"]['default_subject'],
			    "time" => strtotime($message['updated_at']), 
			    "label" => "Outgoing Message",
			    'unique_id' => $message['id']."_".$message['ticket_id'],
			    "url"	=> "https://app.besnappy.com/home#ticket/".$message['ticket_id'],
			)
		);
 	
	}

}

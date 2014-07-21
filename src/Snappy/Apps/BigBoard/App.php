<?php 

namespace Snappy\Apps\BigBoard;

use Snappy\Apps\App as BaseApp;



use Snappy\Apps\WallPostHandler;
use Snappy\Apps\IncomingMessageHandler;
use Snappy\Apps\OutgoingMessageHandler;
use Snappy\Apps\TicketRepliedHandler;
use Snappy\Apps\TicketWaitingHandler;

## not sure if we'll need these...
use Snappy\Apps\ContactCreatedHandler;
use Snappy\Apps\ContactLookupHandler;
use Snappy\Apps\TagsChangedHandler;



class App extends BaseApp {

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
	public $notes = 'Application Notes';

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
		$client = new \BigBoardSDK\APIClient($this->config['token']);
		return $client;
	}







}
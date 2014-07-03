<?php namespace Snappy\Apps\BigBoard;

use Snappy\Apps\App as BaseApp;

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
	public $author = 'Brenden Tamilio';

	/**
	 * The application author e-mail.
	 *
	 * @var string
	 */
	public $email = 'bren@fromtheoutfit.com';

	/**
	 * The settings required by the application.
	 *
	 * @var array
	 */
	public $settings = array();

}
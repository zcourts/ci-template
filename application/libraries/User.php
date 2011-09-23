<?php

/**
 * Description of User
 *
 * @author Courtney
 */
class User
{
	/**
	 *
	 * @var CI_Session
	 */
	private $session;
	/**
	 * A set of messages to be shown to this user...
	 * @var integer
	 */
	private static $messages = 0;
	public function __construct()
	{
		$ci = &get_instance();
		$ci->load->library('session');
		$this->session = $ci->session;
		if (!$this->getRole())
			$this->set('role', 'GUEST');
		//set the user's language if one isn't already set
		if ($this->getLanguage() == FALSE) {
			$this->setLanguage(config_item('default_language'), config_item('default_language_file'));
		}
	}

	/**
	 *
	 * @param array $data an associative array of user properties
	 */
	public function setUserData(array $data)
	{
		if (is_array($data))
			foreach ($data as $key => $value) {
				$this->set($key, $value);
			}
	}

	/**
	 * Set a single user property
	 * @param type $key key
	 * @param type $val value
	 */
	public function set($key, $value)
	{
		$this->session->set_userdata(array($key => $value));
	}

	/**
	 * @param string $key
	 * @return mixed the value for the key specified or false if nothing is set for the key
	 */
	public function get($key)
	{
		return $this->session->userdata($key);
	}

	/**
	 * Removes a user session property
	 * @param string $key 
	 */
	public function remove($key)
	{
		$this->session->unset_userdata($key);
	}

	/**
	 * Set a langage for this user
	 * @param type $lang the language for this user ALSO represents the folder name
	 * @param type $file the file name in the language folder
	 */
	public function setLanguage($lang, $file)
	{
		$this->set('lang', $lang);
		$this->set('lang-file', $file);
	}

	/**
	 * @return The name of the file for this user's language
	 */
	public function getLanguageFile()
	{
		return $this->get('lang-file');
	}

	/**
	 * Get and return the user's language, the string returned is the language filename to be loaded
	 * @return string the name of the user's language
	 */
	public function getLanguage()
	{
		return $this->get('lang');
	}

	/**
	 * Check if current user is signed in
	 * @return boolean true if signed in alse otherwise
	 */
	public function isSignedin()
	{
		return $this->session->userdata("signedin");
	}

	/**
	 * Gets the user's role
	 *
	 * @return Role one of the defined roles
	 */
	public function getRole()
	{
		return $this->get('role');
	}

	public function isAdmin()
	{
		return ($this->getRole() == 'ADMIN') ? true : false;
	}

	public function isGuest()
	{
		return ($this->getRole() == 'GUEST') ? true : false;
	}

	public function isModerator()
	{
		return ($this->getRole() == 'MODERATOR') ? true : false;
	}

	public function isUser()
	{
		return ($this->getRole() == 'USER') ? true : false;
	}

	/**
	 * Adds a messages to be displayed to the user...
	 * @param string $message The message to show the user
	 * @param string $type One of the types defined in MessageType
	 */
	public function addMessage($message, $type)
	{
		$this->set('msg-' . self::$messages, new Message(array('message' => $message, 'type' => $type, 'id' => self::$messages)));
		self::$messages++;
	}

	public function getMessages($print=TRUE)
	{
		if ($print) {
			for ($i = 0; $i <= self::$messages; $i++) {
				$msg = $this->get('msg-' . $i);
				if (!$msg === FALSE) {
					$msg->renderHtml(true);
				}
				$this->remove('msg-' . $i);
			}
		}
		else {
			$msgs = array();
			for ($i = 0; $i <= self::$messages; $i++) {
				$msgs[] = $this->get('msg-' . $i);
			}
			return $msgs;
		}
	}

	/**
	 * Get and return the current user's id
	 * @return integer the user's id in the users table
	 */
	public function getId()
	{
		return $this->session->userdata("userid");
	}

}

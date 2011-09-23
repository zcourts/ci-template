<?php

	/**
	 * Used for login or registration
	 *
	 * @author courtney
	 */
	class Auth extends SNS_Controller {

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			$this->setView("auth", array());
		}

	}

?>

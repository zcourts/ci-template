<?php

	if (!defined('BASEPATH'))
		exit('No direct script access allowed');

	class Home extends SNS_Controller {

		public function index() {
			$this->setView("home", array());
		}

	}

	/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
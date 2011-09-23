<?php

	/**
	 * A base class for providing common functionality accorss all available classes
	 * in the system.
	 * @property CI_Loader $load
	 * @property CI_Form_validation $form_validation
	 * @property CI_Input $input
	 * @property CI_Email $email
	 * @property CI_DB_active_record $db
	 * @property CI_DB_forge $dbforge
	 * @property CI_Session $session
	 * @property Facebook $facebook
	 * @property User $user
	 * @property CI_Lang $language
	 */
	class SNS_Controller extends CI_Controller {

		/**
		 * Data array to be passed to any view
		 */
		protected $data = array();
		protected $urlData = array();

		/**
		 *
		 * @var CI_Lang
		 */
		protected $language;
		private $scriptContent = '';

		public function __construct() {
			parent::__construct();
			$this->load->library('user');
			$this->data['title'] = "";
			$this->data['lastPage'] = $this->_lastPage();
			$this->urlData = $this->uri->uri_to_assoc();
			//load the correct language
			$this->lang->load($this->user->getLanguageFile(), $this->user->getLanguage());
			$this->language = $this->lang;
			$this->data['scripts'] = '';
			$this->data['styles'] = '';
			//if controller is in the url use it otherwise use class name
//		$this->setTitle(ucfirst(count($this->uri->segment(1)) > 0 ? $this->uri->segment(1) : $this->router->fetch_class()));
			$this->setTitle(ucfirst($this->router->fetch_class()));
			if ($this->uri->segment(2) == "theme") {
				$this->setTheme($this->uri->segment(3));
				redirect($this->_lastPage());
			} else {
				$this->_setLastPage();
			}
			$this->addStyle(base_url() ."application/views/". $this->getTheme() . "/style.css");
		}

		/**
		 * A simple wrapper for loading a line from the current language
		 * @param $inject If set then the line is searched and any matching key is replace with their respective values
		 * @return the string that matches the key in the current language
		 */
		public function lang($key, array $inject=NULL) {
			if ($inject === NULL) {
				return $this->language->line($key);
			} else {
				$line = $this->language->line($key);
				if (is_array($inject)) {
					foreach ($inject as $find => $replace) {
						$line = str_replace('{$' . $find . '}', $replace, $line);
					}
					return $line;
				}
			}
		}

		/**
		 * Prepends a string to the title of the current page.
		 * @param string $title the string to prepend to the title 
		 */
		public function setTitle($title) {
			$this->data['title'] = $title;
		}

		private function _setLastPage() {
			$seg = $this->uri->uri_string();
			if (!in_array($seg, config_item('excluded_pages'))) {
				$this->session->set_userdata("last_page", $this->uri->uri_string());
			}
		}

		/**
		 * Adds a javascript file to the page header
		 * 
		 * @param type $url  the location of the script relative to the page or absolute including protocol
		 */
		public function addScript($url) {
			$this->data['scripts'].='<script type="text/javascript" src="' . $url . '"></script>';
		}

		/**
		 * Appends a javascript function (or line(s)) to be included in the page header
		 * @param string $func the contents of the function 
		 */
		public function putScript($func) {
			$this->scriptContent .=$func;
		}

		private function addScriptContent() {
			if ($this->scriptContent) {
				$this->data['scriptContent'] = '
<script type="text/javascript">
$(document).ready(function() {' . $this->scriptContent . '});
</script>
';
			} else {
				$this->data['scriptContent'] = '';
			}
		}

		/**
		 * Adds a style sheet to the page header
		 *
		 * @param type $url 
		 */
		public function addStyle($url) {
			$this->data['styles'].='<link rel="stylesheet" type="text/css" href="' . $url . '" />';
		}

		/**
		 * Gets the URI of the last page the user was on
		 * @return string
		 */
		public function _lastPage() {
			return $this->session->userdata("last_page");
		}

		/**
		 * Redirect the user to the previous page they were on.
		 */
		public function next() {
			redirect(site_url($this->_lastPage()));
		}

		/**
		 * Set view to load in the template
		 * @param string $view 
		 * @param array $parts (optional) an array of views to use in addition to the main content.
		 * These are included in the order stored in the array
		 */
		public function setView($view, $parts=array("sidebar")) {
			$this->addScriptContent(); //put scripts together
			$this->data['signedin'] = $this->user->isSignedin();
			$this->data['user'] = $this->user;
			$this->data['main_content'] = $view;
			$this->data['template_parts'] = $parts;
			$this->load->view($this->getTheme() . "/includes/template", $this->data);
		}

		/**
		 * Gets the contents of a specified view
		 * @param string $name The name of the view to load
		 * @param array $data Any data to be passed to the view (Must be an array)
		 * @return string the view's html
		 */
		public function getView($name, $data) {
			return $this->load->view($name, $data, true);
		}

		/**
		 * Sets which subdirectory of views the view files are loaded from
		 * @param string $name  the theme/folder name
		 */
		public function setTheme($name) {
			$this->session->set_userdata(array('theme' => $name));
		}

		/**
		 * Get the theme name currently in use
		 * @return string The name of the theme's directory
		 */
		public function getTheme() {
			$theme = config_item('default_theme');
			if ($this->session->userdata('theme') != false) {
				$theme = $this->session->userdata('theme');
			}
			return $theme;
		}

		function setShowError($show, $msg=NULL) {
			$this->data["showError"] = $show;
			$this->data["getError"] = '<p class="error">' . $msg . '</p>';
//        $this->session->set_userdata(array("show_error" => $show));
//        if ($msg != NULL)
//            {
//            $this->session->set_userdata(array("error" => $msg));
//            }
		}

		/**
		 * Checks if a user is signed in and redirects them to login
		 * @return void
		 */
		public function authenticate() {
			//must be signed in to access
			if ($this->user->isSignedin() === false) {
				redirect(site_url('auth'));
				return;
			}
		}

	}
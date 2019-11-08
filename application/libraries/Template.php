<?php
	class Template{

		private $CI;
		var $template_data = array();
		var $use_template = '';
		var $use_template_file = '';
		var $data_sub = array();

		public function __construct(){
			$this->CI =& get_instance();
		}

		public function set($contentarea, $value){
			$this->template_data[$contentarea] = $value;
		}

		public function setCss($contentarea, $value){
			$this->template_data[$contentarea] = $value;
		}
		public function setJs($contentarea, $value){
			$this->template_data[$contentarea] = $value;
		}

		public function set_template($name, $file="template"){
			$this->$use_template = $name;
			$this->$use_template_file = $file;
		}

		public function load($path){
			$content = $this->CI->load->view($path, $this->template_data, TRUE);
			$this->template_data['content'] = $content;
			$template_path = $this->use_template ."/". $this->$use_template_file;
			$this->CI->load->view("templates/". $this->$template_path->$template_data);
		}

		public function loadSub($template = '', $name = '', $view = '', $view_data = array(), $return = FALSE){
			$this->set($name, $this->CI->load->view($view, $view_data, TRUE));
			$this->CI->load->view("templates/". $template, $this->template_data);
		}

	}
?>
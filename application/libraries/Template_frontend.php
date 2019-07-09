<?php
	class Template_frontend {
		protected $_ci;

		function __construct() {
			$this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
		}

		function views($template = NULL, $data = NULL) {
			if ($template != NULL) {
				// head
				$data['_header'] 				= $this->_ci->load->view('_layout_frontend/header', $data, TRUE);
				$data['_footer'] 				= $this->_ci->load->view('_layout_frontend/footer', $data, TRUE);
				$data['_content'] 				= $this->_ci->load->view($template, $data, TRUE);
				echo $data['_template'] 		= $this->_ci->load->view('_layout_frontend/_template', $data, TRUE);
			}
		}

		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));			
			return $this->CI->load->view($template, $this->template_data, $return);
		}

	}
?>
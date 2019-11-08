<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function logged_check(){
        if(empty($_SESSION['user']) || $_SESSION['user'] == null){
    	   redirect('/admin/login');
        }
    }

    function login(){
        if(!empty($_SESSION['user'])){
        	redirect('/admin');
        }
    }

    if (!function_exists('validation_errors_array')) {

    function validation_errors_array($prefix = '', $suffix = '') {
        if (FALSE === ($OBJ = & _get_validation_object())) {
            return '';
        }
        return $OBJ->error_array($prefix, $suffix);
    }

    function set_flash($message_type, $message, $redirect=FALSE){
      $CI =& get_instance();
      $CI->session->set_flashdata('flash', array('message_type' => $message_type, 'message' => $message));
      if ($redirect)
        redirect($redirect);
    }

    function display_flash($data=''){
        $display = '';
        if(!empty($data)){
            $display .= '<div class="alert alert-'. $data['flash']['message_type'] .' alert-rounded">';
            $display .= '<i class="fa fa-warning"></i>';
            $display .= $data['flash']['message'] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            $display .= '<span aria-hidden="true">×</span>'; 
            $display .= '</button></div>';
        }
        return $display;
    }

}
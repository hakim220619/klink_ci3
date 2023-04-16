<?php
class MY_Form_validation extends CI_Form_validation{    
     function __construct($config = array()){
          parent::__construct($config);
     }
     
     function password_check($str)
	{
	   if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
	     return TRUE;
	   }
	   return FALSE;
	}

	function nohp_check($str)
    {
     
       if (substr($str, 0, 2)==62){
         return TRUE;
       }
       return FALSE;
    }

    public function file_check($str){
        $allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['file']['name']);
        if(isset($_FILES['file']['name']) && $_FILES['file']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }

    public function image_check($str){
        $allowed_mime_type_arr = array('image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['merek_photo']['name']);
        if(isset($_FILES['merek_photo']['name']) && $_FILES['merek_photo']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('image_check', 'Please select only jpeg/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('image_check', 'Please choose a file to upload.');
            return false;
        }
    }

}
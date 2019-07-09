<?php 
    function cek_session_admin(){
        $ci = & get_instance();
        $session = $ci->session->userdata('status');
        if ($session != 'Loged in'){
            redirect(base_url());
        }
    }
?>
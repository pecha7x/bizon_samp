<?php
include '../../../wp-load.php';
if (!class_exists('task_samp')) {

    class send_messages {
        
        private $theme;
        private $msg;
        private $addr; 
        public  $error=false;
        
        function validation () {
            $this->theme = $_POST['theme'];
            $this->msg  = nl2br($_POST['msg']);
            $this->addr  = nl2br($_POST['addressee']);
            //who is empty?
            foreach ($_POST as $dat) {
                $this->error = (strlen($dat)=="0") ? 'true': 'false';
                (strlen($dat)=="0") ? 'exit': 'continie';
            }
        }
        
        function send_mess () {
            global $wpdb;
            $table_name = $wpdb->prefix."org_messages";
            $wpdb->insert( $table_name, array( 
                                                'theme' => $this->theme, 
                                                'msg' => $this->msg,
                                                'addr' => $this->addr, 
                                                'fr_who' => wp_get_current_user()->user_login, 
                                                'attache' => wp_get_current_user()->id, 
                                                'imp_or_arh' => '',
                                                'new_old' => 'new'
                                              )
                         );
        }

    }
}
  $mess = new send_messages;
  $mess->validation ();
  if($mess->error) $mess->send_mess();
  echo "true";

?>
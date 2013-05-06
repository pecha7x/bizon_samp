<?php
include '../../../wp-load.php';
if (!class_exists('task_samp')) {

    class task_samp {
        
        private $title;
        private $text;
        private $fd; 
        private $td;
        private $director;
        private $performer;
        private $urg_imp;
        public $error=false;
        
        function validation () {
            $this->title=$_POST['title'];
            $this->text=$_POST['text'];
            $this->fd=$_POST['fd']; 
            $this->td=$_POST['td'];
            $this->director=$_POST['director'];
            $this->performer=$_POST['performer'];
            $this->urg_imp=$_POST['urg_imp'];
            //who is empty?
            foreach ($_POST as $dat) {
                $this->error = (strlen($dat)=="0") ? 'true': 'false';
                (strlen($dat)=="0") ? 'exit': 'continie';
            }
        }
        
        function add_new_task () {
            global $wpdb;
            $table_name = $wpdb->prefix."org_tasks";
            $wpdb->insert( $table_name, array( 
                                                'title' => $this->title, 
                                                'text' => $this->text,
                                                'fd' => $this->fd, 
                                                'td' => $this->td, 
                                                'director' => $this->director, 
                                                'performer' => $this->performer, 
                                                'urg_imp' => $this->urg_imp)
                                            );
        }

    }
}
  $vasa = new task_samp;
  $vasa->validation ();
  if($vasa->error){
      $vasa->add_new_task();
      wp_redirect(get_site_url()."?page_id=24");
      die;
  } else {
      wp_redirect(get_site_url());
      die;
  }
  
?>

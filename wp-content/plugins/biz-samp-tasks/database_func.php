<?php
if (!class_exists('database_func')) {

    class database_func {
        
    
        public function get_users() {

            global $wpdb;
            $table_name = $wpdb->prefix . "users";
            $sql = "SELECT * FROM ".$table_name." WHERE user_login != '".wp_get_current_user()->user_login."' ORDER BY ID;";
            $result = $wpdb->get_results($sql, ARRAY_A);
            return $result;
        }
        
        public function get_my_tasks($ug_im) {

            global $wpdb;
            $table_name = $wpdb->prefix . "org_tasks";
            $sql = "SELECT * FROM ".$table_name." WHERE performer = '".wp_get_current_user()->user_login."' AND urg_imp='".$ug_im."' ORDER BY ID;";
            $result = $wpdb->get_results($sql, ARRAY_A);
            return $result;
        }
        
        public function get_my_tasks1() {

            global $wpdb;
            $table_name = $wpdb->prefix . "org_tasks";
            $sql = "SELECT * FROM ".$table_name." WHERE performer = '".wp_get_current_user()->user_login."' ORDER BY ID;";
            $result = $wpdb->get_results($sql, ARRAY_A);
            return $result;
        }
        
         public function get_my_first_task() {

            global $wpdb;
            $table_name = $wpdb->prefix . "org_tasks";
            $sql = "SELECT * FROM ".$table_name." WHERE performer = '".wp_get_current_user()->user_login."' AND urg_imp='URGENT/IMPORTANT' ORDER BY ID LIMIT 1;";
            $result = $wpdb->get_row($sql);
            return $result;
        }
        
        public function get_task_by_id($id) {

            global $wpdb;
            $table_name = $wpdb->prefix . "org_tasks";
            $sql = "SELECT * FROM ".$table_name." WHERE id = ".$id.";";
            $result = $wpdb->get_row($sql);
            return $result;
        }
        
        public function get_my_msg($in_out) {
            global $wpdb;
            $table_name = $wpdb->prefix . "org_messages";
            if($in_out == 'incoming'){
                $sql = "SELECT * FROM ".$table_name." WHERE addr = '".wp_get_current_user()->user_login."' and imp_or_arh='' order by fd desc;";
            } elseif($in_out == 'outcoming') {
                $sql = "SELECT * FROM ".$table_name." WHERE fr_who = '".wp_get_current_user()->user_login."' and imp_or_arh='' order by fd desc;";
            } elseif($in_out == 'important') {
                $sql = "SELECT * FROM ".$table_name." WHERE fr_who = '".wp_get_current_user()->user_login."' and imp_or_arh='important' order by fd desc;";
            } elseif($in_out == 'archive') {
                $sql = "SELECT * FROM ".$table_name." WHERE fr_who = '".wp_get_current_user()->user_login."' and imp_or_arh='archive' order by fd desc;";
            }
            $result = $wpdb->get_results($sql, ARRAY_A);
            return $result;
        }
        
        public function get_mess_by_id($id) {

            global $wpdb;
            $table_name = $wpdb->prefix . "org_messages";
            $sql = "SELECT * FROM ".$table_name." WHERE id = ".$id.";";
            $result = $wpdb->get_row($sql);
            return $result;
        }
        
        public function read_mess_by_id($id) {

            global $wpdb;
            $table_name = $wpdb->prefix . "org_messages";
            $sql = "UPDATE ".$table_name." SET new_old ='old' WHERE id = ".$id." and addr = '".wp_get_current_user()->user_login."';";
            $wpdb->get_row($sql);
        }
        
        
    }
}    
?>		
<?php
/*
Plugin Name: biz-samp-tasks 
Plugin URI: 
Description: Плагин отображает элементы организатора в системе BizonAppsSAMP
Version: 1.0
Author: Артем Печерин
License: GPL2
*/
/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : artempecherin@gmail.com)
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
global $jal_db_version;
$jal_db_version = "1.0";

function jal_install () {
   global $wpdb;
   global $jal_db_version;

   $table_name = $wpdb->prefix . "org_tasks";
   $table_name1 = $wpdb->prefix . "org_messages";
   if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
      
      $sql = "CREATE TABLE " . $table_name . " (
	  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
          title text NOT NULL,
          text text NOT NULL,
	  fd datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
          td datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
	  director bigint(20) unsigned NOT NULL DEFAULT '0',
          performer bigint(20) unsigned NOT NULL DEFAULT '0',
          urg_imp bigint(20) NOT NULL,
	  UNIQUE KEY id (id)
	)ENGINE=InnoDB  DEFAULT CHARSET=utf8;";
      
      $sql = $sql."CREATE TABLE " . $table_name1 . " (
	  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
          theme text NOT NULL,
          msg text NOT NULL,
          addr text NOT NULL,
          fr_who text NOT NULL,
          attache bigint(20) DEFAULT NULL,
          imp_or_arh text DEFAULT NULL,
	  fd TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	  UNIQUE KEY id (id)
	)ENGINE=InnoDB  DEFAULT CHARSET=utf8;";
     
      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);
 
      add_option("jal_db_version", $jal_db_version);

   }
}
register_activation_hook(__FILE__,'jal_install');
?>

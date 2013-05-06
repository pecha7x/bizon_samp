<?php
/*
Template Name: Mail
*/
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] .'/site1/wp-content/plugins/biz-samp-tasks/database_func.php';
?>
﻿<?php get_header(); ?>
<!-- hidden inline form -->
<div id="inline">
	<h2>New message</h2>

	<form id="contact" name="contact" action="" method="post">
		<label for="theme">Theme of message</label>
		<input type="theme" id="theme" name="theme" class="txt">
		<br>
                <label for="addressee">Choose addressee for you message</label>
                <select id="addressee" name="addressee">
                    <option><?php echo wp_get_current_user()->user_login;?></option>
                    <?php 
                     $func = new database_func;
                     $users = $func->get_users();         
                     foreach ($users as $user) {
                        echo '<option>'; 
                        echo $user['user_login'];
                        echo '</option>';
                     } 
                    ?>
                </select>
                <br>
		<label for="msg">Enter your message</label>
		<textarea id="msg" name="msg" class="txtarea"></textarea>
		
		<button id="send">Send</button>
	</form>
</div>
<div id="inline2">
</div>
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <p><a class="modalbox" href="#inline">New message</a></p>
              <li class="active"><a class="mess" id="incoming" href="<?php echo site_url()?>?page_id=21">INCOMING</a></li>
              <li><a class="mess" id="outcoming" href="<?php echo site_url()?>?page_id=21&page=outcoming">OUTCOMING</a></li>
              <li><a class="mess" id="important" href="<?php echo site_url()?>?page_id=21&page=important">IMPORTANT</a></li>
              <li><a class="mess" id="archive" href="<?php echo site_url()?>?page_id=21&page=archive">ARCHIVE</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
            <?php if((isset($_GET['page']) && ($_GET['page'] == 'outcoming'))):?>
                <?php   $func = new database_func;
                        $msgs = $func->get_my_msg('outcoming');
                        //var_dump($msgs);
                        echo ('<table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                           <th>#</th>
                                           <th>Recipient</th>
                                           <th>Message</th>
                                           <th>Date</th>
                                           <th></th>
                                        </tr>'); 
                        foreach ($msgs as $msg) {
                            if($msg["new_old"] == 'new'){
                                echo '<tr class="info" href="#inline2" data-href="'.$msg["id"].'">';
                            } else {
                                echo '<tr href="#inline2" data-href="'.$msg["id"].'">';
                            }
                            echo ('<td>'.$msg["id"].'</td>
                                      <td>'.$msg["addr"].'</td>
                                      <td>'.$msg["msg"].'</td>
                                      <td>'.$msg["fd"].'</td>
                                      <td></td>
                                  </a></tr>');
                        }
                        echo ('</tbody></table>'); 
                ?>
            <?php elseif((isset($_GET['page']) && ($_GET['page'] == 'important'))):?>
                <?php   $func = new database_func;
                            $msgs = $func->get_my_msg('important');
                            //var_dump($msgs);
                            echo ('<table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                               <th>#</th>
                                               <th>Sender</th>
                                               <th>Message</th>
                                               <th>Date</th>
                                               <th></th>
                                            </tr>'); 
                            foreach ($msgs as $msg) {
                                if($msg["new_old"] == 'new'){
                                    echo '<tr class="info" href="#inline2" data-href="'.$msg["id"].'">';
                                } else {
                                    echo '<tr href="#inline2" data-href="'.$msg["id"].'">';
                                }
                                echo ('<td>'.$msg["id"].'</td>
                                          <td>'.$msg["fr_who"].'</td>
                                          <td>'.$msg["msg"].'</td>
                                          <td>'.$msg["fd"].'</td>
                                          <td></td>
                                      </tr>');
                            }
                            echo ('</tbody></table>'); 
                    ?>
             <?php elseif((isset($_GET['page']) && ($_GET['page'] == 'archive'))):?>
                <?php   $func = new database_func;
                            $msgs = $func->get_my_msg('archive');
                            //var_dump($msgs);
                            echo ('<table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                               <th>#</th>
                                               <th>Sender</th>
                                               <th>Message</th>
                                               <th>Date</th>
                                               <th></th>
                                            </tr>'); 
                            foreach ($msgs as $msg) {
                                if($msg["new_old"] == 'new'){
                                    echo '<tr class="info" href="#inline2" data-href="'.$msg["id"].'">';
                                } else {
                                    echo '<tr href="#inline2" data-href="'.$msg["id"].'">';
                                }
                                echo ('<td>'.$msg["id"].'</td>
                                          <td>'.$msg["fr_who"].'</td>
                                          <td>'.$msg["msg"].'</td>
                                          <td>'.$msg["fd"].'</td>
                                          <td></td>
                                      </tr>');
                            }
                            echo ('</tbody></table>'); 
                    ?>
            <?php else:?>
                <?php   $func = new database_func;
                            $msgs = $func->get_my_msg('incoming');
                            //var_dump($msgs);
                            echo ('<table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                               <th>#</th>
                                               <th>Sender</th>
                                               <th>Message</th>
                                               <th>Date</th>
                                               <th></th>
                                            </tr>'); 
                            foreach ($msgs as $msg) {
                                if($msg["new_old"] == 'new'){
                                    echo '<tr class="info" href="#inline2" data-href="'.$msg["id"].'">';
                                } else {
                                    echo '<tr href="#inline2" data-href="'.$msg["id"].'">';
                                }
                                echo ('<td>'.$msg["id"].'</td>
                                          <td>'.$msg["fr_who"].'</td>
                                          <td>'.$msg["msg"].'</td>
                                          <td>'.$msg["fd"].'</td>
                                          <td></td>
                                      </tr>');
                            }
                            echo ('</tbody></table>'); 
                    ?>
            <?php endif;?>
        </div><!--/span-->
      </div><!--/row-->
<?php get_footer(); ?>
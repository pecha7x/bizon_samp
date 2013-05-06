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
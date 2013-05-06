<?php
include $_SERVER['DOCUMENT_ROOT'] .'/site1/wp-content/plugins/biz-samp-tasks/database_func.php';
?>
<form class="form-horizontal" action="<?  site_url()?>/site1/wp-content/plugins/biz-samp-tasks/add_new_task.php" method="post" enctype="multipart/form-data">
    <div class="control-group">
        <label class="control-label" for="inputTitle">Enter title for the task</label>
        <div class="controls">
            <input id="inputTitle" type="text" name="title" placeholder="Choose title for the task" value="">
        </div>    
    </div>
    <div class="control-group">
        <label class="control-label" for="inputDirector">Choose director for the task</label>
        <div class="controls">
           <select name="director">
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
        </div>    
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPerformer">Choose performer for the task</label>
        <div class="controls">
            <select name="performer">
               <option><?php echo wp_get_current_user()->user_login;?></option>
               <?php          
                foreach ($users as $user) {
                   echo '<option>'; 
                   echo $user['user_login'];
                   echo '</option>';
                } 
               ?>
            </select>   
        </div>    
    </div>
    <div class="control-group">
        <label class="control-label" for="inputFd">Choose from date for the task</label>
            <div class="controls">
                <div class="input-append date" id="dp3" data-date="<?php echo date("d-m-Y");?>" data-date-format="dd-mm-yyyy">
                    <input class="span2" size="90" type="text" name="fd" value="<?php echo date("d-m-Y");?>">
                    <span class="add-on"><i class="icon-th"></i></span>
                </div>  
            </div>     
    </div>
    <div class="control-group">
        <label class="control-label" for="inputTd">Choose end date for the task</label>
            <div class="controls">
                <div class="input-append date" id="dp4" data-date="<?php echo date("d-m-Y");?>" data-date-format="dd-mm-yyyy">
                    <input class="span2" size="90" type="text" name="td" value="<?php echo date("d-m-Y");?>">
                    <span class="add-on"><i class="icon-th"></i></span>
                </div>  
            </div>     
    </div>
    <div class="control-group">
        <label class="control-label" for="urg_imp">Choose priority for the task</label>
        <div class="controls">
	<select name="urg_imp">
  		<option>URGENT/IMPORTANT</option>
  		<option>URGENT/LESS IMPORTANT</option>
  		<option>LESS URGENT/IMPORTANT</option>
  		<option>LESS URGENT/LESS IMPORTANT</option>
	</select>
        </div>    
    </div>
    <div class="control-group">
        <label class="control-label" for="inputText">Enter text for the task</label>
        <div class="controls">
            <textarea id="inputText" type="text" name="text" placeholder="Add text for the task" value=""rows="8" cols="40"></textarea>
        </div>    
    </div>
    <div class="controls">
      <button type="submit" class="btn">Add a new task</button>
    </div>
</form>
<?php
include $_SERVER['DOCUMENT_ROOT'] .'/site1/wp-content/plugins/biz-samp-tasks/database_func.php';
?>
<ul class="nav nav-list">
	<li class="nav-header">Your tasks<?php echo " (User : ".wp_get_current_user()->user_login.")"; ?></li>
        <?php 
        $func = new database_func;
        $ug1='URGENT/IMPORTANT';
        $ug2='URGENT/LESS IMPORTANT';
        $ug3='LESS URGENT/IMPORTANT';
        $ug4='LESS URGENT/LESS IMPORTANT';
        echo '<li class="nav-header">'.$ug1.'</li>';
        $tasks1 = $func->get_my_tasks($ug1);
        echo '<div class="use_task"></div>';
        foreach ($tasks1 as $task1) {
            if(($tasks1[0]['id'] == $task1['id']) && (!(isset($_GET['page']) && ($_GET['page'] == 'new')))) echo '<li class="active">';
            else echo '<li class="">';
                echo '<a class="action" data-id="'.$task1['id'].'" href="#">';
                    echo $task1['title'];
                echo '</a>';
            echo '</li>'; 
            }
        echo '<li class="nav-header">'.$ug2.'</li>';
        $tasks2 = $func->get_my_tasks($ug2);
        foreach ($tasks2 as $task2) {
            echo '<li>';
                echo '<a class="action" data-id="'.$task2['id'].'" href="'.site_url().'?page_id=24">';
                    echo $task2['title'];
                echo '</a>';
            echo '</li>'; 
            }
        echo '<li class="nav-header">'.$ug3.'</li>';
        $tasks3 = $func->get_my_tasks($ug3);
        foreach ($tasks3 as $task3) {
            echo '<li>';
                echo '<a class="action" data-id="'.$task3['id'].'" href="'.site_url().'?page_id=24">';
                    echo $task3['title'];
                echo '</a>';
            echo '</li>'; 
            }
        echo '<li class="nav-header">'.$ug4.'</li>';
        $tasks4 = $func->get_my_tasks($ug4);
        foreach ($tasks4 as $task4) {
            echo '<li>';
                echo '<a class="action" data-id="'.$task4['id'].'" href="'.site_url().'?page_id=24">';
                    echo $task4['title'];
                echo '</a>';
            echo '</li>'; 
            }
        ?>        
        <br />
        <?php if((isset($_GET['page']) && ($_GET['page'] == 'new'))) echo '<li class="active">';
            else echo '<li class="">';
        ?>    
            <a class="action_new" href="<?php site_url()?>?page_id=24&page=new">Add a new task</a>
        </li>
</ul>

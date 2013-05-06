<?php
/*
Template Name: Organize
*/
?>
<?php
include $_SERVER['DOCUMENT_ROOT'] .'/site1/wp-content/plugins/biz-samp-tasks/database_func.php';
?>
<?php get_header(); ?>
<div id="inline3">
    <h2>Mark execution?</h2>
    <button id="yes">Yes</button>
    <button id="no">No</button>
</div>
<div class="row-fluid">
    <div class="span9"><div class="hero-unit">
        <div class="well">
            <div class="results">
                <?php if((isset($_GET['page']) && ($_GET['page'] == 'new'))):?>
                    <p><?php require $_SERVER['DOCUMENT_ROOT'] .'/site1/wp-content/plugins/biz-samp-tasks/view_new_task.php';?></p>
                <?else:?>
                    <?php
                    $func = new database_func;
                    $id = $func->get_my_first_task()->id;
                    $task = $func->get_task_by_id($id);
                    echo (
              '<table class="table table-bordered">
              <tbody>
                <tr class="info">
                  <th>Task :</th>
                  <td>
                    '.$task->title.'
                  </td>
                </tr>
                <tr class="info">
                  <th>Priority :</th>
                  <td>'.$task->urg_imp.'</td>
                </tr>
                <tr class="info">
                  <th>Creator :</td>
                  <td>'.$task->director.'</td>
                </tr>
                <tr class="info">
                  <th>Performer :</td>
                  <td>'.$task->performer.'</td>
                </tr>
                <tr class="info">
                  <th>Start date :</td>
                  <td>'.$task->fd.'</td>
                </tr>
                <tr class="info">
                  <th>End date :</td>
                  <td>'.$task->td.'</td>
                </tr>
                <tr class="info">
                  <th>Description of the task :</td>
                  <td>'.$task->text.'</td>
                </tr>
              </tbody>
            </table>'
                        );
                    ?>
                <?endif;?>
                    <a class="btn btn-primary btn-mini" data-id="done" href="/site1/wp-content/plugins/biz-samp-tasks/done_exec_task.php">Note execution</a>
                    <div id="tedit">
                        <a class="btn btn-primary btn-mini" data-id="close" href="#inline3">Close task</a>
                        <a class="btn btn-primary btn-mini" data-id="edit" href="#inline3">Edit task</a>
                    </div>    
            </div>
        </div>
      </div>
    </div><!--/span-->
    <div class="span3">
        <div class="well sidebar-nav">
            <?php get_template_part( 'tasks_list', 'index' ); ?>
        </div><!--/.well -->
    </div><!--/span-->
</div><!--/row-->
<?php get_footer(); ?>
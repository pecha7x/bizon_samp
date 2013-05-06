<?php
include '../../../wp-load.php';
require_once '/home/www-data/www/wordpress_te/site1/wp-content/plugins/biz-samp-tasks/database_func.php';
$func = new database_func;
$task = $func->get_task_by_id($_POST['id']);
echo json_encode(
              '<table class="table table-bordered">
              <tbody>
                <tr class="info">
                  <th>Task :</th>
                  <td>'.$task->title.'</td>
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
            </table>
            <a href="http://twitter.github.com/bootstrap/examples/fluid.html#" class="btn btn-primary btn-mini">Note execution</a>
                    <div id="tedit">
                        <a href="http://twitter.github.com/bootstrap/examples/fluid.html#" class="btn btn-primary btn-mini">Close task</a>
                        <a href="http://twitter.github.com/bootstrap/examples/fluid.html#" class="btn btn-primary btn-mini">Edit task</a>
                    </div>'
                        );
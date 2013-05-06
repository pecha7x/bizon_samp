<?php
include '../../../wp-load.php';
require_once '/home/www-data/www/wordpress_te/site1/wp-content/plugins/biz-samp-tasks/database_func.php';
$func = new database_func;
$msg = $func->get_mess_by_id($_POST['id']);
$func->read_mess_by_id($msg->id);
echo json_encode(
              '<table class="table table-bordered">
              <tbody>
                <tr class>
                  <th>The message #</th>
                  <th>The theme message</th>
                  <th>From whom</td>
                  <th>Whom</td>
                  <th>The text message</td>
                  <th>Date of message</td>
                </tr>
                <tr class>
                  <td>'.$msg->id.'</td>
                  <td>'.$msg->theme.'</td>
                  <td>'.$msg->fr_who.'</td>
                  <td>'.$msg->addr.'</td>
                  <td>'.$msg->msg.'</td>    
                  <td>'.$msg->fd.'</td>    
                </tr>
              </tbody>
            </table>');
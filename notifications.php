<div class="col-lg-12 sidebar-offcanvas sidebar-right">
  <h5 class="section-title hidden-lg-down">Notifiche</h5>
  <div class="card card-block">
    <?php

    $sql = "SELECT n.id, n.student_id, n.pub_date, n.category_name, n.subject, n.description, c.color, c.icon FROM notifications n, categories c WHERE (student_id = '" . $_SESSION['student_id'] ."') AND n.category_name = c.name";
    $result = $mysqli->query($sql);

      if ($result->num_rows > 0) {
        echo '<ul class="list-group history">';

        while($row = $result->fetch_assoc()) {

          $subject = $row['subject'];
          $description = $row['description'];
          $category_name = $row['category_name'];
          $pub_date = $row['pub_date'];
          $color = $row['color'];
          $icon = $row['icon'];

          echo '
          <li class="list-group-item list-group-notification notification-unread">

            <div class="tag-align">
              <span class="tag tag-custom" style="background-color: ' . $color . '">
                <span class="icon-' . $icon . '" aria-hidden="true"></span>
              </span>
            </div>
            <span>
              <strong>' . $subject . '</strong> - ' . $description . '</br>
              <span class="text-muted">' . $pub_date . ' · ' . $category_name . '</span>
            </span>
          </div>
          <span>
            <strong>' . $subject . '</strong> - ' . $description . '</br>
            <span class="text-muted">' . $pub_date . ' · ' . $category_name . '</span>
          </span>
        </li>';

        }
        echo '</ul>';

      } else {
        echo 'no notifications'; //TODO do it better
      }

    ?>

  </div>
</div><!--/span-->

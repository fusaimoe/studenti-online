<div class="col-lg-12 sidebar-offcanvas sidebar-right">
  <h5 class="section-title hidden-lg-down">Notifiche</h5>
  <div class="card card-block">
    <?php

    $sql = "SELECT id, student_id, pub_date, category_name, subject, description, read_flag FROM notifications WHERE (student_id = '" . $_SESSION['student_id'] ."')";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
      echo '<ul class="list-group history">';
      while($row = $result->fetch_assoc()) {
        $subject = $row['subject'];
        $description = $row['description'];
        $category_name = $row['category_name'];
        $pub_date = $row['pub_date'];
        $read_flag = $row['read_flag'];
        $categoryCss = str_replace(' ', '', strtolower($category_name));

        echo '<li class="list-group-item list-group-notification';
        if(!$read_flag) echo ' notification-unread';
        echo ' ">
          <div class="tag-align">
            <span class="tag tag-custom bg-color-' . $categoryCss . '">
              <span class="icon-custom-' . $categoryCss . '" aria-hidden="true"></span>
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

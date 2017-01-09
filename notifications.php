<div class="col-lg-12 sidebar-offcanvas sidebar-right">
  <h5 class="section-title hidden-lg-down">Notifiche</h5>
  <div class="card card-block">
    <?php

    $sql = "SELECT id, member_id, pub_date, category, subject, description FROM notifications WHERE (member_id = '" . $_SESSION['user_id'] ."')";
    $result = $mysqli->query($sql);

      if ($result->num_rows > 0) {
        echo '<ul class="list-group history">';

        while($row = $result->fetch_assoc()) {

          $subject = $row['subject'];
          $description = $row['description'];
          $category = $row['category'];
          $pub_date = $row['subject'];

          echo '
          <li class="list-group-item list-group-notification notification-unread">

            <div class="tag-align">
              <span class="tag tag-custom bg-color-' . $category . '">
                <span class="icon-custom-' . $category . '" aria-hidden="true"></span>
              </span>
            </div>
            <span>
              <strong>' . $subject . '</strong> - ' . $description . '</br>
              <span class="text-muted">' . $pub_date . ' · ' . $category . '</span>
            </span>

          </li>
          ';

        }

        echo '</ul>';
      } else {
        echo 'no notifications'; //TODO do it better
      }

    ?>

  </div>
</div><!--/span-->

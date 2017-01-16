<div class="col-lg-12 sidebar-offcanvas sidebar-right">
    <?php
    $sql = "SELECT n.id, n.student_id, n.pub_date, n.category_name, n.subject, n.description, n.read_flag, c.color, c.URL, c.icon FROM notifications n, categories c WHERE (student_id = '" . $_SESSION['student_id'] ."') AND n.category_name = c.name ORDER BY n.PUB_DATE";
    $result = $mysqli->query($sql);

      if ($result->num_rows > 0) {
        echo '
      <h5 class="section-title hidden-lg-down">Notifiche</h5>
        <div class="card card-block">
          <ul class="list-group history">';

        while($row = $result->fetch_assoc()) {

          $id = $row['id'];
          $subject = $row['subject'];
          $description = $row['description'];
          $read_flag = $row['read_flag'];
          $category_name = $row['category_name'];
          $pub_date = $row['pub_date'];
          $color = $row['color'];
          $icon = $row['icon'];
          $url = $row['URL'];

          if(!$read_flag) {
            echo '<li class="list-group-item list-group-notification notification-unread" data-notification-id="' . $id . '">';
          } else {
            echo '<li class="list-group-item list-group-notification" data-notification-id="' . $id . '">';
          }

          echo '
            <div class="tag-align">
              <a href="' . $url . '">
                <span class="tag tag-custom" style="background-color: ' . $color . '">
                  <span class="icon-' . $icon . '" aria-hidden="true"></span>
                </span>
              </a>
            </div>
            <span>
              <strong>' . $subject . '</strong> - ' . $description . '</br>
              <span class="text-muted">' . $pub_date . ' · ' . $category_name . '</span>
            </span>

          </li>
          ';

        }

        echo '</ul>
        </div>';
      } else {
        echo '<div class="row">
          <span class="icon-pin big-grey-icon" aria-hidden="true"></span>
          <h3 class="login-card-title">Nessuna notifica</h3>
          <p class="login-card-subtitle">Attualmente non é registrata nessuna notifica.</p>
        </div>'; //TODO do it better
      }

    ?>


</div><!--/span-->

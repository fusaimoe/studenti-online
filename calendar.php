<div class="col-lg-8 sidebar-offcanvas sidebar-left">
  <h5 class="section-title hidden-lg-down">Calendario</h5>
  <div class="card card-block">
    <div class="monthly" id="mycalendar"></div>
  </div>
</div><!--/span-->
<div class="col-lg-4 sidebar-offcanvas col-nopadding-side sidebar-left">
  <h5 class="section-title hidden-lg-down">Legenda</h5>
  <div class="card card-block">
      <?php
        $sql = "SELECT DISTINCT c.name, c.color FROM categories c, calendar_events e WHERE c.name=e.category_name AND e.student_id='" . $_SESSION['student_id'] ."' ";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
          echo '<ul class="list-group">';
          while($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $color = $row['color'];
            echo '
                <li class="list-group-item">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="'. $name .'" checked>
                    <style type="text/css" scoped>
                      .custom-control-input:checked ~ .custom-control-indicator {
                        background-color: '. $color .';
                      }
                    </style>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">'. $name .'</span>
                  </label>
                </li>
            ';
          }
          echo '</ul>';
        }
      ?>
  </div>
</div><!--/span-->

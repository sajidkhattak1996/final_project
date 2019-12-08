<!--=============== below area and button such classes helps etc ====================-->
<div class="bttn" style="background: #008c7e;">
    <form method="post">
          <ul>
                 <button type="submit" name="all_class" class="btn btn-outline-light btn-lg bg-light text-dark">         All Classes           </button>
                 <button type="submit" name="create_class"  class="btn btn-outline-light btn-lg">    Create New Class     </button>
                <button type="submit" name="help"  class="btn btn-outline-light btn-lg">        Helps               </button>

          </ul>
      </form>         <?php
                            // php code for all_class button
                            if (isset($_POST['all_class'])) {
                              unset($_SESSION['class_id']);

                              echo "<script> window.location.href='tmain_table.php'; </script>";
                            }
                            // php code for create class buttons
                            if (isset($_POST['create_class'])) {
                              unset($_SESSION['class_id']);

                              echo "<script> window.location.href='create_class.php'; </script>";
                            }
                            // php code for help button
                            if (isset($_POST['help'])) {
                              unset($_SESSION['class_id']);

                              echo "<script> window.location.href='helps.php'; </script>";
                            }
                      ?>
  </div>
<!--==========================above button container are ended ===============================================================-->

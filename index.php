<?php

require_once('config.php');
if (isset($_GET['page'])) {
$page=$_GET['page'];

}
else {
    $page=1;
}
$num_per_page=05;
$start_from=($page-1)*05;



$query="select * from pagination limit $start_from,$num_per_page";
$result=mysqli_query($con,$query);


 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pagination Demo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">


    <table class="table table-striped">
          <tr>
              <td>User Id </td>
              <td>User Name </td>
              <td>User Email </td>
          </tr>
          <tr>
            <?php while ($row=mysqli_fetch_assoc($result)) {?>



              <td> <?php echo $row['id']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['useremail']; ?></td>





          </tr>
        <?php } ?>



    </table>

     <center>

    <?php
      $pr_query="select * from pagination";
      $pr_result=mysqli_query($con,$pr_query);
      $total_record=mysqli_num_rows($pr_result);
      $total_page=ceil($total_record/$num_per_page);

      if ($page>1) {

      echo "<a href='index.php?page=".($page-1)."' class='btn btn-danger'>Previous</a>";

      }
      for ($i=1; $i <$total_page ; $i++) {
        echo "<a href='index.php?page=".$i."' class='btn btn-primary'>$i</a>";
      }
      if ($i>$page) {

      echo "<a href='index.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";

      }


     ?>
   </center>


</div>

  </body>
</html>

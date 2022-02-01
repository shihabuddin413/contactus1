
<?php

  include('./env/db_connect.php');

  $query = 'SELECT * FROM data';
  $result = mysqli_query($conn, $query);
  $allData = mysqli_fetch_all($result, 1);

  // echo $allData;

?>


<?php
  include('./temp/head.php');
?>


  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach ($allData as $key => $value): ?>
      <tr>
        <td>  <?= $key+1     ?>  </td>
        <td>  <?= $value['name'];    ?>  </td>
        <td>  <?= $value['email'];   ?>  </td>
        <td>  <?= $value['phone'];   ?>  </td>
        <td>  <?= $value['message']; ?>  </td>
        <td>
          <form action= "" method="GET">

            <a href="./edit.php?id=<?=$value['id']; ?>" class="btn btn-light">Edit</a>
            <a href="./controller/delete.php?id=<?=$value['id']; ?>" class="btn btn-danger">Delete</a>
          </form>
        </td>
      </tr>
      
    <?php endforeach ?>
 
<?php 
  include('./temp/foot.php');

  //             <input type="hidden" value="<?= $value['id']; 
?>
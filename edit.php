<?php 
  include('./env/db_connect.php');
  session_start();
  
  $id=0;
  if (isset($_GET['id'])){
    $id = $_GET['id'];
    // echo ($id);
    $query = "SELECT * FROM data WHERE id=$id";
    $rs = mysqli_query($conn, $query);
    $value = mysqli_fetch_assoc($rs);

    // echo ($value);
  }

  // exit();

?>

<?php   include('./temp/head.php'); ?>

    
    <!--============== Contact Form Part Goes Here ================-->
    <section id="form" class="p-lg-5 mt-5" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 px-md-0">
                    <div class="courses-head">
                        <h2>Contact Us</h2>
                        <p>Please fillup the form and submit your query.</p>
                    </div>
                </div>
            </div>
            <form action="controller/update.php" method="POST" id="contact_form">

                <input type="hidden" name="id" value="<?= $value['id']; ?>">

                <div class="row">
                    <div class="col-lg-6 col-md-6 pl-lg-0">
                        <div class="form-group pt-lg-2">
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Fullname" value=" <?=$value['name'];?> ">
                        </div>
                        <?php if (isset($_SESSION['errors']['name'])): ?>
                            <span class="text-danger"><?= $_SESSION['errors']['name'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group pt-lg-2">
                            <input type="text" name="email" class="form-control" placeholder="Enter Your Email Address" value=" <?=$value['email'];?> ">
                        </div>
                        <?php if (isset($_SESSION['errors']['email'])): ?>
                            <span class="text-danger"><?= $_SESSION['errors']['email'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-6 pl-lg-0">
                        <div class="form-group pt-lg-2">
                            <input type="text" name="phone" class="form-control" placeholder="Enter Your Mobile Number" value=" <?=$value['phone'];?> ">
                        </div>
                        <?php if (isset($_SESSION['errors']['phone'])): ?>
                            <span class="text-danger"> <?= $_SESSION['errors']['phone'] ?> </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group pt-lg-2">
                            <input type="text" name="address" class="form-control" placeholder="Your Address" value=" <?=$value['address'];?> ">
                        </div>
                        <?php if (isset($_SESSION['errors']['address'])): ?>
                            <span class="text-danger"> <?= $_SESSION['errors']['address'] ?> </span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-12 pl-lg-0">
                        <div class="form-group pt-lg-2">
                            <textarea class="form-control pb-5" name="message" placeholder="Message">
                                <?= $value['message'] ;?> 
                            </textarea> 
                        </div>
                        <?php if (isset($_SESSION['errors']['message'])): ?>
                            <span class="text-danger"> <?= $_SESSION['errors']['message'] ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group text-center pt-lg-2">
                            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
 
   
<?php 
  include('./temp/foot.php');
?>

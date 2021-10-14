<?php 
  include('ofiles/header.php');
  include('ofiles/Auth.php');
  //Collect data
  if(isset($_POST['obtain'])){
    $mail = mysqli_real_escape_string($pr->link, trim($_POST['mail']));
    $password = mysqli_real_escape_string($pr->link, trim($_POST['password']));

    if(empty($mail) || empty($password)){
        $error = "Fill all the field";
    }else{
      $sql = "SELECT * FROM basicdata WHERE email = '$mail' AND password = '".sha1($password)."'";
      $data = json_decode($pr->getMultidata($sql));

      if(count($data) > 0){
          $_SESSION['data'] = $data[0];
          $_SESSION['data']->password = $password;
          header('location:admission/basic.php');
      }else{
        $sql = "SELECT * FROM account WHERE email = '$mail' AND password = '".sha1($password)."'";
        $data = json_decode($pr->getMultidata($sql));

          if(count($data) > 0){
            $_SESSION['data'] = $data[0];
            $_SESSION['data']->password = $password;
            header('location:admission/index.php');
        }else{
          $error = "Invalid email and password combination";
        }
      }
    }
  }

  




?>
<!-- /header -->
<!-- Modal -->
<section class="w3l-about-breadcrum">
  <div class="breadcrum-bg py-sm-5 py-4">
    <div class="container py-lg-3">
      <h2>Login Now</h2>
      <p><a href="index.php">Home</a> &nbsp; / &nbsp; Login Now</p>
    </div>
  </div>
</section>

<!-- page title -->

<!-- /page title -->

<!-- contact -->
<section class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
      <br>
        <h5 style="color:red">Note</h5>
        <h5>To continue with your admission, use your details to login.</h5>
        <br>
        <h2 class="section-title">Login Now</h2>
        <br>
        <h6 style="color:red"><?php echo(@$error); ?></h6>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7 mb-4 mb-lg-0">
        <form action="" method="POST">
          
          <input type="email" class="form-control mb-3" id="mail" name="mail" placeholder="Your Email" required>
          <input type="password" class="form-control mb-3" id="subject" name="password" placeholder="Password" required>
          
          <button type="submit" name ='obtain' value="send" class="btn btn-primary">LOGIN</button>
        </form>
        <br>
      </div>
      <div class="col-lg-5" style="background-size:cover; background-position:center;" data-background="images/courses/course-1.jpg">
                
     </div>
    </div>
  </div>
</section>

<?php include('ofiles/footer.php'); ?>
<?php 
  include('ofiles/header.php');
  include('ofiles/Auth.php');

  

  //Collect data
  if(isset($_POST['obtain'])){
    $fn = mysqli_real_escape_string($pr->link, trim($_POST['fn']));
    $phone = mysqli_real_escape_string($pr->link, trim($_POST['phone']));
    $mail = mysqli_real_escape_string($pr->link, trim($_POST['mail']));
    $gender = mysqli_real_escape_string($pr->link, trim($_POST['sex']));
    $password = mysqli_real_escape_string($pr->link, trim($_POST['password']));
    $rpassword = mysqli_real_escape_string($pr->link, trim($_POST['rpassword']));

    if(empty($fn) || empty($phone) || empty($mail) || empty($gender) || empty($password)){
        $error = "Fill all the field";
    }elseif($password != $rpassword){
      $error = "Password does not match";
    }else{
      $sql = "SELECT * FROM basicdata WHERE email = '$mail'";
      $data = json_decode($pr->getMultidata($sql));

      if(count($data) < 1){
          $fullname = explode(" ", $fn);
          $regno = "WCT".chr(rand(65,90)).chr(rand(48,57)).chr(rand(48,57)).chr(rand(48,57)).chr(rand(48,57)).date('h').date('d').date('s').date('y');
          $rpass=sha1($password);
          
          $sql1 = "INSERT INTO basicdata(regno,surname,firstname,othername,gender,email,phone,password)";
          $sql1.=" VALUES('$regno','".@$fullname[0]."','".@$fullname[1]."','".@$fullname[2]."','$gender','$mail','$phone','$rpass')";

          $insert = json_decode($pr->insertRecord($sql1),true);
          if($insert["message"]=="Record created successfully..."){
              $error = "Record created successfully..., Proceed to <a href='adlog.php'>login</a> to your portal";
              $message = "Congratulations " . $fn.", Sequel to your application into WECMA, I am delighted to inform you that you have been registered successfully.
                Kindly follow this link https://wecma.ng?email=".$mail." to complete your admission process.\n\rLogin with your email and password supplied, your registration number is ".$regno;
                $headers = 'From: admission@wecma.ng' . "\r\n";
                mail($mail,"ADMISSION PROCESS",$message,$headers);
          }
      }else{
        $error = "Record already exists";
      }

    }
}  

?>
<!-- /header -->

<section class="w3l-about-breadcrum">
  <div class="breadcrum-bg py-sm-5 py-4">
    <div class="container py-lg-3">
      <h2>Apply Now</h2>
      <p><a href="index.php">Home</a> &nbsp; / &nbsp; Apply Now</p>
    </div>
  </div>
</section>


<!-- Modal -->



<!-- page title -->

<!-- /page title -->

<!-- contact -->
<section class="section bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
      <br>
        <h5 style="color:red">NB</h5>
        <h5>To begin kindly fill the form below, make sure to use an email you have full control on, as your admission records will be sent to it.</h5>
        <br>

        <h2 class="section-title">Apply Now</h2>
        <br>
        <h6 id="error" style="color:red"><?php echo(@$error); ?></h6>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-7 mb-4 mb-lg-0">
        <form action="" >
          <input type="text" class="form-control mb-3" id="name" name="fn" placeholder="Surname First Name Other Name(s)" required>
          <select id="sex" name="sex" class="form-control mb-3" required>
            <option value="">--Select--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          <input type="text" class="form-control mb-3" id="phone" name="phone" placeholder="Your Phone number" required>
          <input type="email" class="form-control mb-3" id="mail" name="mail" placeholder="Your Email" required>
          <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Password" required>

          <input type="password" class="form-control mb-3" id="rpassword" name="rpassword" placeholder="Password again" required>
          
          <button type="submit" id="obtain" name ='obtain' value="send" class="btn btn-primary">OBTAIN FORM</button>
        </form>
        <br>
      </div>
      <div class="col-lg-5" style="background-size:cover; background-position:center;" data-background="images/courses/course-1.jpg">
                
     </div>
    </div>
  </div>
</section>

<script>
  var savedata = document.getElementById("obtain");

  savedata.addEventListener('click', ()=>{
    event.preventDefault();
    //getting data for form obtain request
    var pname = document.getElementById("name").value;
    var allnames = pname.split(" ");
    var sex = document.getElementById("sex").value;
    var mail = document.getElementById("mail").value;
    var password = document.getElementById("password").value;
    var rpassword = document.getElementById("rpassword").value;
    var phone = document.getElementById("phone").value;
      
    if(sex===""){
        document.getElementById("error").innerHTML = "Chose gender";
        alert("Chose gender");
        return;
    }else if(password !== rpassword){
      document.getElementById("error").innerHTML = "Password does not match";
      alert("Password does not match");
      return;
    }else if(pname=="" || sex=="" || mail =="" || password=="" || phone ==""){
      document.getElementById("error").innerHTML = "Fill all record";
      alert("Fill all record");
      return;
    }else{
        const data = JSON.stringify({
          surname:allnames[0],
          firstname:allnames[1],
          email:mail,
          gender:sex,
          phone:phone,
          password:password,
          othername:allnames.length > 2 ? allnames[2] : ""
        });

      const xhr = new XMLHttpRequest()
      xhr.withCredentials = true

      xhr.addEventListener('readystatechange', function() {
        if (this.readyState === this.DONE) {
          resp = JSON.parse(this.responseText); 
          console.log(resp.message);
          alert(resp.message);
          document.getElementById("error").innerHTML = resp.message;
        }
      })

      xhr.open('POST', 'http://localhost/wecma/Portal/api/applyadd.php')
      xhr.setRequestHeader('content-type', 'application/json')
      //xhr.setRequestHeader('authorization', 'Bearer 123abc456def')

      xhr.send(data)

    }
  });

</script>

  <?php include('ofiles/footer.php'); ?>
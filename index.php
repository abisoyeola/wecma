<?php
  include('ofiles/header.php');
?>

<section class="w3l-main-slider" id="home">
  <!-- main-slider -->
  <div class="companies20-content">
   
    <div class="owl-one owl-carousel owl-theme">
      <div class="item">
        <li>
          <div class="slider-info banner-view bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mx-auto text-center">
                  <h5>Better Education For A Better World</h5>
                 <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="#">Read More</a>
                </div>
                
              </div>
            </div>
          </div>
        </li>
      </div>
      <div class="item">
        <li>
          <div class="slider-info  banner-view banner-top1 bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mx-auto text-center">
                  <h5>Explore The World Of Our Graduates</h5>
                  <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="#">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </div>
      <div class="item">
        <li>
          <div class="slider-info banner-view banner-top2 bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mx-auto text-center">
                  <h5>Exceptional People, Exceptional Care</h5>
                 <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="#">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </div>
      <div class="item">
        <li>
          <div class="slider-info banner-view banner-top3 bg bg2" data-selector=".bg.bg2">
            <div class="banner-info">
              <div class="container">
                <div class="banner-info-bg mx-auto text-center">
                  <h5>Education Is Our Passport To The Future</h5>
                  <a class="btn btn-secondary btn-theme2 mt-md-5 mt-4" href="#">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </div>
    </div>
  </div>


  <script src="assets/js/owl.carousel.js"></script>
  <!-- script for -->
  <script>
    $(document).ready(function () {
      $('.owl-one').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        responsiveClass: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          480: {
            items: 1,
            nav: false
          },
          667: {
            items: 1,
            nav: true
          },
          1000: {
            items: 1,
            nav: true
          }
        }
      })
    })
  </script>
  <!-- //script -->
  <!-- /main-slider -->
</section>
<section class="w3l-feature-3" id="features">
	<div class="grid top-bottom mb-lg-5 pb-lg-5">
		<div class="container">
			
			<div class="middle-section grid-column text-center">
				<div class="three-grids-columns">
					<span class="fa fa-laptop"></span>
					<h4>Proffesional Certification</h4>
					<p>You will have the opportunity to get an internationally recognized qualification.</p>
					<a href="professional.php" class="btn btn-secondary btn-theme3 mt-4">Read More </a>
				</div>
				<div class="three-grids-columns">
					<span class="fa fa-users"></span>
					<h4>Highly Qualified Lecturers</h4>
					<p>The quality of your education is directly related to the quality of the faculty staff teaching you. </p>
					<a href="#" class="btn btn-secondary btn-theme3 mt-4">Read More </a>
				</div>
				<div class="three-grids-columns">
					<span class="fa fa-book"></span>
					<h4>Admissions</h4>
					<p>Education is simply the soul of a society as it passes from one generation to another. </p>
					<a href="#" class="btn btn-secondary btn-theme3 mt-4">Read More </a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- features-4 block -->
<section class="w3l-index1" id="about">
	<div class="calltoaction-20  py-5 editContent">
		<div class="container py-md-3">
		
			<div class="calltoaction-20-content row">
				<div class="column center-align-self col-lg-6 pr-lg-5">
					<h5 class="editContent">Welcome To WECTA</h5>
					<p style="line-height: 2.3;">Western Coast Transport Academy is situated in a conducive environment with ultra-modern technological learning equipment, experienced and seasoned Lecturers.<br> Our teaching are real-time and practical based. Our regulatory bodies passed a vote of confidence on Western Coast Transport Academy considering our academic standard and achievements in raising sound minded and professionals over the years who have been working tirelessly with notable Companies in the Maritime Industry to reshape and raise the sector to meet up with international standard.</p>
					
							<a class="btn btn-secondary btn-theme2 mt-3" href="about.html"> Read More</a>
				</div>
				<div class="column ccont-left col-lg-6" style="margin-top: 20px;">
					<img src="assets/images/g1.jpg" class="img-responsive" alt="">
				</div>
			</div>
		</div>
	</div>
</section>
<!-- features-4 block -->
<section class="services-12" id="course">
	<div class="form-12-content">
		<div class="container">
			<div class="grid grid-column-2 ">
				
				<div class="column1">
					<div class="heading">
						<h3 class="head text-white">Apply for Diploma</h3>
						<h4> Applications are now open</h4>
						<p class="my-3 text-white"> The function of education is to teach one to think intensively and to think critically. Intelligence and character – that is our goal of true education.</p>
					  </div>
					</div>
					<div class="column2">
						<a class="btn btn-secondary btn-theme2 mt-3" href="#"> Apply Here</a>
					</div>
			</div>
		</div>
	</div>
</section>

<!--  form-12 -->
<section class="w3l-form-12">
		<div class="form-12-content py-5" id="services">
			<div class="container py-md-3">
				<div class="grid grid-column-2 py-md-5">
						
					<div class="column1">
						<h4 class="tagline">Purchase Form</h4>
						<p>Fill in below form to find your courses</p>
							<form action="https://paystack.com/pay/16wux9wr8z" method="post">
								<div class="">
									<input required type="text" name="name" class="form-input" placeholder="Course Name">
								</div>
								<div class="">
									<select id="sel1">
										<option>Shipping Management</option>
										<option>Security Management and Technology</option>
                  					</select>
								</div>
								
								
								<button type="submit" class="btn btn-secondary btn-theme2" name="buy">Submit</button>
							</form>
						</div>
						<div class="column2">
						<div class="row">
							<!--<div class="col-md-3 col-sm-6 col-6">-->
							<!--	<a href="#"><div class="courses-item">-->
							<!--		<span class="fa fa-male"></span>-->
							<!--		<p>Marine Engineering</p>-->
							<!--	</div></a>-->
							<!--</div>-->
							<div class="col-md-3 col-sm-6 col-6">
								<a href="#"><div class="courses-item">
									<span class="fa fa-suitcase"></span>
									<p>Shipping Management</p>
								</div></a>
							</div>
							<!--<div class="col-md-3 col-sm-6 col-6 mt-md-0 mt-4">-->
							<!--	<a href="#"><div class="courses-item">-->
							<!--		<span class="fa fa-code"></span>-->
							<!--		<p>Boat and Ship Engineering</p>-->
							<!--	</div></a>-->
							<!--</div>-->
							<div class="col-md-3 col-sm-6 col-6 mt-md-0 mt-4">
								<a href="#"><div class="courses-item">
									<span class="fa fa-flask"></span>
									<p>Security Management</p>
								</div></a>
							</div>
							<div class="col-md-3 col-sm-6 col-6 mt-md-0 mt-4">
								<a href="#"><div class="courses-item">
									<span class="fa fa-gg"></span>
									<p>Marine Transport</p>
								</div></a>
							</div>
							<div class="col-md-3 col-sm-6 col-6 mt-md-0 mt-4">
								<a href="#"><div class="courses-item">
									<span class="fa fa-desktop"></span>
									<p>Information Technology</p>
								</div></a>
							</div>
							<!--<div class="col-md-3 col-sm-6 col-6 mt-4">-->
							<!--	<a href="#"><div class="courses-item mt-2">-->
							<!--		<span class="fa fa-money"></span>-->
							<!--		<p>Nautical Science</p>-->
							<!--	</div></a>-->
							<!--</div>-->
							<!--<div class="col-md-3 col-sm-6 col-6 mt-4">-->
							<!--	<a href="#"><div class="courses-item mt-2">-->
							<!--		<span class="fa fa-gg"></span>-->
							<!--		<p>Marine Transport</p>-->
							<!--	</div></a>-->
							<!--</div>-->
							<!--<div class="col-md-3 col-sm-6 col-6 mt-4">-->
							<!--	<a href="#"><div class="courses-item mt-2">-->
							<!--		<span class="fa fa-desktop"></span>-->
							<!--		<p>Information Technology</p>-->
							<!--	</div></a>-->
							<!--</div>-->
							<!--<div class="col-md-3 col-sm-6 col-6 mt-4">-->
							<!--	<a href="#"><div class="courses-item mt-2">-->
							<!--		<span class="fa fa-mouse-pointer"></span>-->
							<!--		<p>Business Studies</p>-->
							<!--	</div></a>-->
							<!--</div>-->
						</div>
						</div>
				</div>
			</div>
		</div>
	</section>
<!-- // form-12 -->



 
 
  
 

<!-- grids block 5 -->
<?php
  include('ofiles/footer.php');
?>
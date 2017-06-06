<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="../styles/htmleaf-demo.css" media="all">
	<link href="../styles/bootstrap-grid.min.css" rel="stylesheet">
	<link href="http://cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" media="all">
      <link href="http://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
      <!-- Bootstrap bootstrap-touch-slider Slider Main Style Sheet -->
      <link href="../styles/bootstrap-touch-slider.css" rel="stylesheet" media="all">
      
      <!--header-->
	<link rel="stylesheet" href="../styles/header_style.css"> <!-- Gem style -->
    
    <!--end-->
    
</head>
<body>
	<div class="htmleaf-container">
            <!--header-->
<header>
		<nav id="main-nav">
		<ul>
        <li><a href="../login.php">Login</a></li>
		<li><a href="../register.php">Register</a></li>
		</ul>
	</nav>
</header>


    
		<!--<header class="htmleaf-header">
			<h1>Welcome to iCake <span>Click to view more...</span></h1>
		</header>-->


		<!--  
	        If you want to change #bootstrap-touch-slider id then you have to change Carousel-indicators and Carousel-Control  #bootstrap-touch-slider slide as well
	        Slide effect: slide, fade
	        Text Align: slide_style_center, slide_style_left, slide_style_right
	        Add animation in text: https://daneden.github.io/animate.css/
	        -->
		<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="5000" >

	            <!-- Indicators -->
	            <ol class="carousel-indicators">
	                <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
	                <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
	                <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
	            </ol>

	            <!-- Wrapper For Slides -->
	            <div class="carousel-inner" role="listbox">

	                <!-- Third Slide -->
	                <div class="item active">

	                    <!-- Slide Background -->
	                    <img src="../images/back1.png" alt="Chocolate Cake"  class="slide-image"/>
	                    <div class="bs-slider-overlay"></div>

	                    <div class="container">
	                        <div class="row">
	                            <!-- Slide Text Layer -->
	                            <div class="slide-text slide_style_left">
	                                <h1 data-animation="animated zoomInRight">Chocolate Cake</h1>
	                                <p data-animation="animated fadeInLeft">Thick dark chocolate and rich fruity Kirsch (cherry spirit) <br>are locked in a Pandora’s Box of plump cake layers and chocolate.<br> Don’t take a bite or you’ll free the passion! </p>
	                                <a href="cakelist.php?cate=Chocolate" class="btn btn-default" data-animation="animated fadeInLeft">View more.</a>
	                                <a href="#" target="_blank"  class="btn btn-primary" data-animation="animated fadeInRight">Add to cart</a>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <!-- End of Slide -->

	                <!-- Second Slide -->
	                <div class="item">

	                    <!-- Slide Background -->
	                    <img src="../images/back3.jpg" alt="Fruit Cake"  class="slide-image"/>
	                    <div class="bs-slider-overlay"></div>
	                    <!-- Slide Text Layer -->
	                    <div class="slide-text slide_style_center">
	                        <h1 data-animation="animated flipInX">Fruit cake</h1>
	                        <p data-animation="animated lightSpeedIn">Got those Monday blues? <br>It’s time for a Blue Monday. <br>Premium fresh blueberry jam <br>atop a joyous mountain of creamy cheesecake.</p>
	                        <a href="cakelist.php?cate=Fruit" class="btn btn-default" data-animation="animated fadeInUp">View more</a>
	                        <a href="#" target="_blank"  class="btn btn-primary" data-animation="animated fadeInDown">Add to cart</a>
	                    </div>
	                </div>
	                <!-- End of Slide -->

	                <!-- Third Slide -->
	                <div class="item">

	                    <!-- Slide Background -->
	                    <img src="../images/back2.jpg" alt="Fondant Cake"  class="slide-image"/>
	                    <div class="bs-slider-overlay"></div>
	                    <!-- Slide Text Layer -->
	                    <div class="slide-text slide_style_right">
	                        <h1 data-animation="animated zoomInLeft">Fondant Cake</h1>
	                        <p data-animation="animated fadeInRight">A colourful crowding of fresh fruit <br>all hemmed in by coconut.<br> Grab that spoon and get diggin' .</p>
	                        <a href="cakelist.php?cate=Fondant" class="btn btn-default" data-animation="animated fadeInLeft">View more.</a>
	                        <a href="#" target="_blank" class="btn btn-primary" data-animation="animated fadeInRight">Add to cart</a>
	                    </div>
	                </div>
	                <!-- End of Slide -->


	            </div><!-- End of Wrapper For Slides -->

	            <!-- Left Control -->
	            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
	                <span class="fa fa-angle-left" aria-hidden="true"></span>
	                <span class="sr-only">Previous</span>
	            </a>

	            <!-- Right Control -->
	            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
	                <span class="fa fa-angle-right" aria-hidden="true"></span>
	                <span class="sr-only">Next</span>
	            </a>

	        </div> <!-- End  bootstrap-touch-slider Slider -->
		
	</div>
	
	<script src="http://cdn.bootcss.com/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
	<script>window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')</script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="http://cdn.bootcss.com/jquery.touchswipe/1.6.18/jquery.touchSwipe.min.js"></script>
       <script src="scripts/bootstrap-touch-slider.js"></script>
       <script type="text/javascript">
            $('#bootstrap-touch-slider').bsTouchSlider();
        </script>
</body>
</html>
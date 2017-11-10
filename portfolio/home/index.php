<?php 
	include('includes/header.php');
	
	?>
<!-- Jumbotron -->
	<div class="jumbotron" id="<?php echo $navItems[0]['slug']; ?>">
	  <h1 class="display-3">KBurthey</h1>
	  <p class="lead">Website Development and Project Management Solutions</p>
	  <hr class="my-4">
	  <p class="lead">
		<a class="btn btn-primary btn-lg jumbo-button" id="bannerbutton" href="#Contact" role="button">Get in Touch</a>
	  </p>
	</div> <!-- jumbotron -->

<!-- Portfolio Section -->
	<div class="title" id="<?php echo $navItems[1]['slug']; ?>">
		<div class="container">
			<h2> <i class="fa fa-th-large" aria-hidden="true"></i> <?php echo $navItems[1]['slug']; ?> </h2>
		</div> <!-- container -->
	</div> <!-- title -->
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	  <div class="carousel-inner" role="listbox">
		<div class="carousel-item active">
		  <a href="Foto/" target="_blank"><img class="d-block img-fluid" src="Foto2.png" alt="First slide"></a>
		</div>
		<div class="carousel-item">
		  <a href="Move/" target="_blank"><img class="d-block img-fluid" src="Move1.png" alt="Second slide"></a>
		</div>
		<div class="carousel-item">
		  <a href="webapp/" target="_blank"><img class="d-block img-fluid" src="webapp2.png" alt="Third slide"></a>
		</div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>
	
	<!--<div class="row portfolio">
			<div class="col-md-6 col-lg-6 col-sm-12">
				<div class="tile">
					<a href="webapp/" target="_blank"><img src="webapp1.png"></a>
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-12">
				<div class="tile">
					<a href="Foto/" target="_blank"><img src="Foto1.png"></a>
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-sm-12">
				<div class="tile">
					<a href="Move/" target="_blank"><img src="Move1.png"></a>
				</div>
			</div>
		</div> -->
	
	

<!-- About Section 
<div class="title" id="<?php echo $navItems[2]['slug']; ?>">
	<div class="container">
		<h2> <i class="fa fa-question-circle" aria-hidden="true"></i> <?php echo $navItems[2]['slug']; ?> </h2>
	
	</div>  container 
</div>  title -->

<!-- Contact section -->
	
	<div class="title" id="<?php echo $navItems[2]['slug']; ?>">
		<div class="container">
			<h2> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?php echo $navItems[2]['slug']; ?> </h2>
		</div> <!-- container -->
	</div> <!-- title -->
	<div class="contact-me">
	<div class="container">
		<div class="row contact-row">
			<div class="col-lg-6 col-sm-12">
				<img src="redbackground.jpg" width="100%">
			</div>
			<div class="col-lg-6 col-sm-12">
				
				<div id="contact">
					<h1> Tell me something good...</h1>
					<?php 
						//Check for header injections
						function has_header_injection($str) {
							return preg_match( "/[\r\n]/", $str);
							}
						if (isset ($_POST['contact_submit'])) {
							$name = trim($_POST['name']);
							$email = trim($_POST['email']);
							$msg = $_POST['message'];
							
							//Check to see if $name or $email have header injections
							if (has_header_injection($name) || has_header_injection($email)) {
								die(); //if true, kill the script
								}
							if (!$name || !$email || !$msg) {
								echo '<h4 class="error"> All fields required. </h4><a href="#Contact" class="button block"> Try again </a>';
								exit;
								}
							
							//add recipient email to a variable
							$to = "kburthey@gmail.com";
							
							//create subject
							$subject = "$name sent you a message via your contact form";
							
							//construct
							$message = "Name: $name\r\n";
							$message .= "Email: $email\r\n";
							$message .= "Message:\r\n$msg";
							
							//set the mail headers into a variable
							$headers = "MIME-Version: 1.0\r\n";
							$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
							$headers .= "From: $name <$email>\r\n";
							$headers .= "X-Priority: 1\r\n";
							$headers .= "X-MSMail-Priority: High\r\n\r\n";
							
							//send mail
							mail($to, $subject, $message, $headers);
							
							
						?>
						
						<!-- show success message after email has sent -->
						<h5> Thanks for the message! </h5>
						<p> You will receive a response soon </p>
						<!--<p> <a href='/final' class="button block"> &laquo; Go To Home Page </a></p> -->
					<?php } else { ?>
					<form method="post" action="" id="contact-form">
						<div class="form-group">
							<label for="name"> Your Name </label>
							<input type="text" id="name" name="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="email"> Your Email </label>
							<input type="email" id="email" name="email" class="form-control">
						</div>
						<div class="form-group">	
							<label for="message"> Your Message </label>
							<textarea id="message" name="message" class="form-control"> </textarea>
						</div>
						<div class="form-group" >	
							<input type="submit" class="btn btn-primary jumbo-button" name="contact_submit" value="Send Message">
						</div>
					</form>
					<?php } ?>
						
				</div> <!-- contact -->
				<p id="email"> Or email me at kburthey@gmail.com </p>
			</div><!-- col-md-->
		</div><!-- row -->
	</div><!-- Container -->
	</div>

<?php 
	include('includes/footer.php');
?>
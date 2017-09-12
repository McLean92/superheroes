<?php session_start();
require_once 'include/db_con.php';
include 'include/login-check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- using php include to seperate/organize code -->
<?php include('include/head.php'); ?>
<title>Login superhero</title>

</head>
	<body>
	<!-- simplegrid - responsive design -->
	<div class="bknd-img2">
		<div class="grid grid-pad">
			<div class="container col-6-12 push-3-12"><!-- container START -->
				<div class="form_head2">
					<h1 class="headline">LOGIN SUPERHERO</h1>
				</div>

				<div class="img">
					<div class="form_body2">
					<!-- creating a form so user can login. The script gets posted to the current page -->
						<form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">

							<!-- type = what datatype is required. Name = the connection between PHP and DB  -->
							<input class="col-6-12 push-3-12" type="text" name="cName" placeholder="Superhero Name"  data-validation="required">

							<!-- required is html validation. Makes sure user enter all fields -->
							<input class="col-6-12 push-3-12" type="password" name="pw" placeholder="Password *"  data-validation="required">

							<button class="submit2 col-6-12 push-3-12" type="submit" name="submit">Login superhero </button>

							<div class="col-10-12 push-1-12 herofail">
								<?php if(isset($_GET['wrong'])) {
									echo base64_decode(urldecode($_GET['wrong'])); 
								}
								?>
								<?php if(isset($_GET['loggedout'])) {
										echo base64_decode(urldecode($_GET['loggedout']));
									} ?> 
								<?php if(isset($_GET['forcedlogout'])) {
										echo base64_decode(urldecode($_GET['forcedlogout']));
									} ?> <!-- Using the urldecode function to return the URL string (message echoed) -->
									</div>
						</form>

					<div class="signup col-6-12 push-3-12">Not a superhero yet? 
						<a href="register.php"> Be one now!
						</a>
					</div>

					</div><!-- form_body end -->
				</div><!-- img end -->


				<div class="form_footer2">Copyright &#9400; <a href="www.portfolio.charmaine.dk" target="_blank">Charmaine McLean</a> 2017
				</div>

		



			</div><!-- container END -->
		</div><!-- grid grid-pad END -->
	</div><!-- bknd-img END -->
	</body>
</html>

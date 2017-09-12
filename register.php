<?php
require_once 'include/db_con.php';
$namesuccess = '';
$namefail = '';
include ('include/register-superhero.php');
?>

<!DOCTYPE html>

<html lang="en">

<head>
<!-- using php include to seperate/organize code -->
<?php include('include/head.php'); ?>
<title>Register superhero</title>

</head>
	<body>
	<!-- simplegrid - responsive design -->
	<div class="bknd-img">
		<div class="grid grid-pad">
			<div class="container col-6-12 push-3-12"><!-- container START -->
				<div class="form_head">
					<h1 class="headline">REGISTER SUPERHERO</h1>
				</div>

				<div class="img">
					<div class="form_body">
					<!-- creating a form so user can login  -->
						<form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">

							<!-- type = what datatype is required. Name = the connection between PHP and DB  -->
							<input class="col-6-12 push-3-12" type="text" name="cName" placeholder="Superhero name *"  data-validation="required">

							<input class="col-6-12 push-3-12" type="email" name="email" placeholder="Email *"  data-validation="required">

							<!-- required is html validation. Makes sure user enter all fields -->
							<input class="col-6-12 push-3-12" type="password" name="pw" placeholder="Password *"  data-validation="required">

							<button class="submit col-6-12 push-3-12" type="submit" name="submit"> Create superhero </button>

							<div class="col-10-12 push-1-12 herosuccess">
								<?php echo $namesuccess; ?> <!-- If the user gets registred successfully -->
							</div>
							<div class="col-10-12 push-1-12 herofail">
								<?php echo $namefail; ?> <!-- If the user registration fails -->
							</div>

						</form>

						<div class="signup col-6-12 push-3-12">
							<a href="login.php"> Log in now!
							</a>
						</div>

					</div><!-- form_body end -->
				</div><!-- img end -->


				<div class="form_footer">Copyright &#9400; <a href="www.portfolio.charmaine.dk" target="_blank">Charmaine McLean</a> 2017
				</div>

		



			</div><!-- container END -->
		</div><!-- grid grid-pad END -->
	</div><!-- bknd-img END -->
	</body>
</html>

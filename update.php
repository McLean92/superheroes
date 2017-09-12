<?php
session_start();
require_once 'include/db_con.php';
include ('include/register-superhero.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- using php include to seperate/organize code -->
<?php include('include/head.php'); ?>
<title>Update superhero</title>
</head>
	<body>
	<div class="bknd-img3">
		<!-- simplegrid - responsive design -->
		<div class="grid grid-pad">
			<div class="box col-10-12 push-1-12"><!-- container START -->

				<div class="form_head3">
					<h1 class="headline">
					EDIT <?= $_SESSION['supername'] ?>
				</h1>
				</div>
				<div class="img">
					<div class="form_body3">
					<!-- creating a form so user can login  -->
						<div class="col-9-12 content">
							<form action="include/update.inc.php" method="POST" enctype="multipart/form-data">
								<!-- Editing superhero name -->
								<div class="col-11-12 push-1-12">
									<input name="categoryid" type="hidden" value="<?=$cid?>">
									<input class="col-6-12" type="text" name="cName" placeholder="Change superhero name"  data-validation="required">
									<button class="edit col-2-12 push-1-12" name="cmd" type="submit" value="superhero-name">Edit</button>
								</div>
								<!-- Editing/creating description -->
								<div class=" col-11-12 push-1-12">
									<input name="categoryid" type="hidden" value="<?=$cid?>">
									<textarea class="desc col-6-12" type="text" name="desc" placeholder="Write a description"  data-validation="required"></textarea>
									<button class="edit col-2-12 push-1-12" name="cmd" type="submit" value="edit-description">Edit</button>
								</div>
								<!-- Editing email -->
								<div class="col-11-12 push-1-12">
									<input name="categoryid" type="hidden" value="<?=$cid?>">
									<input class="col-6-12" type="email" name="email" placeholder="Change email" value="default@gmail.com">
									<button class="edit col-2-12 push-1-12" name="cmd" type="submit" value="change-email">Edit</button>
								</div>
								<!-- Editing password -->
								<div class="col-11-12 push-1-12">
									<input name="categoryid" type="hidden" value="<?=$cid?>">
									<input class="col-6-12" type="password" name="pw" placeholder="Change password"  data-validation="required">
									<button class="edit col-2-12 push-1-12" name="cmd" type="submit" value="passwordchange">Edit</button>
								</div>
								<div class="push-1-12 col-11-12">
								<!-- Editing/selecting a superhero team -->
									<select class="select col-6-12" name="team">
										<option selected value="hidden">Select new team</option>	
										<option value="Marvel">Marvel</option>	
									  	<option value="X-men">Marvel - X-men</option>
									  	<option value="Avengers">Marvel - Avengers</option>
									  	<option value="DC">DC</option>
									  	<option value="Suicide Squad">DC - Suicide Squad</option>
									  	<option value="Justice League">DC - Justice League</option>
									  	<option value="Dragon Ball Z">Dragon Ball Z</option>
									  	<option value="Star Wars">Star Wars</option>
									  	<option value="Jedi Knight">Star Wars - Jedi Knight</option>
									   <option value="Sith Warrior">Star Wars - Sith Warrior</option>
									</select> 
									
									<button class="edit col-2-12 push-1-12" name="cmd" type="submit" value="teamchange">Edit</button>
									
								</div>

							</form>
						</div><!-- content END -->
						<div class="col-3-12 sidebar">
							<ul>
								<li><a href="welcome.php">View superhero</a></li>
								<li><a href="viewmembers.php">View all superheroes</a></li>
							</ul>

							<form action="logout.php" method="POST">
								<button class="logout" type="submit" name="submitlogout">Logout</button>
							</form>
						</div><!-- sidebar END -->
					</div><!-- form_body end -->
				</div><!-- img end -->


				<div class="form_footer3">Copyright &#9400; <a href="www.portfolio.charmaine.dk" target="_blank">Charmaine McLean</a> 2017
				</div>

			</div><!-- container END -->
		</div><!-- grid grid-pad END -->
	</div><!-- bknd END -->
	</body>
</html>

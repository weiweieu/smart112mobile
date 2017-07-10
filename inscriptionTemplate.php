<?php
$langFileToLoad = __ROOT_DIR . '/languages/langForms.'. $language .'.php';
		include($langFileToLoad);
	?>
<div class="container">
	<div class="row">

		<div class="col-md-offset-2 col-md-8">
			<div class="logo">
					<img src="img/112Mobile.png" alt="112Mobile" id="logo" />
			</div>
		<form action="index.php" method="post" id="inscriptionForm">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#"><?php	echo $lang['STEP_1']; ?></a></li>
						<li ><a href="#"><?php	echo $lang['STEP_2']; ?></a></li>
					</ul>
				</div>
			</nav>
			<?php
			if(isset($inscErrorText))
				echo '<div class="alert alert-danger" role="alert"><span class="error">'.$lang[$inscErrorText].'</span></div>';
			?>

			<div class="input-group">
				<h4><?php	echo $lang['LOGIN']; ?>*</h4>
				<?php
				 echo '<input type="text" class="form-control" value="'.$login.'" name="inscLogin">';
			 ?>
			</div>
			<div class="input-group">
				<h4><?php	echo $lang['PASSWORD']; ?>*</h4>
				<?php
          echo '<input type="password" class="form-control" value="'.$password.'" name="inscPassword">';
        ?>
			</div>
			<div class="input-group">
				<h4><?php	echo $lang['E-MAIL']; ?>*</h4>
				<?php
          echo '<input type="email" class="form-control" value="'.$email.'" name="inscEmail">';
        ?>
			</div>
			<div class="input-group">
				<h4><?php	echo $lang['SURNAME']; ?></h4>
				<?php
          echo '<input type="text" class="form-control" value="'.$surname.'" name="inscSurname">';
        ?>
			</div>
			<div class="input-group">
				<h4><?php	echo $lang['NAME']; ?></h4>
				<?php
          echo '<input type="text" class="form-control" value="'.$name.'" name="inscName">';
        ?>
			</div>
			<div class="input-group">
				<h4><?php	echo $lang['SERVICE']; ?>*</h4>
				<select name="inscService">
					<?php
					echo '<option value="'.$service.'">'.$lang[$service].'</option>';
				 if(isset($services)){
					 foreach($services as $serv){
						 if($serv!==$service){
							 echo '<option value="'.$serv->serviceName().'">';
							 echo $lang[$serv->serviceName()];
							 echo '</option>';
						 }
					 }
				 }
						?>
						<option value="AUTRE"><?php	echo $lang['OTHER']; ?></option>
				</select>
			</div>
			<div class="input-group">
				<h4><?php	echo $lang['COUNTRY']; ?>*</h4>

					<select name="inscCountry" id="selectCountry"  >
					<?php
					echo '<option value="'.$country.'">'.$lang[$country].'</option>';
					if(isset($countries)){
						foreach($countries as $count){
								if($count!=$country){
							echo '<option value="'.$count->country().'">';
							echo $lang[$count->country()];
							echo '</option>';
								}
						}
					}
						?>
						<option value="AUTRE"><?php	echo $lang['OTHER']; ?></option>
				</select>


			</div>



			<div class="form-group">
				<a href="index.php?action=connection"><?php	echo $lang['BACK_BUTTON']; ?></a>

					<input type="submit" class="btn btn-info" name="validateStep1" id="validateStep1" value="<?php	echo $lang['NEXT_BUTTON']; ?>" title="<?php	echo $lang['NEXT_BUTTON_TITLE']; ?>"/>

			</div>

				<p>*<?php	echo $lang['REQUIRED_FIELDS']; ?></p>

				</form>

			</div>
		</div>
	</div>

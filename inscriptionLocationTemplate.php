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
						<li ><a href="#"><?php echo $lang['STEP_1']; ?></a></li>
						<li class="active"><a href="#"><?php echo $lang['STEP_2']; ?></a></li>
					</ul>
				</div>
			</nav>

			<?php
			if(isset($inscErrorText))
				echo '<div class="alert alert-danger" role="alert"><span class="error">' . $lang[$inscErrorText] . '</span></div>';
			?>
				<h5><?php echo $lang['LOCATION_PRECISION']; ?></h5>
			<div class="input-group">
				<h4><?php echo $lang['DEPARTMENT']; ?></h4>
		<select name="inscDepartment">
			<option value="#"><?php echo $lang['CHOOSE_DEPARTMENT']; ?></option>
        <?php
					if(isset($departments)){
						foreach($departments as $dep){
								echo '<option value="'.$dep->departmentName().'">';
								echo $dep->departmentName().' ('.$dep->departmentNumber().')';
								echo '</option>';
						}
					}
					?>
					<option value="AUTRE"><?php echo $lang['OTHER'];?></option>
			</select>
		</div>
		<div class="input-group">
			<h4><?php echo $lang['POSTCODE'];?></h4>
			 <input type="text" class="form-control"  name="inscPostcode">
		</div>
	<div class="input-group">
		<h4><?php echo $lang['TOWN'];?></h4>
			 <input type="text" class="form-control"  name="inscTown">
</div>


			<div class="form-group">
				<input type="submit" class="btn btn-info" name="validateStep2" value="<?php	echo $lang['INSCRIPTION_VALIDATION']; ?>" />
			</div>



				</form>

			</div>
		</div>
	</div>

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
				<form action="index.php" method="get">
				<select name="lang" id="language">
					<option value="#"><?php	echo $lang['CHOOSE_LANGUAGE']; ?></option>
					<option value="en">English</option>
					<option value="fr">Français</option>
					<option value="es">Español</option>
				</select>
				<input type="submit" class="btn " id="languageButton" value="<?php	echo $lang['LANGUAGE_BUTTON']; ?>">
			</form>
			<form action="index.php" method="post" id="connectionForm">

				<?php

				if(isset($inscErrorText))

					echo '<div class="alert alert-danger" role="alert"><span class="error">' . $lang[$inscErrorText] . '</span></div>';

				?>
				<div class="input-group">
					<h4><?php	echo $lang['LOGIN']; ?></h4>
					<input type="text" class="form-control" placeholder="" name="inscLogin">
				</div>
				<div class="input-group">
					<h4><?php	echo $lang['PASSWORD']; ?></h4>
					<input type="password" class="form-control" placeholder="" name="inscPassword">
				</div>

				<div class="form-group">
					<a href="index.php?action=inscription"><?php	echo $lang['REGISTER_BUTTON']; ?></a>
					<input type="submit" class="btn btn-info" name="login" value="<?php	echo $lang['LOGIN_BUTTON']; ?>">
				</div>


					</form>

				</div>
			</div>
		</div>

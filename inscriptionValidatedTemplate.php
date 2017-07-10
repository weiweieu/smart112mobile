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
			       <h3><?php	echo $lang['INSCRIPTION_SUCCESSFUL']; ?></h3>

				</div>
			</div>
		</div>

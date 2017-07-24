<?php
$langFileToLoad = __ROOT_DIR . '/languages/langDash.'. $language .'.php';
		include($langFileToLoad);
	?>
  <nav class="navbar navbar-default navbar-menu">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="index.php" id="active"><?php	echo $lang['112MOBILE']; ?></a></li>
        <li><a href="index.php?action=map"><?php	echo $lang['MAP_VIEW']; ?></a></li>
        <li><a href="index.php?action=deconnexion"><?php	echo $lang['DISCONNECTION']; ?></a></li>
      </ul>
      <ul id="ulLanguage">
        <li>
          <form action="index.php" method="get">
  	        <select name="lang" id="language">
    					<option value="#"><?php	echo $lang['CHOOSE_LANGUAGE']; ?></option>
    					<option value="en">English</option>
    					<option value="fr">Français</option>
    					<option value="es" disabled>Español</option>
    				</select>
            <input type="submit" class="btn " id="languageButton" value="<?php	echo $lang['LANGUAGE_BUTTON']; ?>">
         </form>
       </li>
      </ul>
    </div>
  </nav>

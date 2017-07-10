<?php

// Load my root class
require_once(__ROOT_DIR . '/classes/MyObject.class.php');

class AutoLoader extends MyObject {

	public function __construct() {
		spl_autoload_register(array($this, 'load'));
	}


	// This method will be automatically executed by PHP whenever it encounters
	// an unknown class name in the source code
	private function load($className) {


		$paths = array('/classes/', '/model/', '/controller/', '/view/');
		$fileToLoad = null;
		$i = 0;

		do {
			$fileToLoad = __ROOT_DIR . $paths[$i] . ucfirst($className) . '.class.php';
			$i++;
		} while(!is_readable($fileToLoad) && $i<count($paths));

		if(!is_readable($fileToLoad))
			throw new Exception('Unknown class ' . $className);

		require_once($fileToLoad);

		if (strlen(strstr($fileToLoad, '/model/'))>0) { // On cherche s'il y a une première occurence de '/model/' dans l'adresse $fileToLoad
			// We will load a model class
			// so let's try to load the sql requests associated with it
			if($className=='UserModel' || $className=='AnonymousModel' || $className=='JurisdictionModel'){
				$sqlFileToLoad = __ROOT_DIR . '/sql/' . $className . '.sql.php';
	//			echo "<p>Loading SQL : " . $sqlFileToLoad . "</p>";
				require_once($sqlFileToLoad);
			}
		}


	}
}

$__LOADER = new AutoLoader();

?>

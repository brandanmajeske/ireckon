<?php

class AuthView {

	public function show($template, $data = array()) {
		$templatePath = "views/${template}.inc";
		if (file_exists($templatePath)){
			
			/*$pageTitle = 'Authentication';
			$subHeading = '';
*/
			include $templatePath;
		}
	}


}
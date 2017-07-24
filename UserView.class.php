<?php

class UserView extends View {

	public function __construct($user,$templateName) {
		parent::__construct('User',$templateName);
		$this->templateNames['menu'] = 'userMenu';
		$this->templateNames['head'] = 'userHead';
		$this->templateNames['top'] = 'userTop';
		$this->templateNames['foot'] = 'userFoot';
		$this->setArg('user',$user);
		if(!$this->args['user'])
			throw new Exception('a user must be defined');
	}

	public function renderDashboard() {
		$this->loadTemplate($this->templateNames['head'], $this->args);
		$this->loadTemplate($this->templateNames['top'], $this->args);
		$this->loadTemplate('mapMenu', $this->args);
		$this->loadTemplate('mapContent', $this->args);
		$this->loadTemplate($this->templateNames['foot'], $this->args);
	}
}

?>

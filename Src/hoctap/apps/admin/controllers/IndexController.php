<?php
namespace hoctap\Admin\Controllers;

use hoctap\Admin\Controllers\ControllerBase;
class IndexController extends ControllerBase
{
	public function initialize(){
		$this->tag->setTitle("Index Admin Page");
		parent::initialize();
	}
    public function indexAction()
    {
		
    }

}


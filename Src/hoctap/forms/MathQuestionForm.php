<?php

namespace hoctap\Form\MathForm;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;

class MathQuestionForm extends Form {
	public function initialize(){
		$this->add(new Text("name"));
		$this->add(new Submit("OK"));
	}
}
<?php

namespace hoctap\Form\MathForm;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\TextArea;

class MathQuestionForm extends Form {
	public function initialize(){
		$this->add(new TextArea("name"));
		$this->add(new Submit("OK"));
	}
}
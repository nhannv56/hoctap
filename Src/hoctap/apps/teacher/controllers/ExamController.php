<?php

namespace hoctap\Teacher\Controllers;

use hoctap\Teacher\Controllers\ControllerBase;
use hoctap\Form\MathForm\MathQuestionForm;

class ExamController extends ControllerBase {
	public function initialize() {
		parent::initialize ();
		$this->tag->prependTitle ( 'Tạo đề thi| ' );
	}
	public function indexAction() {
	}
	public function createAction() {
		$question = new MathQuestionForm ();
		$this->view->question = $question;
	}
	public function addQuestion(){
		
	}
}


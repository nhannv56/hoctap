<?php

namespace hoctap\Teacher\Controllers;

use hoctap\Teacher\Controllers\ControllerBase;
use hoctap\Teacher\Models\Questions;

class ExamController extends ControllerBase {
	public function initialize() {
		parent::initialize ();
		$this->tag->prependTitle ( 'Tạo đề thi| ' );
	}
	public function indexAction() {
	}
	public function createQuestionAction() {
		if ($this->request->get ( 'add' ) != null) {
			$questionContent = $this->request->get ( 'question' );
			$this->addQuestion ( $questionContent );
		}
		$q = Questions::findFirst ();
		if ($q) {
			$this->view->data = $q->question_content;
		}
	}
	public function addQuestion($question) {
		$questionModel = new Questions ();
		$questionModel->question_name = "new";
		$questionModel->question_content = $question;
		if (! $questionModel->save ()) {
			foreach ( $questionModel->getMessages () as $message ) {
				$this->flash->error ( $message );
			}
		}
	}
}


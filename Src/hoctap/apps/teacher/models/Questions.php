<?php

namespace hoctap\Teacher\Models;

class Questions extends \Phalcon\Mvc\Model {
	
	/**
	 *
	 * @var integer
	 */
	public $id;
	
	/**
	 *
	 * @var string
	 */
	public $question_name;
	
	/**
	 *
	 * @var string
	 */
	public $question_content;
	
	/**
	 *
	 * @var integer
	 */
	public $question_type;
	
	/**
	 *
	 * @var integer
	 */
	public $author_id;
	
	/**
	 *
	 * @var string
	 */
	public $date_modify;
	
	/**
	 * Initialize method for model.
	 */
	public function initialize() {
		$this->hasMany ( 'id', 'ExamsQuestions', 'question_id', array (
				'alias' => 'ExamsQuestions' 
		) );
		$this->belongsTo ( 'question_type', 'QuestionTypes', 'id', array (
				'alias' => 'QuestionTypes' 
		) );
		$this->belongsTo ( 'author_id', 'Users', 'id', array (
				'alias' => 'Users' 
		) );
	}
	
	/**
	 * Returns table name mapped in the model.
	 *
	 * @return string
	 */
	public function getSource() {
		return 'questions';
	}
	
	/**
	 * Allows to query a set of records that match the specified conditions
	 *
	 * @param mixed $parameters        	
	 * @return Questions[]
	 */
	public static function find($parameters = null) {
		return parent::find ( $parameters );
	}
	
	/**
	 * Allows to query the first record that match the specified conditions
	 *
	 * @param mixed $parameters        	
	 * @return Questions
	 */
	public static function findFirst($parameters = null) {
		return parent::findFirst ( $parameters );
	}
}

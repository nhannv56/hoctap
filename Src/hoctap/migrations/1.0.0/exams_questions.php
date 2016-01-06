<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class ExamsQuestionsMigration_100
 */
class ExamsQuestionsMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('exams_questions', array(
                'columns' => array(
                    new Column(
                        'id',
                        array(
                            'type' => Column::TYPE_INTEGER,
                            'size' => 11,
                            'first' => true
                        )
                    ),
                    new Column(
                        'exam_id',
                        array(
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size' => 11,
                            'after' => 'id'
                        )
                    ),
                    new Column(
                        'question_id',
                        array(
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'size' => 11,
                            'after' => 'exam_id'
                        )
                    )
                ),
                'indexes' => array(
                    new Index('PRIMARY', array('exam_id', 'question_id')),
                    new Index('question_id', array('question_id'))
                ),
                'references' => array(
                    new Reference(
                        'exams_questions_ibfk_1',
                        array(
                            'referencedSchema' => 'hoctap',
                            'referencedTable' => 'exams',
                            'columns' => array('exam_id'),
                            'referencedColumns' => array('id')
                        )
                    ),
                    new Reference(
                        'exams_questions_ibfk_2',
                        array(
                            'referencedSchema' => 'hoctap',
                            'referencedTable' => 'questions',
                            'columns' => array('question_id'),
                            'referencedColumns' => array('id')
                        )
                    )
                ),
                'options' => array(
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '',
                    'ENGINE' => 'InnoDB',
                    'TABLE_COLLATION' => 'utf8_general_ci'
                ),
            )
        );
    }

    /**
     * Run the migrations
     *
     * @return void
     */
    public function up()
    {

    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {

    }

}

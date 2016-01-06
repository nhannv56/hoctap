<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class QuestionsMigration_100
 */
class QuestionsMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('questions', array(
                'columns' => array(
                    new Column(
                        'id',
                        array(
                            'type' => Column::TYPE_INTEGER,
                            'notNull' => true,
                            'autoIncrement' => true,
                            'size' => 11,
                            'first' => true
                        )
                    ),
                    new Column(
                        'question_name',
                        array(
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 100,
                            'after' => 'id'
                        )
                    ),
                    new Column(
                        'question_content',
                        array(
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 1000,
                            'after' => 'question_name'
                        )
                    ),
                    new Column(
                        'question_type',
                        array(
                            'type' => Column::TYPE_INTEGER,
                            'size' => 11,
                            'after' => 'question_content'
                        )
                    ),
                    new Column(
                        'author_id',
                        array(
                            'type' => Column::TYPE_INTEGER,
                            'size' => 11,
                            'after' => 'question_type'
                        )
                    ),
                    new Column(
                        'date_modify',
                        array(
                            'type' => Column::TYPE_DATE,
                            'size' => 1,
                            'after' => 'author_id'
                        )
                    )
                ),
                'indexes' => array(
                    new Index('PRIMARY', array('id')),
                    new Index('question_type', array('question_type')),
                    new Index('author_id', array('author_id'))
                ),
                'references' => array(
                    new Reference(
                        'questions_ibfk_1',
                        array(
                            'referencedSchema' => 'hoctap',
                            'referencedTable' => 'question_types',
                            'columns' => array('question_type'),
                            'referencedColumns' => array('id')
                        )
                    ),
                    new Reference(
                        'questions_ibfk_2',
                        array(
                            'referencedSchema' => 'hoctap',
                            'referencedTable' => 'users',
                            'columns' => array('author_id'),
                            'referencedColumns' => array('id')
                        )
                    )
                ),
                'options' => array(
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '1',
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

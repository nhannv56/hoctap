<?php 

use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Mvc\Model\Migration;

/**
 * Class UsersMigration_100
 */
class UsersMigration_100 extends Migration
{
    /**
     * Define the table structure
     *
     * @return void
     */
    public function morph()
    {
        $this->morphTable('users', array(
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
                        'first_name',
                        array(
                            'type' => Column::TYPE_VARCHAR,
                            'notNull' => true,
                            'size' => 20,
                            'after' => 'id'
                        )
                    ),
                    new Column(
                        'last_name',
                        array(
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 40,
                            'after' => 'first_name'
                        )
                    ),
                    new Column(
                        'mobile_phone',
                        array(
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 15,
                            'after' => 'last_name'
                        )
                    ),
                    new Column(
                        'bithday',
                        array(
                            'type' => Column::TYPE_DATE,
                            'size' => 1,
                            'after' => 'mobile_phone'
                        )
                    ),
                    new Column(
                        'email',
                        array(
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 100,
                            'after' => 'bithday'
                        )
                    ),
                    new Column(
                        'facebook',
                        array(
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 200,
                            'after' => 'email'
                        )
                    ),
                    new Column(
                        'address',
                        array(
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 200,
                            'after' => 'facebook'
                        )
                    ),
                    new Column(
                        'school',
                        array(
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 200,
                            'after' => 'address'
                        )
                    ),
                    new Column(
                        'education_level',
                        array(
                            'type' => Column::TYPE_INTEGER,
                            'size' => 11,
                            'after' => 'school'
                        )
                    ),
                    new Column(
                        'rank',
                        array(
                            'type' => Column::TYPE_INTEGER,
                            'size' => 11,
                            'after' => 'education_level'
                        )
                    ),
                    new Column(
                        'user_name',
                        array(
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 100,
                            'after' => 'rank'
                        )
                    ),
                    new Column(
                        'password',
                        array(
                            'type' => Column::TYPE_VARCHAR,
                            'size' => 100,
                            'after' => 'user_name'
                        )
                    )
                ),
                'indexes' => array(
                    new Index('PRIMARY', array('id'))
                ),
                'options' => array(
                    'TABLE_TYPE' => 'BASE TABLE',
                    'AUTO_INCREMENT' => '2',
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

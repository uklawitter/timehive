<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addtbsettings extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('tb_settings', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 8,
              'autoincrement' => true,
              'primary' => true,
             ),
             'user_id' => 
             array(
              'type' => 'integer',
              'length' => 20,
             ),
             ), array(
             'indexes' => 
             array(
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
    }

    public function down()
    {
        $this->dropTable('tb_settings');
    }
}
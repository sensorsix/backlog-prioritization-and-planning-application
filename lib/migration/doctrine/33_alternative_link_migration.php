<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AlternativeLinkMigration extends Doctrine_Migration_Base
{
  public function up()
  {
    $this->removeColumn('alternative', 'link');

    $this->createTable(
      'alternative_link',
      array(
        'id'             =>
        array(
          'type'          => 'integer',
          'length'        => '8',
          'autoincrement' => '1',
          'primary'       => '1',
        ),
        'link'           =>
        array(
          'type'   => 'string',
          'length' => '255',
        ),
        'alternative_id' =>
        array(
          'type'   => 'integer',
          'length' => '8',
        ),
      ),
      array(
        'primary' =>
        array(
          0 => 'id',
        ),
        'collate' => 'utf8_general_ci',
        'charset' => 'utf8',
      )
    );
  }

  public function down()
  {
    $this->dropTable('alternative_link');
  }
}
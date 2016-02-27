<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ResponseUserRelationMigration extends Doctrine_Migration_Base
{
  public function up()
  {
    $this->createForeignKey('response', 'response_user_id_sf_guard_user_id',
      array(
        'name'         => 'response_user_id_sf_guard_user_id',
        'local'        => 'user_id',
        'foreign'      => 'id',
        'foreignTable' => 'sf_guard_user',
        'onUpdate'     => '',
        'onDelete'     => 'CASCADE',
      )
    );
  }

  public function postUp()
  {
    foreach (Doctrine::getTable('Response')->findAll() as $response)
    {
      $response->user_id = 1;
      $response->save();
    }
  }

  public function down()
  {
    $this->dropForeignKey('response', 'response_user_id_sf_guard_user_id');
  }
}
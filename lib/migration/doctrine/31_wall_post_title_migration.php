<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WallPostTitleMigration extends Doctrine_Migration_Base
{
  public function up()
  {
    $this->addColumn('wall_post', 'title', 'string', '255', array());
  }

  public function down()
  {
    $this->removeColumn('wall_post', 'title');
  }
}
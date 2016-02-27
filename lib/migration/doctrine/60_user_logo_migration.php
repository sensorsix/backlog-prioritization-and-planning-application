<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UserLogoMigration extends Doctrine_Migration_Base
{
  public function up()
  {
    $this->addColumn('sf_guard_user', 'logo_disable', 'boolean', '25', array());
    $this->addColumn('sf_guard_user', 'logo_file', 'string', '255', array());
    $this->addColumn('sf_guard_user', 'logo_url', 'string', '255', array());
  }

  public function down()
  {
    $this->removeColumn('sf_guard_user', 'logo_disable');
    $this->removeColumn('sf_guard_user', 'logo_file');
    $this->removeColumn('sf_guard_user', 'logo_url');
  }
}
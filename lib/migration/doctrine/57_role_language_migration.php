<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class RoleLanguageMigration extends Doctrine_Migration_Base
{
  public function up()
  {
    $this->addColumn('role', 'language', 'enum', '', array(
        'values'  =>
          array(
            0 => 'en',
            1 => 'da',
          ),
        'default' => 'en',
      )
    );
  }

  public function down()
  {
    $this->removeColumn('role', 'language');
  }
}
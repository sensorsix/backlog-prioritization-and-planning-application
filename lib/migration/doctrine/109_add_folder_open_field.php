<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AddFolderOpenField extends Doctrine_Migration_Base
{
    public function up()
    {
      $this->addColumn('folder', 'open', 'boolean', 1, array('default' => '1'));
    }

    public function down()
    {
      $this->removeColumn('folder', 'open');
    }
}
<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AddSaveGraphWeight extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('decision', 'save_graph_weight', 'boolean', '25', array(
             'default' => '0',
             ));
    }

    public function down()
    {
        $this->removeColumn('decision', 'save_graph_weight');
    }
}
<?php

/**
 * BaseGraphType
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $name
 * @property Doctrine_Collection $Graph
 * 
 * @method string              getName()  Returns the current record's "name" value
 * @method Doctrine_Collection getGraph() Returns the current record's "Graph" collection
 * @method GraphType           setName()  Sets the current record's "name" value
 * @method GraphType           setGraph() Sets the current record's "Graph" collection
 * 
 * @package    dmp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGraphType extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('graph_type');
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));

        $this->option('symfony', array(
             'filter' => false,
             'form' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Graph', array(
             'local' => 'id',
             'foreign' => 'graph_type_id'));
    }
}
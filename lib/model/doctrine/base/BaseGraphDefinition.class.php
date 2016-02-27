<?php

/**
 * BaseGraphDefinition
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $graph_id
 * @property decimal $number
 * @property integer $criterion_id
 * @property integer $alternative_id
 * @property Graph $Graph
 * @property Criterion $Criterion
 * @property Alternative $Alternative
 * 
 * @method integer         getGraphId()        Returns the current record's "graph_id" value
 * @method decimal         getNumber()         Returns the current record's "number" value
 * @method integer         getCriterionId()    Returns the current record's "criterion_id" value
 * @method integer         getAlternativeId()  Returns the current record's "alternative_id" value
 * @method Graph           getGraph()          Returns the current record's "Graph" value
 * @method Criterion       getCriterion()      Returns the current record's "Criterion" value
 * @method Alternative     getAlternative()    Returns the current record's "Alternative" value
 * @method GraphDefinition setGraphId()        Sets the current record's "graph_id" value
 * @method GraphDefinition setNumber()         Sets the current record's "number" value
 * @method GraphDefinition setCriterionId()    Sets the current record's "criterion_id" value
 * @method GraphDefinition setAlternativeId()  Sets the current record's "alternative_id" value
 * @method GraphDefinition setGraph()          Sets the current record's "Graph" value
 * @method GraphDefinition setCriterion()      Sets the current record's "Criterion" value
 * @method GraphDefinition setAlternative()    Sets the current record's "Alternative" value
 * 
 * @package    dmp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseGraphDefinition extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('graph_definition');
        $this->hasColumn('graph_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('number', 'decimal', 20, array(
             'type' => 'decimal',
             'scale' => 1,
             'length' => 20,
             ));
        $this->hasColumn('criterion_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('alternative_id', 'integer', null, array(
             'type' => 'integer',
             ));

        $this->option('symfony', array(
             'filter' => false,
             'form' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Graph', array(
             'local' => 'graph_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Criterion', array(
             'local' => 'criterion_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Alternative', array(
             'local' => 'alternative_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}
<?php

/**
 * BaseStatusFilter
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $decision_id
 * @property enum $status
 * @property Decision $Decision
 * 
 * @method integer      getDecisionId()  Returns the current record's "decision_id" value
 * @method enum         getStatus()      Returns the current record's "status" value
 * @method Decision     getDecision()    Returns the current record's "Decision" value
 * @method StatusFilter setDecisionId()  Sets the current record's "decision_id" value
 * @method StatusFilter setStatus()      Sets the current record's "status" value
 * @method StatusFilter setDecision()    Sets the current record's "Decision" value
 * 
 * @package    dmp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStatusFilter extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('status_filter');
        $this->hasColumn('decision_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('status', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'Draft',
              1 => 'Reviewed',
              2 => 'Planned',
              3 => 'Doing',
              4 => 'Finished',
              5 => 'Parked',
             ),
             'default' => 'Draft',
             ));


        $this->index('status_filter_decsion_idx', array(
             'fields' => 
             array(
              0 => 'decision_id',
             ),
             'type' => 'unique',
             ));
        $this->option('symfony', array(
             'filter' => false,
             'form' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Decision', array(
             'local' => 'decision_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}
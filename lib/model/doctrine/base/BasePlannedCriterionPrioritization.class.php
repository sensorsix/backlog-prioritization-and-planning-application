<?php

/**
 * BasePlannedCriterionPrioritization
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $role_id
 * @property integer $criterion_id
 * @property Role $Role
 * @property Criterion $Criterion
 * 
 * @method integer                        getRoleId()       Returns the current record's "role_id" value
 * @method integer                        getCriterionId()  Returns the current record's "criterion_id" value
 * @method Role                           getRole()         Returns the current record's "Role" value
 * @method Criterion                      getCriterion()    Returns the current record's "Criterion" value
 * @method PlannedCriterionPrioritization setRoleId()       Sets the current record's "role_id" value
 * @method PlannedCriterionPrioritization setCriterionId()  Sets the current record's "criterion_id" value
 * @method PlannedCriterionPrioritization setRole()         Sets the current record's "Role" value
 * @method PlannedCriterionPrioritization setCriterion()    Sets the current record's "Criterion" value
 * 
 * @package    dmp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePlannedCriterionPrioritization extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('planned_criterion_prioritization');
        $this->hasColumn('role_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('criterion_id', 'integer', null, array(
             'type' => 'integer',
             ));


        $this->index('role_criterion_idx', array(
             'fields' => 
             array(
              0 => 'role_id',
              1 => 'criterion_id',
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
        $this->hasOne('Role', array(
             'local' => 'role_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Criterion', array(
             'local' => 'criterion_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}
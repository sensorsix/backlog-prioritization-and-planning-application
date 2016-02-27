<?php

/**
 * BaseWall
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $decision_id
 * @property string $token
 * @property Decision $Decision
 * @property Doctrine_Collection $WallPost
 * 
 * @method integer             getDecisionId()  Returns the current record's "decision_id" value
 * @method string              getToken()       Returns the current record's "token" value
 * @method Decision            getDecision()    Returns the current record's "Decision" value
 * @method Doctrine_Collection getWallPost()    Returns the current record's "WallPost" collection
 * @method Wall                setDecisionId()  Sets the current record's "decision_id" value
 * @method Wall                setToken()       Sets the current record's "token" value
 * @method Wall                setDecision()    Sets the current record's "Decision" value
 * @method Wall                setWallPost()    Sets the current record's "WallPost" collection
 * 
 * @package    dmp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseWall extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('wall');
        $this->hasColumn('decision_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('token', 'string', 8, array(
             'type' => 'string',
             'length' => 8,
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

        $this->hasMany('WallPost', array(
             'local' => 'id',
             'foreign' => 'wall_id'));
    }
}
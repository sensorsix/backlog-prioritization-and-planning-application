<?php

/**
 * BaseTagDecision
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $tag_id
 * @property integer $decision_id
 * @property Decision $Decision
 * @property Tag $Tag
 * 
 * @method integer     getTagId()       Returns the current record's "tag_id" value
 * @method integer     getDecisionId()  Returns the current record's "decision_id" value
 * @method Decision    getDecision()    Returns the current record's "Decision" value
 * @method Tag         getTag()         Returns the current record's "Tag" value
 * @method TagDecision setTagId()       Sets the current record's "tag_id" value
 * @method TagDecision setDecisionId()  Sets the current record's "decision_id" value
 * @method TagDecision setDecision()    Sets the current record's "Decision" value
 * @method TagDecision setTag()         Sets the current record's "Tag" value
 * 
 * @package    dmp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTagDecision extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tag_decision');
        $this->hasColumn('tag_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('decision_id', 'integer', null, array(
             'type' => 'integer',
             ));

        $this->option('symfony', array(
             'filter' => true,
             'form' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Decision', array(
             'local' => 'decision_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Tag', array(
             'local' => 'tag_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}
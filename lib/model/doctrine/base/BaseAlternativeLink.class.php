<?php

/**
 * BaseAlternativeLink
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $link
 * @property integer $alternative_id
 * @property Alternative $Alternative
 * 
 * @method string          getLink()           Returns the current record's "link" value
 * @method integer         getAlternativeId()  Returns the current record's "alternative_id" value
 * @method Alternative     getAlternative()    Returns the current record's "Alternative" value
 * @method AlternativeLink setLink()           Sets the current record's "link" value
 * @method AlternativeLink setAlternativeId()  Sets the current record's "alternative_id" value
 * @method AlternativeLink setAlternative()    Sets the current record's "Alternative" value
 * 
 * @package    dmp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAlternativeLink extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('alternative_link');
        $this->hasColumn('link', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
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
        $this->hasOne('Alternative', array(
             'local' => 'alternative_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}
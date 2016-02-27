<?php

/**
 * BaseResponse
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $decision_id
 * @property string $ip_address
 * @property integer $role_id
 * @property integer $user_id
 * @property string $email_address
 * @property Role $Role
 * @property sfGuardUser $User
 * @property Decision $Decision
 * @property Doctrine_Collection $CriterionPrioritization
 * @property Doctrine_Collection $AlternativeMeasurement
 * 
 * @method integer             getDecisionId()              Returns the current record's "decision_id" value
 * @method string              getIpAddress()               Returns the current record's "ip_address" value
 * @method integer             getRoleId()                  Returns the current record's "role_id" value
 * @method integer             getUserId()                  Returns the current record's "user_id" value
 * @method string              getEmailAddress()            Returns the current record's "email_address" value
 * @method Role                getRole()                    Returns the current record's "Role" value
 * @method sfGuardUser         getUser()                    Returns the current record's "User" value
 * @method Decision            getDecision()                Returns the current record's "Decision" value
 * @method Doctrine_Collection getCriterionPrioritization() Returns the current record's "CriterionPrioritization" collection
 * @method Doctrine_Collection getAlternativeMeasurement()  Returns the current record's "AlternativeMeasurement" collection
 * @method Response            setDecisionId()              Sets the current record's "decision_id" value
 * @method Response            setIpAddress()               Sets the current record's "ip_address" value
 * @method Response            setRoleId()                  Sets the current record's "role_id" value
 * @method Response            setUserId()                  Sets the current record's "user_id" value
 * @method Response            setEmailAddress()            Sets the current record's "email_address" value
 * @method Response            setRole()                    Sets the current record's "Role" value
 * @method Response            setUser()                    Sets the current record's "User" value
 * @method Response            setDecision()                Sets the current record's "Decision" value
 * @method Response            setCriterionPrioritization() Sets the current record's "CriterionPrioritization" collection
 * @method Response            setAlternativeMeasurement()  Sets the current record's "AlternativeMeasurement" collection
 * 
 * @package    dmp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseResponse extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('response');
        $this->hasColumn('decision_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('ip_address', 'string', 16, array(
             'type' => 'string',
             'length' => 16,
             ));
        $this->hasColumn('role_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('email_address', 'string', 255, array(
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
        $this->hasOne('Role', array(
             'local' => 'role_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Decision', array(
             'local' => 'decision_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('CriterionPrioritization', array(
             'local' => 'id',
             'foreign' => 'response_id'));

        $this->hasMany('AlternativeMeasurement', array(
             'local' => 'id',
             'foreign' => 'response_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             'created' => 
             array(
              'name' => 'created_at',
              'type' => 'timestamp',
              'format' => 'Y-m-d H:i:s',
             ),
             'updated' => 
             array(
              'name' => 'updated_at',
              'type' => 'timestamp',
              'format' => 'Y-m-d H:i:s',
             ),
             ));
        $this->actAs($timestampable0);
    }
}
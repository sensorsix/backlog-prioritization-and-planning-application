<?php

/**
 * BasePaymentTransaction
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property string $refnumber
 * @property string $status_code
 * @property boolean $is_payed
 * @property datetime $date_payed
 * @property string $stamp
 * @property float $amount
 * @property enum $type
 * @property sfGuardUser $User
 * 
 * @method integer            getUserId()      Returns the current record's "user_id" value
 * @method string             getRefnumber()   Returns the current record's "refnumber" value
 * @method string             getStatusCode()  Returns the current record's "status_code" value
 * @method boolean            getIsPayed()     Returns the current record's "is_payed" value
 * @method datetime           getDatePayed()   Returns the current record's "date_payed" value
 * @method string             getStamp()       Returns the current record's "stamp" value
 * @method float              getAmount()      Returns the current record's "amount" value
 * @method enum               getType()        Returns the current record's "type" value
 * @method sfGuardUser        getUser()        Returns the current record's "User" value
 * @method PaymentTransaction setUserId()      Sets the current record's "user_id" value
 * @method PaymentTransaction setRefnumber()   Sets the current record's "refnumber" value
 * @method PaymentTransaction setStatusCode()  Sets the current record's "status_code" value
 * @method PaymentTransaction setIsPayed()     Sets the current record's "is_payed" value
 * @method PaymentTransaction setDatePayed()   Sets the current record's "date_payed" value
 * @method PaymentTransaction setStamp()       Sets the current record's "stamp" value
 * @method PaymentTransaction setAmount()      Sets the current record's "amount" value
 * @method PaymentTransaction setType()        Sets the current record's "type" value
 * @method PaymentTransaction setUser()        Sets the current record's "User" value
 * 
 * @package    dmp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePaymentTransaction extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('payment_transaction');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('refnumber', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('status_code', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('is_payed', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('date_payed', 'datetime', null, array(
             'type' => 'datetime',
             ));
        $this->hasColumn('stamp', 'string', 20, array(
             'type' => 'string',
             'length' => 20,
             ));
        $this->hasColumn('amount', 'float', null, array(
             'type' => 'float',
             'default' => 0,
             ));
        $this->hasColumn('type', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'basic',
              1 => 'pro',
              2 => 'enterprise',
             ),
             ));

        $this->option('symfony', array(
             'filter' => false,
             'form' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

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
<?php

/**
 * sfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    dmp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class sfGuardUser extends PluginsfGuardUser
{
  /**
   * Returns the string representation of the object: "Full Name (username)"
   *
   * @return string
   */
  public function __toString()
  {
    $name = $this->getName();
    if ($name)
    {
      return (string) $name . ' (' . $this->username . ')';
    }
    else
    {
      if ($this->username)
      {
        return $this->username;
      }
      else
      {
        return $this->email_address;
      }
    }
  }

  public function preDelete($event)
  {
    foreach ($this->Decisions as $decision)
    {
      /** @var Decision $decision */
      $decision->delete();
    }
  }

  public function postInsert($event)
  {
    $types = DecisionTypeTable::getInstance()->findAll();

    foreach ($types as $type)
    {
      $userType = new UserDecisionType();
      $userType->Type = $type;
      $userType->User = $this;
      $userType->save();
    }

  }

  /**
   * @return Token
   */
  public function generateToken()
  {
    $token_key = md5(uniqid());
    while (Doctrine::getTable('Token')->findOneBy('token_key', $token_key))
    {
      $token_key = md5(uniqid());
    }

    $token = new Token();
    $token->token_key = $token_key;
    $token->User = $this;
    $token->status = Token::STATUS_ACCESS;
    $token->o_auth_version = 2;

    return $token;
  }

  public function getLastNotPayedTransaction($type)
  {
    $payment = Doctrine_Query::create()
      ->from('PaymentTransaction')
      ->where('user_id = ? AND type = ?', array($this->id, '"' . $type . '"'))
      ->andWhere('is_payed = ?', false)
      ->andWhere('date_payed IS NULL')
      ->orderBy('id DESC')
      ->fetchOne();

    if (!$payment)
    {
      $payment = new PaymentTransaction();
      $payment->user_id = $this->id;
      $payment->type = $type;
      $payment->save();
    }

    $price_list = PaymentTransaction::getPriceList();
    $payment->amount = $price_list[$type];

    return $payment;
  }

  public function getActiveTransaction($type)
  {
    $payment = Doctrine_Query::create()
      ->from('PaymentTransaction')
      ->where('user_id = ? AND type = ?', array($this->id, '"' . $type . '"'))
      ->andWhere('is_payed = ?', true)
      ->fetchOne();

    return $payment;
  }

  public function isExpired()
  {
    $lastPaymentDate = new DateTime($this->last_payment_date);
    $interval = $lastPaymentDate->diff(new DateTime());
    return $interval->y > 0;
  }

  /**
   * @return string
   */
  public function getLastToken()
  {
    return $this->Tokens->getLast()->token_key;
  }

  public function hasAPIAccess()
  {
    return $this->is_super_admin || in_array($this->account_type, array('Trial', 'Enterprise'));
  }
}

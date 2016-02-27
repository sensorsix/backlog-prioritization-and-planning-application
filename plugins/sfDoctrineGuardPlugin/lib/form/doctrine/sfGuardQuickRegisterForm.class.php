<?php
 
class sfGuardQuickRegisterForm extends BasesfGuardRegisterForm
{
  public function configure()
  {
    $this->validatorSchema['email_address'] = new sfValidatorEmail();
    $this->validatorSchema['email_address']->setMessage('required', 'Email is required');
    $this->validatorSchema['email_address']->setMessage('invalid', 'Invalid');
    $this->validatorSchema['password']->setMessage('required', 'Password is required');
    $this->validatorSchema['password']->setMessage('invalid', 'Invalid');

    $this->validatorSchema->setPostValidator(new sfValidatorCallBack(array('callback' => array($this, 'postValidateForm'))));

    $this->useFields(
      array(
        'email_address',
        'password',
      )
    );
  }

  public function postValidateForm($validator, $values)
  {
    /** @var sfGuardUser $user */
    $user = sfGuardUserTable::getInstance()
      ->createQuery('u')
      ->where('u.email_address = ?', $values['email_address'])
      ->fetchOne();

    if ($user && $values['password'])
    {
      if ($user->getIsActive() && $user->checkPassword($values['password']))
      {
        sfContext::getInstance()->getUser()->signIn($user);
        sfContext::getInstance()->getController()->redirect('/project');
      }
      else
      {
        throw new sfValidatorError($validator, 'The email and/or password is invalid');
      }
    }

    $email = $values['email_address'];
    $domain = strtolower(substr($email, strpos($email, '@') + 1));

    if (DomainTable::getInstance()->findOneBy('name', $domain))
    {
      $error = new sfValidatorError($validator, 'That looks like a personal email address. Please use your company email.');
      throw new sfValidatorErrorSchema($validator, array( 'email_address' => $error ));
    }

    return $values;
  }

  public function processValues($values)
  {
    if (isset($values['is_admin']) && $values['is_admin'])
    {
      $this->object->link('Permissions', array(sfGuardPermission::ADMINISTRATION));
    }
    else
    {
      $this->object->unlink('Permissions', array(sfGuardPermission::ADMINISTRATION));
    }

    $values['username'] = $values['email_address'];

    $this->object->wizard = true;
    $this->object->link('Permissions', array(sfGuardPermission::DECISION_MANAGEMENT));

    return $values;
  }
}
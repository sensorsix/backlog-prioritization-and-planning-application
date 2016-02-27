<?php

/**
 * TypeTemplate
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    dmp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TypeTemplate extends BaseTypeTemplate
{
  /**
   * Returns an instance of this class.
   *
   * @return TypeTemplateTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('TypeTemplate');
  }

  public function getRowData()
  {
    $routing = sfContext::getInstance()->getRouting();
    return array(
      'id'  => $this->id,
      'name' => $this->name,
      'type' => $this->Type->name,
      'user_id' => $this->user_id,
      'fetch_url' => $routing->generate('user_profile\templateFetch', array('id' => $this->id)),
      'edit_url' => $routing->generate('user_profile\templateEdit', array('id' => $this->id)),
      'delete_url' => $routing->generate('user_profile\templateDelete')
    );
  }
}
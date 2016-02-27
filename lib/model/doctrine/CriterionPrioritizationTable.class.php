<?php

/**
 * criteriaPrioritizationTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CriterionPrioritizationTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return CriterionPrioritizationTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('CriterionPrioritization');
  }

  /**
   * @param $response_id
   * @param $head_id
   * @return mixed
   */
  public function getOneForSave($response_id, $head_id)
  {
    return $this->createQuery('cp')
        ->andWhere('cp.criterion_head_id = ? AND cp.response_id = ?', array($head_id, $response_id))
        ->fetchOne();
  }
}
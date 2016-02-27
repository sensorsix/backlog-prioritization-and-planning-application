<?php

/**
 * RoleTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class RoleTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return RoleTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Role');
  }
  
  /**
   * @param int $decision_id
   * @return Doctrine_Collection
   */
  public function getList($decision_id)
  {
    return Doctrine_Query::create()->from('Role r')
        ->select('r.id, r.name, 0 AS level')
        ->andWhere('r.decision_id = ?', $decision_id)
        ->execute();
  }

  public function getForUserJSON(sfGuardUser $user, $decision_id)
  {
    $roles = $this->createQuery('r')
      ->leftJoin('r.Decision d')
      ->leftJoin('d.User u')
      ->leftJoin('u.TeamMember tm')
      ->whereIn('d.user_id', sfGuardUserTable::getInstance()->getUsersInTeamIDs($user))
      ->andWhere('r.decision_id = ? AND (r.dashboard IS NULL OR r.dashboard = 0)', $decision_id)
      ->execute();

    $result = array();
    foreach ($roles as $role) {
      $result[] = $role->getRowData();
    }

    return json_encode($result);
  }

  public function getListForAPI(sfGuardUser $user, $decision_id)
  {
    /** @var Role[] $roles */
    $roles = $this->createQuery('r')
      ->leftJoin('r.Decision d')
      ->leftJoin('d.User u')
      ->leftJoin('u.TeamMember tm')
      ->whereIn('d.user_id', sfGuardUserTable::getInstance()->getUsersInTeamIDs($user))
      ->andWhere('r.decision_id = ?', $decision_id)
      ->execute();

    $result = array();
    foreach ($roles as $role) {
      $result[] = $role->getAPIData();
    }

    return $result;
  }

  /**
   * @param sfGuardUser $user
   * @param $id
   * @return Role
   */
  public function getOneForUser(sfGuardUser $user, $id)
  {
    return $this->createQuery('r')
      ->leftJoin('r.Decision d')
      ->leftJoin('d.User u')
      ->leftJoin('u.TeamMember tm')
      ->whereIn('d.user_id', sfGuardUserTable::getInstance()->getUsersInTeamIDs($user))
      ->andWhere('r.id = ?', $id)
      ->fetchOne();
  }
}
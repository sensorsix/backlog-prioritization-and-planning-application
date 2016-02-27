<?php

/**
 * DecisionTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class DecisionTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return DecisionTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Decision');
  }

  /**
   * @param sfGuardUser $user
   * @param $decision_id
   * @return Decision
   */
  public function getDecisionForUser(sfGuardUser $user, $decision_id)
  {
    return $this->createQuery('d')
      ->leftJoin('d.User u')
      ->leftJoin('u.TeamMember tm')
      ->whereIn('d.user_id', sfGuardUserTable::getInstance()->getUsersInTeamIDs($user))
      ->andWhere('d.id = ?', $decision_id)
      ->fetchOne();
  }

  /**
   * @param sfGuardUser $user
   * @param bool $in_folder
   * @return Decision[]
   */
  public function getForUser(sfGuardUser $user, $in_folder = false)
  {
    /** @var Decision[] $decisions */
    $result = $this->createQuery('d')
      ->leftJoin('d.User u')
      ->leftJoin('u.TeamMember tm')
      ->whereIn('d.user_id', sfGuardUserTable::getInstance()->getUsersInTeamIDs($user));

    if (!$in_folder){
      $result->andWhere('d.folder_id IS NULL');
    }

    return $result->execute();
  }

  public function getForUserJSON(sfGuardUser $user)
  {
    /** @var Decision[] $decisions */
    $decisions = $this->createQuery('d')
      ->leftJoin('d.User u')
      ->leftJoin('u.TeamMember tm')
      ->whereIn('d.user_id', sfGuardUserTable::getInstance()->getUsersInTeamIDs($user))
      ->andWhere('d.folder_id IS NULL')
      ->execute();

    $result = array();
    foreach ($decisions as $decision) {
      $result[] = $decision->getRowData();
    }

    return json_encode($result);
  }

  /**
   * @param sfGuardUser $user
   * @return array
   */
  public function getListForAPI(sfGuardUser $user)
  {
    /** @var Decision[] $decisions */
    $decisions = $this->createQuery('d')
      ->leftJoin('d.User u')
      ->leftJoin('u.TeamMember tm')
      ->whereIn('d.user_id', sfGuardUserTable::getInstance()->getUsersInTeamIDs($user))
      ->andWhere('d.folder_id IS NULL')
      ->execute();

    $result = array();
    foreach ($decisions as $decision) {
      $result[] = $decision->getAPIData();
    }

    return $result;
  }

  /**
   * @param $user_id
   * @param $name
   * @param $decision_id
   * @return bool
   */
  public function verifyAvailableNameByUserId($user_id, $name, $decision_id){
    return $this->verifyAvailableName( sfGuardUserTable::getInstance()->find($user_id) , $name, $decision_id);
  }

  /**
   * @param sfGuardUser $user
   * @param $name
   * @param $decision_id
   * @return bool
   */
  public function verifyAvailableName($user, $name, $decision_id = 0){
    $decisions = $this->createQuery('d')
      ->leftJoin('d.User u')
      ->leftJoin('u.TeamMember tm')
      ->whereIn('d.user_id', sfGuardUserTable::getInstance()->getUsersInTeamIDs($user))
      ->andWhere('d.name = ?', $name)
      ->andWhere('d.id != ?', $decision_id)
      ->count();

    return !(bool)$decisions;
  }
}
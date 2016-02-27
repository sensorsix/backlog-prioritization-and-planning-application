<?php

/**
 * CommentTable
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CommentTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return CommentTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Comment');
  }

  /**
   * @param $decision_id
   * @return Doctrine_Collection|Comment[]
   */
  public function getList($decision_id)
  {
     return $this->createQuery('c')
       ->leftJoin('c.Criterion cr')
       ->leftJoin('c.Alternative a')
       ->leftJoin('c.User u')
       ->where('c.decision_id = ?', $decision_id)
       ->execute();
  }

  public function getArrayForAlternatives($criterion_id, $alternatives, Role $role)
  {
    $alternatives = array_merge(array(0), $alternatives);

    $query = $this->createQuery('c')
       ->leftJoin('c.Criterion cr')
       ->leftJoin('c.Alternative a')
       ->leftJoin('c.User u')
       ->whereIn('c.alternative_id', $alternatives)
       ->andWhere('c.criterion_id = ?', $criterion_id);

    if (!$role->show_comments) {
      $user = sfContext::getInstance()->getUser();
      if ($user->isAuthenticated()) {
        $query->andWhere('c.user_id = ?', $user->getGuardUser()->id);
      } else {
        $query->andWhere('c.email = ?', $user->getAttribute('email_address', null, 'measurement/email/' . $role->id));
      }
    }

    /** @var Comment[] $comments */
    $comments = $query->execute();

    $result = array();
    foreach($comments as $comment) {
      $result[$comment->alternative_id][] = $comment;
    }

    return $result;
  }

  public function getArrayByCriteria($criteria)
  {
    $criteria = array_merge(array(0), $criteria);
    $comments = $this->createQuery('c')
      ->leftJoin('c.Criterion cr')
      ->whereIn('c.criterion_id', $criteria)
      ->andWhere('c.alternative_id IS NULL')
      ->execute();

    $result = array();
    foreach($comments as $comment) {
      $result[$comment->criterion_id][] = $comment;
    }

    return $result;
  }
}
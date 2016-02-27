<?php

/**
 * Criterion
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    dmp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Criterion extends BaseCriterion
{
  public function preSave($event)
  {
    if (array_key_exists('variable_type', $this->getModified()) && !$this->isNew()) {
      $this->addPrioritizationRecords();
    }
  }

  public function postInsert($event)
  {
    $this->addPrioritizationRecords();
  }

  public function addPrioritizationRecords()
  {
    $roles = Doctrine::getTable('Role')->findByPrioritizeAndDecisionId(1, $this->decision_id);
    // Add to PannedCriterionPrioritization
    if ($this->variable_type == 'Benefit') {
      foreach ($roles as $role) {
        $plannedCriterionPrioritization = new PlannedCriterionPrioritization();
        $plannedCriterionPrioritization->role_id = $role->id;
        $plannedCriterionPrioritization->criterion_id = $this->id;
        $plannedCriterionPrioritization->save();
      }
    } else {
      foreach ($roles as $role) {
        $record = Doctrine::getTable('PlannedCriterionPrioritization')->findOneByRoleIdAndCriterionId($role->id, $this->id);
        if ($record) {
          $record->delete();
        }
      }
    }
  }

  public function postSave($event)
  {
    if (!$this->getNode()->isValidNode()) {
      $treeObject = $this->getTable()->getTree();
      $treeObject->createRoot($this);
    }
  }

  public function getTooltip()
  {
    return $this->description;
  }

  public function getAPIData()
  {
    return array(
      'id'          => $this->id,
      'name'        => $this->name,
      'description' => $this->description,
      'type'        => $this->variable_type,
      'measure'     => $this->measurement
    );
  }

  public function getRowData()
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers('Escaping');
    $routing = sfContext::getInstance()->getRouting();

    $measure = array('direct rating' => 'Direct Measure', 'direct float' => 'Direct (float)');
    $measure = array_merge($measure, sfConfig::get('app_rating_method'));
    $measure = array_merge($measure, array('comment' => 'Comment'));

    return array(
      '_element_type' => 'criterion',
      'id'            => $this->id,
      'name'          => $this->name,
      'description'   => esc_raw($this->description),
      'type'          => $this->variable_type,
      'measure'       => $measure[$this->measurement],
      'fetch_url'     => $routing->generate('criterion\fetch', array('id' => $this->id)),
      'edit_url'      => $routing->generate('criterion\edit', array('id' => $this->id)),
      'delete_url'    => $routing->generate('criterion\delete')
    );
  }
}

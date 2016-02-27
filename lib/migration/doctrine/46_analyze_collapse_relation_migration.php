<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AnalyzeCollapseRelationMigration extends Doctrine_Migration_Base
{
  public function up()
  {
    $this->createForeignKey(
      'analyze_collapse',
      'analyze_collapse_decision_id_decision_id',
      array(
        'name'         => 'analyze_collapse_decision_id_decision_id',
        'local'        => 'decision_id',
        'foreign'      => 'id',
        'foreignTable' => 'decision',
        'onUpdate'     => '',
        'onDelete'     => 'CASCADE',
      )
    );
    $this->addIndex(
      'analyze_collapse',
      'decision_id',
      array(
        'fields' =>
          array(
            0 => 'decision_id',
          ),
      )
    );
  }

  public function postUp()
  {
    foreach (DecisionTable::getInstance()->findAll() as $decision)
    {
      $analyzeCollapse = new AnalyzeCollapse();
      $analyzeCollapse->Decision = $decision;
      $analyzeCollapse->save();
    }
  }

  public function down()
  {
    $this->dropForeignKey('analyze_collapse', 'analyze_collapse_decision_id_decision_id');
    $this->removeIndex(
      'analyze_collapse',
      'decision_id',
      array(
        'fields' =>
          array(
            0 => 'decision_id',
          ),
      )
    );
  }
}
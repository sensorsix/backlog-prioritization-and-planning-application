<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class RoadmapAddRelation extends Doctrine_Migration_Base
{
    public function up()
    {
      $this->createForeignKey('roadmap', 'roadmap_user_id_to_sf_guard_user_id',
        array(
          'name'         => 'roadmap_user_id_to_sf_guard_user_id',
          'local'        => 'user_id',
          'foreign'      => 'id',
          'foreignTable' => 'sf_guard_user',
          'onUpdate'     => 'CASCADE',
          'onDelete'     => 'CASCADE',
        )
      );

      $this->createForeignKey('roadmap', 'roadmap_folder_id_to_folder_id',
        array(
          'name'         => 'roadmap_folder_id_to_folder_id',
          'local'        => 'folder_id',
          'foreign'      => 'id',
          'foreignTable' => 'folder',
          'onUpdate'     => 'CASCADE',
          'onDelete'     => 'SET NULL',
        )
      );

      $this->createForeignKey('roadmap_decision', 'roadmap_decision_roadmap_id_to_roadmap_id',
        array(
          'name'         => 'roadmap_decision_roadmap_id_to_roadmap_id',
          'local'        => 'roadmap_id',
          'foreign'      => 'id',
          'foreignTable' => 'roadmap',
          'onUpdate'     => 'CASCADE',
          'onDelete'     => 'CASCADE',
        )
      );

      $this->createForeignKey('roadmap_decision', 'roadmap_decision_roadmap_id_to_decision_id',
        array(
          'name'         => 'roadmap_decision_roadmap_id_to_decision_id',
          'local'        => 'decision_id',
          'foreign'      => 'id',
          'foreignTable' => 'decision',
          'onUpdate'     => 'CASCADE',
          'onDelete'     => 'CASCADE',
        )
      );
    }

    public function down()
    {
      $this->dropForeignKey('roadmap', 'roadmap_user_id_to_sf_guard_user_id');
      $this->dropForeignKey('roadmap', 'roadmap_folder_id_to_folder_id');
      $this->dropForeignKey('roadmap_decision', 'roadmap_decision_roadmap_id_to_roadmap_id');
      $this->dropForeignKey('roadmap_decision', 'roadmap_decision_roadmap_id_to_decision_id');
    }
}
<?php

/**
 * WallPost
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    dmp
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class WallPost extends BaseWallPost
{
  public function getFile()
  {
    return $this->getFileDir() . '/' .  'graph-' . $this->id . '.png';
  }

  public function getFileDir()
  {
    return sfConfig::get('sf_upload_dir') . '/charts';
  }

  public function postDelete($event)
  {
    $this->removeFile();
  }

  public function getRelativeFilePath()
  {
    return '/uploads/charts/' .  'graph-' . $this->id . '.png';
  }

  public function removeFile()
  {
    if ($this->getFile() && file_exists($this->getFile())) {
      unlink($this->getFile());
    }
  }
}

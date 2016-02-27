<?php
/**
 * @var sfWebResponse $sf_response
 */

$sf_response->setTitle('Members');
$sf_response->setSlot('disable_menu', true);
?>

<div class="row">

  <div class="col-md-3">
    <?php include_partial("tabs"); ?>
  </div>

  <div class="col-md-5">
    <h1 class="title"><?php echo __('Members') ?></h1>
    <br clear="all">

    <?php include_partial('user_profile/member_form', array('form' => $form)) ?>
  </div>
</div>
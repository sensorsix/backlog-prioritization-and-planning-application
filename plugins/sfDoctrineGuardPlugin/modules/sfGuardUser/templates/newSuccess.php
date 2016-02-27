<?php use_helper('I18N', 'Date') ?>

<?php $sf_response->setSlot('menu_users_active', true) ?>
<?php include_partial('global/menu') ?>

<h1 class="title"><?php echo __('New User', array(), 'messages') ?></h1>

<?php include_partial('sfGuardUser/flashes') ?>

<div id="sf_admin_header">
  <?php include_partial('sfGuardUser/form_header', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
</div>

<div id="sf_admin_content">
  <?php include_partial('sfGuardUser/form', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
</div>

<div id="sf_admin_footer">
  <?php include_partial('sfGuardUser/form_footer', array('sf_guard_user' => $sf_guard_user, 'form' => $form, 'configuration' => $configuration)) ?>
</div>
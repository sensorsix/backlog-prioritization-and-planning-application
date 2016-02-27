<?php if ($field->isPartial()): ?>
<?php include_partial('domain/'.$name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
<?php include_component('domain', $name, array('type' => 'filter', 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>

  <?php echo $form[$name]->renderLabel($label,array('class' => 'control-label')) ?>

  <?php echo $form[$name]->renderError() ?>

  <?php echo $form[$name]->render(array('class' => 'form-control'))//$attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>

  <?php if ($help || $help = $form[$name]->renderHelp()): ?>
    <div class="help"><?php echo __($help, array(), 'messages') ?></div>
  <?php endif; ?>

<?php endif; ?>

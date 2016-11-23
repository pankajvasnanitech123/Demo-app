<!-- src/Template/Users/edit.ctp -->
<?php use Cake\Core\Configure;
	  $userTypes	=	Configure::read('user_types');
?>
<div class="users form">
<?= $this->Form->create($model) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?= $this->Form->input($model.'.name') ?>
        <?= $this->Form->input($model.'.password') ?>
        <?= $this->Form->input($model.'.role', [
            'options' => $userTypes,
			'empty'	  => 'Select User Role'
        ]) ?>
   </fieldset>
<?= $this->Form->button(__('Submit')); ?>
<?= $this->Form->end() ?>
</div>

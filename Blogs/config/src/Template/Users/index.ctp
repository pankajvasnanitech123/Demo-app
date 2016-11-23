<!-- File: src/Template/Articles/index.ctp -->

<h1>Users</h1>
<a href="<?php echo $this->Url->build(["action" => "logout"]); ?>"><?= $this->Form->button(__('Logout'),array('style'=>'float:right;')) ?></a>
<a href="<?php echo $this->Url->build(["action" => "add"]); ?>"><?= $this->Form->button(__('Add New User'),array('style'=>'float:right;')) ?></a>
<table>
    <tr>
        <th>Name</th>
        <th>Role</th>
		<th>Action</th>
    </tr>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td>
            <?= $this->Html->link($user->name, ['action' => 'view', $user->id]) ?>
        </td>
        <td>
            <?php 
			if($user->role == USER){
				echo __('User',true);
			}
			if($user->role	==	AUTHOR){
				echo __('Author',true);
			}
			
			
			?>
        </td>
		<td>
            <?= $this->Html->link(__('Edit /',true), ['action' => 'edit', $user->id]) ?>
			<?= $this->Html->link(__('View /',true), ['action' => 'view', $user->id]) ?>
			<?= $this->Html->link(__('Delete',true), ['action' => 'delete', $user->id]) ?>
		</td>
    </tr>
    <?php endforeach; ?>
</table>

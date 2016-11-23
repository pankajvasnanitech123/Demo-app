<!-- File: src/Template/Articles/view.ctp -->
<a href="<?php echo $this->Url->build(["action" => "index"]); ?>"><?= $this->Form->button(__('Back To Listing'),array('style'=>'float:right;')) ?></a>
<h1><?= h($user->name) ?></h1>
<p><?= h($user->role) ?></p>
<p><small><?= __('Created',true) ?> <?= $user->created->format(DATE_RFC850) ?></small></p>

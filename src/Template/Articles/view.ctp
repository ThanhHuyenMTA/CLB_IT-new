 <?= $this->Html->css('bootstrap.css'); ?>
<style>
    input, textarea, .uneditable-input {
	    margin-left: 0;
	    width: 900px;
	    min-height:45px;
	    padding-left:25px;
	}
	.sumb{
	    margin-left:850px;
	    color:blue;
	    font-weight: bold;
	}
	[class^="icon-"], [class*=" icon-"] {
    	width: 22px;
    	height: 20px;
    }
	
</style>
<h1><?= h($viewAr->name) ?></h1>
<div><?= h($viewAr ->content) ?></div>
<div><?= h($viewAr ->posted) ?></div>
<div><?= h($viewAr ->views) ?></div>
<span class="icon-user"> </span>
</br>
  <?=  $this->Element('../articles/elelikes'); ?>    
  <?=  $this->Element('../articles/eledislikes'); ?>    
<div>
  <?=  $this->Element('../comments/addcomment'); ?>    
</div>
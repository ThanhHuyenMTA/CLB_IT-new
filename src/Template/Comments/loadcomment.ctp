<?php foreach ($comments as $value): ?>
	<div style="border: 1px solid  #b1b1bd; margin-top: 5px;padding-left: 5px;">
	    <span class="icon-user"></span>
	    <span style="color: blue;"><?=h($value->user->username)?></span>	<br>
		<span style="margin-left: 65px;"><?=html_entity_decode($value->content)?></span> <br>
		<span  style="margin-left: 65px;">.....<?=h($value->created)?>.....</span>
	</div>
<?php endforeach; ?>
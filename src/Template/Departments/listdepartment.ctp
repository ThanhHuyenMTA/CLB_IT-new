	<?php foreach ($menus as $totl): ?>
	    <li><?= $this->Html->link($totl->name, ['action' => '../Articles/listarticles',$totl->id]) ?><?li>
	<?php endforeach; ?>
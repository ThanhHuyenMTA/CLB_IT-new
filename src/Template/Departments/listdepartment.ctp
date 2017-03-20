	<?php foreach ($department as $value): ?>
	    <li><?= $this->Html->link($value->name, ['action' => '../Articles/listarticle',$value->id]) ?><?li>
	<?php endforeach; ?>
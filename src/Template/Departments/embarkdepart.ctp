<?php if ($loggedIn && $userEmbark): ?>
<div class="dropdown" style="width:150px;">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Đã tham gia
            <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li>
                 <?= $this->Form->postLink(
                        'Rời khỏi ban',
                        ['action' => '../Departments/delete'],
                        ['confirm' => 'Are you sure?'])
                 ?>
            </li>   
        </ul> 
    </div>
<?php endif; ?>
<?php if ($loggedIn && !$userEmbark): ?>
    <div class="widget wid-follow">
        <ul class="list-inline">
            <li>
                <?= $this->Form->create('', ['url' => ['action' => '../Departments/embarkdepart']]); ?>
                <button class="box-facebook" type="submit" name="Submit" >
                    <span class="fa fa-calendar-minus-o fa-2x icon"></span>
                    <span>Tham gia ban</span>
                </button>
                <?= $this->Form->end(); ?>
            </li>
        </ul>  
    </div>
<?php endif; ?>


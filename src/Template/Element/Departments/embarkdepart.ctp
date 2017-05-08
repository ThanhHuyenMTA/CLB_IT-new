
<div class="content">
    <?php if ($loggedIn && $userEmbark): ?>
        <div class="heading"><h4>Welcome to US </h4></div>
        <div class="dropdown" style="width:150px;">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Joined
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li>
                    <?=
                    $this->Form->postLink(
                            'Leave Departments', ['action' => '../Departments/delete'], ['confirm' => 'Are you sure?'])
                    ?>
                </li>   
            </ul> 
        </div>
    <?php endif; ?>
    <?php if ($loggedIn && !$userEmbark && !$userEmbark0): ?>
        <div class="heading"><h4>Welcome to US </h4></div>
        <div class="widget wid-follow">
            <ul class="list-inline">
                <li class="changei">
                    <?= $this->Form->create('', ['url' => ['action' => '../Departments/embarkdepart']]); ?>
                    <button class="box-facebook" type="submit" name="Submit" >
                        <span class="fa fa-calendar-minus-o fa-2x icon"></span>
                        <span style="font-size: 13px;">Join Departments</span>
                    </button>
                    <?= $this->Form->end(); ?>
                </li>
            </ul>  
        </div>
    <?php endif; ?>
    <?php if ($loggedIn && $userEmbark0): ?>
        <div class="heading"><h4>Welcome to US </h4></div>
        <div class="dropdown" style="width:150px;">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Request Sent
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                <li>
                    <?=
                    $this->Form->postLink(
                            'Cancel Request', ['action' => '../Departments/delete'], ['confirm' => 'Are you sure?'])
                    ?>
                </li>   
            </ul> 
        </div>
    <?php endif; ?>
</div>


<?= $this->Html->css('admin.css'); ?>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href=".."><i class="fa fa-home"></i></a>
            <a class="navbar-brand" href="#">Hello Admin </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-envelope fa-fw"></i> 
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-tasks fa-fw"></i>
                    </div>
                </a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#">
                    <div>
                        <i class="fa fa-upload fa-fw"></i> 
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="TabAdmin">
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Division')">Division of rights</button>
        <button class="tablinks" onclick="openCity(event, 'Article')">Article</button>
        <button class="tablinks" onclick="openCity(event, 'User')">User</button>
        <button class="tablinks" onclick="openCity(event, 'Add')">Add Department</button>
        <button class="tablinks" onclick="openCity(event, 'Feedback')">Feedback</button>
    </div>
    <div  class="tabcontent">
        <?php echo 'Hello! '; ?>
    </div>

    <div id="Division" class="tabcontent">
        <?= $this->Element('../Admins/checkmember') ?>
    </div>

    <div id="Article" class="tabcontent">
        <?= $this->Element('../Admins/articleview') ?>
    </div>

    <div id="User" class="tabcontent">
        <?= $this->Element('../Admins/userview') ?>
    </div>

    <div id="Add" class="tabcontent">
        <?= $this->Element('../Admins/AddDepartment') ?>
    </div>
    <div id="Feedback" class="tabcontent">

    </div>
</div>

<div id='top_image'>
    <a href='javascript:scroll(0,0)' class="fa fa-arrow-up"/></a><br/>
</div>
<div id="bottom_image">
    <a href='javascript:scroll(0,9999999)'class="fa fa-arrow-down"/></a>
</div>

<!--script-->
<script type="text/javascript">
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }

// Get the element with id="defaultOpen" and click on it
    // document.getElementById("defaultOpen").click();
</script>
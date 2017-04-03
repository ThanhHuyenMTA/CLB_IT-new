<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<?php echo $this->Html->css('gmail.css'); ?>
<style>
    .featured{
        display: none;
    }
</style>

<div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Compose')" id="defaultOpen">Compose</button>
    <button class="tablinks" onclick="openCity(event, 'Inbox')" id="defaultOpen"> Inbox</button>
    <button class="tablinks" onclick="openCity(event, 'SentMail')"id="defaultOpen" >SentMail</button>
</div>
<div id="Compose" class="tabcontent">
    <?=$this->Element('../letters/compose');?>
</div>
<div id="Inbox" class="tabcontent">
    <?=$this->Element('../letters/inbox');?>
</div>
<div id="SentMail" class="tabcontent">
   <?=$this->Element('../letters/sentmail');?>
</div>
 <div id="Viewmail" class="tabcontent">
       <?= $this->Element('../letters/view'); ?>
</div>
<script>
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
    document.getElementById("defaultOpen").click();
</script>

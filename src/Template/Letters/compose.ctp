<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<p class="newletter">New letter</p>

<?= $this->Form->create('Letters',['id'=>'ff'],
        ['url' => ['../letters/compose']]);?>
     <label>                                
        <span>Enter name receiver:</span>
        <input type="email" name="email" id="email" required="" placeholder="To: ">
    </label>
    <label>
        <span>Enter name letter:</span>
        <input type="text"  name="name" id="name" placeholder="Subject" required>
    </label>
    <label>
        <span>Enter content:</span>
        <textarea class="ckeditor" value="" name="content" ></textarea>
    </label>
    <input class="sendemailButton" type="submit" name="Submit" value="Send">
<?=$this->Form->end();?>


<script type=”text/javascript”>
    CKEDITOR.replace('content', {
        language: 'vi',
    });
</script>








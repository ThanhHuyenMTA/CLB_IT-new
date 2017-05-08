<h3>Edit Department </h3>
<div id="cssEdit">
    <?= $this->Form->create($old, array('id' => 'fm_editD')); ?>
    <?= $this->Form->hidden('id'); ?>
    <?= $this->Form->input('name', array('class' => 'name')); ?>
    <?= $this->Form->input('email', ['type' => 'email'], array('class' => 'mail')); ?>
    <?= $this->Form->input('address', array('class' => 'address')); ?>
    <?=
    $this->Form->button('Save', array('type' => 'button',
        'onclick' => 'saveEdit(newname' . $old->id . ',newemail' . $old->id . ',newaddress' . $old->id . ')'));
    ?>
    <?= $this->Form->end(); ?>
</div>

<script type="text/javascript">
    function saveEdit(name, mail, address) {
        $.ajax({
            url: "http://localhost/NewCLB/admins/saveedit",
            type: "POST",
            dataType: "text",
            data: $('#fm_editD').serialize(),
            context: document.body,
            success: function (result) {
                $('#hideD').show();
                $('#editD').hide();
                var data = $.parseJSON(result); //ham chuyen ve dang mang
                $(name).html(data['name']);
                $(mail).html(data['email']);
                $(address).html(data['address']);
                console.log(data);
            }
        });
    }

</script>
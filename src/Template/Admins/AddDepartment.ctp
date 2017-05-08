
<div class="container" id="indexD">
    <br>
    <div class="All1" onclick="selectAll1()" data-toggle="tooltip" data-placement="bottom" title="Select!" >
        <input class="selectAll1" type="checkbox"/>
    </div>
    <div class="AddAll1" id="hideD" onclick="AddD();" data-toggle="tooltip" data-placement="bottom" title="Add!!!">
        <i class="fa fa-plus-square-o"></i>
    </div>
    <div class="AddAll1" id="deleteAll1" onclick="deleteAll1();"data-toggle="tooltip" data-placement="bottom" title="Delete!" >
        <i class="fa fa-trash-o"></i>
    </div>

    <br><br>

    <!--form add-->
    <div id="fm_add">
        <?= $this->Form->create(null, array('id' => 'fm_addD')); ?>
        <?= $this->Form->input('name', array('class' => 'name', 'required' => 'required')); ?>
        <?= $this->Form->input('email', ['type' => 'email'], array('class' => 'mail')); ?>
        <?= $this->Form->input('address', array('class' => 'address')); ?>
        <?= $this->Form->button('Add', array('type' => 'button', 'onclick' => 'AddDepart()')); ?>
        <?= $this->Form->end(); ?>
    </div>

    <!--form edit-->
    <div class="container" id="editD">


    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($department as $value): ?> 
                <tr id="trchecked<?= $value->id ?>">
            <form method="post" id="fm_dep<?= $value->id ?>" class="fm_del">
                <input type="hidden" name="id" value="<?= $value->id ?>"/>
                <td>
                    <input class="checkboxAll" id="checkbox<?= $value->id ?>" type="checkbox" 
                           onclick="checkTrue(<?php echo "trchecked" . $value->id ?>,
                           <?php echo "checkbox" . $value->id ?>)" />
                </td>
                <td id="newname<?= $value->id ?>" class="success"><?= $value->name ?></td>
                <td id="newemail<?= $value->id ?>" ><?= $value->email ?></td>
                <td id="newaddress<?= $value->id ?>" class="danger"><?= $value->address ?></td>
                <td class="fa fa-edit"  id="info<?= $value->id ?>" 
                    onclick="click_depart(<?php echo'fm_dep' . $value->id ?>)" > Edit</td>
            </form>
            </tr>  
        <?php endforeach; ?>

        <tr class="newD">

        </tr> 
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $('#fm_add').hide();
    $('#editD').hide();
    $('#deleteAll1').hide();
    var num = 0;
    function selectAll1() {
        if ($('.selectAll1').prop('checked') == true) {
            $('.checkboxAll').prop('checked', true);
            $('#deleteAll1').show();
            $('tr').prop('class', 'checkedTrue');

        } else if ($('.selectAll1').prop('checked') == false) {
            $('.checkboxAll').prop('checked', false);
            $('#deleteAll1').hide();
            $('tr').prop('class', 'checkedFalse');
        }
    }
    function checkTrue(trSe, chSe) {
        if ($(chSe).prop('checked') == true) {
            $(chSe).prop('checked', true);
            $(trSe).prop('class', 'checkedTrue');
            $('#deleteAll1').show();

            num += 1;
        } else if ($(chSe).attr('checked') == false) {
            $(chSe).prop('checked', false);
            $(trSe).prop('class', 'checkedFalse');
            num = num - 1;

        }
        if (num == 0) {
            $('#deleteAll1').hide();
        }
    }
    function deleteAll1() {
        $.ajax({
            url: "http://localhost/NewCLB/admins/deletedepartment",
            type: "POST",
            dataType: "text",
            data: $('.fm_del').serialize(),
            context: document.body,
            success: function (result) {
                console.log(result);
            }
        });
    }

    function AddD() {
        $('#fm_add').show();
    }

    function AddDepart() {
        $.ajax({
            url: "http://localhost/NewCLB/admins/addDepart",
            type: "POST",
            dataType: "text",
            data: $('#fm_addD').serialize(),
            context: document.body,
            success: function (result) {
                $('#fm_add').hide();
                $('.newD').html(result);
            }
        });
    }

    function click_depart(fm) {
        $.ajax({
            url: "http://localhost/NewCLB/admins/editdepart",
            type: "POST",
            dataType: "text",
            data: $(fm).serialize(),
            context: document.body,
            success: function (result) {
                $('#editD').show();
                $('#editD').html(result);
                $('#hideD').hide();
                $('#fm_add').hide();
            }
        });
    }

</script>












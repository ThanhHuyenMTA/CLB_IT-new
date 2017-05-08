<style>

</style>
<form method="post" id="fm_check">
    <br>
    <div class="CBA" data-toggle="tooltip" data-placement="bottom" title="Select!">
        <input  onclick="checkALL()" class="checkAll" type="checkbox"/>
    </div>
    <button  id="checkdelete" data-toggle="tooltip" data-placement="bottom" title="Delete!" type="button" class="fa fa-archive" onclick="Checkdelete()" ></button>
    <button id="refreshA" data-toggle="tooltip" data-placement="bottom" title="Refresh!" type="button" class="fa fa-refresh" onclick="refreshU();"></button>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Name</th>
                    <th>Job</th>
                    <th>Mail</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usercheck as $value): ?>
                    <tr id='delete<?= $value->id ?>' >
                        <td> <input class="checkedCl" id="checkID<?= $value->id ?>" onclick="checkID(<?php echo 'checkID' . $value->id ?>,<?php echo 'delete' . $value->id ?>)" type="checkbox" name="<?= $value->id ?>" value="<?= $value->id ?>"/></td>
                        <td><?= $value->name ?></td>
                        <td><?= $value->job ?></td>
                        <td><?= $value->email ?></td>
                        <td><?= $value->username ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</form>
<script type="text/javascript">
    var number = 0;
    function checkALL() {
        $.ajax({
            url: "http://localhost/NewCLB/admins/checkall",
            type: "POST",
            dataType: "text",
            data: {},
            context: document.body,
            success: function () {
                if ($('.checkAll').prop("checked") == true) {
                    $('.checkedCl').prop('checked', true);
                    $('#checkdelete').css('display', 'inherit');
                    $('tr').attr('class', 'Selected');
                } else if ($('.checkAll').prop("checked") == false) {
                    $('.checkedCl').prop('checked', false);
                    $('#checkdelete').css('display', 'none');
                    $('.checkCl').val(null);
                    $('tr').attr('class', 'UnSelected');
                    if (number == 0) {
                        $('#checkdelete').css('display', 'none');
                    }
                }
            }
        });
    }

    function checkID(check, deleteid) {
        $.ajax({
            url: "http://localhost/NewCLB/admins/checkid",
            type: "POST",
            dataType: "text",
            data: {},
            context: document.body,
            success: function () {
                if ($(check).prop("checked") == true) {
                    $(check).prop('checked', true);
                    $('#checkdelete').css('display', 'inherit');
                    $(deleteid).attr('class', 'Selected');
                    number += 1;
                } else if ($(check).prop("checked") == false) {
                    $(check).prop('checked', false);
                    $(check).val(null);
                    $(deleteid).attr('class', 'UnSelected');
                    number = number - 1;
                    if (number == 0) {
                        $('#checkdelete').css('display', 'none');
                    }
                }
            }
        });
    }

    function Checkdelete() {
        if (confirm('Are you sure you want to delete ?'))
        {
            $.ajax({
                url: "http://localhost/NewCLB/admins/checkdelete",
                type: "POST",
                dataType: "text",
                data: $('#fm_check').serialize(),
                context: document.body,
                success: function (result) {
                    console.log(result);
                    $('.Selected').remove();
                    //var data = $.parseJSON(result);
                }
            });
        }
    }
    function refreshU() {
        $('.checkedCl').prop('checked', false);
        $('#checkdelete').css('display', 'none');
        $('.checkAll').prop('checked', false);
    }
</script>

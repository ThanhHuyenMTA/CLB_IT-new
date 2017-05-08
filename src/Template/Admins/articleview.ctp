
<form method="post" id="fm_selectA">
    <div class="container">
        <br>
        <div class="abc" data-toggle="tooltip" data-placement="bottom" title="Select!" >
            <input  onclick="SelectAll()" class="SelectAll" type="checkbox"/>
        </div>
        <button  id="DeleteA" data-toggle="tooltip" data-placement="bottom" title="Delete!" type="button" class="fa fa-archive" onclick="ClickDeleteA()" ></button>
        <button id="refreshA" data-toggle="tooltip" data-placement="bottom" title="Refresh!" type="button" class="fa fa-refresh" onclick="refreshAr();" ></button>
        <br><br>
        <table class="table">
            <thead>
                <tr>
                    <th>Serial</th>
                    <th>Name</th>
                    <th>Content</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articlecheck as $value): ?>
                    <tr id='deleteSe<?= $value->id ?>'>
                        <td >
                            <input class="checkedSe" id="checkedSe<?= $value->id ?>"type="checkbox"
                                   name="<?= $value->id ?>" value="<?= $value->id ?>"
                                   onclick="clickselect(<?php echo "checkedSe" . $value->id ?>,<?php echo 'deleteSe' . $value->id ?>)"/>
                        </td>
                        <td><?= $value->name ?></td>
                        <td id="hide<?= $value->id ?>" class="showh">
                            <?= substr($value->content, 0, 120); ?>...<br>
                            <label class="moreA" onclick="Readmore(<?php echo "hide" . $value->id ?>,<?php echo "show" . $value->id ?>)">
                                Read more
                            </label>
                        </td>
                        <td class="hideh" id="show<?= $value->id ?>">
                            By<?= $this->Html->link($value->user->username, '/users/view/' . $value->user->id) ?> ( <?= $value->created ?> )<br>
                            <?= html_entity_decode($value->content) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</form>

<script type="text/javascript">
    $('.hideh').hide();
    function Readmore(bnhide, bnshow) {
        $(bnhide).hide();
        $(bnshow).show();
    }

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    $('#DeleteA').hide();
    var number = 0;
    function SelectAll() {
        $.ajax({
            url: "http://localhost/NewCLB/admins/SelectAll",
            type: "POST",
            dataType: "text",
            data: {},
            context: document.body,
            success: function () {
                if ($('.SelectAll').prop("checked") == true) {
                    $('#DeleteA').show();
                    $('.checkedSe').prop('checked', true);
                    $('tr').attr('class', 'YesSelected');
                } else if ($('.SelectAll').prop("checked") == false) {
                    $('#DeleteA').hide();
                    $('.checkedSe').prop('checked', false);
                    $('tr').attr('class', 'NoSelected');
                    if (number == 0) {
                        $('#DeleteA').hide();
                    }

                }
            }
        });
    }

    function clickselect(select, deletese) {
        $.ajax({
            url: "http://localhost/NewCLB/admins/SelectOne",
            type: "POST",
            dataType: "text",
            data: {},
            context: document.body,
            success: function () {
                if ($(select).prop("checked") == true) {
                    $(select).prop('checked', true);
                    $('#DeleteA').show();
                    $(deletese).attr('class', 'YesSelected');
                    number += 1;
                } else if ($(select).prop("checked") == false) {
                    $(select).prop('checked', false);
                    $(deletese).attr('class', 'NoSelected');
                    number = number - 1;
                    if (number == 0) {
                        $('#DeleteA').hide();
                    }
                }
            }
        });
    }

    function ClickDeleteA() {
        if (confirm('Are you sure you want to delete ?'))
        {
            $.ajax({
                url: "http://localhost/NewCLB/admins/deletearticle",
                type: "POST",
                dataType: "text",
                data: $('#fm_selectA').serialize(),
                context: document.body,
                success: function (result) {
                    console.log(result);
                    $('.YesSelected').remove();
                    $('#DeleteA').hide();
                    //var data = $.parseJSON(result);
                }
            });
        }
    }

    function refreshAr() {
        $('#DeleteA').hide();
        $('.checkedSe').prop('checked', false);
        $('.SelectAll').prop('checked', false);
        $('.showh').show();
        $('.hideh').hide();
    }
</script>
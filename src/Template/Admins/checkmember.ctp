<br>
<select id="Click_Ajax">
    <?php foreach ($department as $value): ?> 
        <option value=<?= $value->id ?>>
            <?= $value->name ?></option>
    <?php endforeach; ?>
</select>
<form method="post" id="fm_refresh">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>ID_User</th>
                    <th>Username</th>
                    <th>Member</th>
                    <th>Deputy</th>
                    <th>Prefect</th>
                    <th><a href="#" onclick="refresh()" type="button"><i class="fa fa-refresh"></i></a></th>
                </tr>
            </thead>
            <tbody>
            <thead id="show">
                
            </thead>
            </tbody>
        </table>
    </div>
</form>

<script type="text/javascript">
    $("#Click_Ajax").change(function () {
        $.ajax({
            url: "http://localhost/NewCLB/admins/viewcheckmember",
            type: "POST",
            dataType: "text",
            data: {id: $(this).val()},
            context: document.body,
            success: function (result) {
                //var data = $.parseJSON(result);
                $('#show').html(result);
            }
        });
    });
    function refresh() {
        $.ajax({
            url: "http://localhost/NewCLB/admins/refresh",
            type: "POST",
            dataType: "text",
            data: $('#fm_refresh').serialize(),
            context: document.body,
            success: function (result) {
                console.log(result);
            }
        });
    }
</script>


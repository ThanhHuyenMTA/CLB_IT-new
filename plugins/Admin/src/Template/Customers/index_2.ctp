<my-app>Loading...</my-app>
<style>
    .box-title .btn-group .btn-flat{
        margin-right: 5px;
        width: 82px;
    } 
</style>
<script>
    $('#check_all').click(function () {
        if (this.checked) {
            $('.ids').each(function () {
                this.checked = true;
            });
        } else {
            $('.ids').each(function () {
                this.checked = false;
            });
        }
    });
    $('.action_submit').click(function () {
        var value = $(this).val();
        $('input[name=name_action]').val(value);
        $('#form_action').submit();
    });
</script>

<script src="https://npmcdn.com/core-js/client/shim.min.js"></script>
<script src="https://npmcdn.com/zone.js@0.6.12?main=browser"></script>
<script src="https://npmcdn.com/reflect-metadata@0.1.3"></script>
<script src="https://npmcdn.com/systemjs@0.19.27/dist/system.src.js"></script>
<script src="/admin/angularjs/systemjs.config.js"></script>
<script>
    System.import('app').catch(function (err) {
        console.error(err);
    });
</script>
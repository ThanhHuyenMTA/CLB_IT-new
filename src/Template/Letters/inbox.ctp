<table class="table table-striped">
    <tbody>
        <?php foreach ($lettersender as $value):?>
        <tr>
            <td> <i class="fa fa-envelope"></i></td>
          <!--  <td id='mail'><?=h($value->user->email)?></td>-->
            <td>Hello welcome to IT CLUB NEW From THANH HUYỀN @@@@@</td>
            <td><?=h($value->datesender)?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php foreach ($membered as $value): ?>
    <tr>
    <input type="hidden" value="<?=$value->id_depart?>" name="id_depart"/>
        <td><?= $value->id_user ?></td>
        <td><?= $value->user->username ?></td>
        <td>
            <?php if (($value->role) == 0): ?>
                <div class="radio">
                    <label><input onclick="radio_0('<?php echo '.radio_0' . $value->id_user ?>')" class="radio_0<?= $value->id_user ?> " type="radio" id="<?= $value->id_user ?>" checked="true" name="<?= $value->id_user ?>" value="<?= $value->role ?>"></label>
                </div>
            <?php else : ?>
                <div class="radio">
                    <label><input onclick="radio_0('<?php echo '.radio_0' . $value->id_user ?>')" class="radio_0<?= $value->id_user ?> " type="radio" id="<?= $value->id_user ?>" name="<?= $value->id_user ?>" value="<?= $value->role ?>"></label>
                </div>
            <?php endif; ?>
        </td>
        <td>
            <?php if (($value->role) == 1): ?>
                <div class="radio">
                    <label><input onclick="radio_1('<?php echo '.radio_1' . $value->id_user ?>')" class="radio_1<?= $value->id_user ?> " type="radio" id="<?= $value->id_user ?>" checked="true" name="<?= $value->id_user ?>" value="<?= $value->role ?>"></label>
                </div>
            <?php else : ?>
                <div class="radio">
                    <label><input onclick="radio_1('<?php echo '.radio_1' . $value->id_user ?>')" class="radio_1<?= $value->id_user ?> " type="radio" id="<?= $value->id_user ?>" name="<?= $value->id_user ?>" value="<?= $value->role ?>"></label>
                </div>
            <?php endif; ?>
        </td>
        <td>
            <?php if (($value->role) == 2): ?>
                <div class="radio">
                    <label><input onclick="radio_2('<?php echo '.radio_2' . $value->id_user ?>')" class="radio_2<?= $value->id_user ?> " type="radio" id="<?= $value->id_user ?>" checked="true" name="<?= $value->id_user ?>" value="<?= $value->role ?>"></label>
                </div>
            <?php else : ?>
                <div class="radio">
                    <label><input onclick="radio_2('<?php echo '.radio_2' . $value->id_user ?>')" class="radio_2<?= $value->id_user ?>" type="radio" id="<?= $value->id_user ?>" name="<?= $value->id_user ?>" value="<?= $value->role ?>"></label>
                </div>
            <?php endif; ?>
        </td>
    </tr>
<?php endforeach; ?>

<script type="text/javascript">
    function radio_2(radioClick) {
        $(radioClick).attr('checked', true);
        $(radioClick).attr('value', 2);
    }
    function radio_1(radioClick) {
        $(radioClick).attr('checked', true);
        $(radioClick).attr('value', 1);
    }
    function radio_0(radioClick) {
        $(radioClick).attr('checked', true);
        $(radioClick).attr('value', 0);
    }
</script>

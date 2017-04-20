<!DOCTYPE html>
<html>
    <head>
        <title>...............Ajax.................</title>
        <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>

        <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script language="javascript">
            function load_ajax() {
                $.ajax({
                    url: "http://localhost/NewCLB/ajaxs/demo1",
                    type: "post",
                    dataType: "text",
                    data: {
                    },
                    success: function (result) {
                        $('#result').html(result);
                    }
                });
            }

            function clicka() {
                $.ajax({
                    url: "http://localhost/NewCLB/ajaxs/demo1", // gọi đến file server show_data.php để xử lý
                    type: "post", // phương thức dữ liệu được truyền đi
                    dataType: "text",
                    data: $("#fr_form").serialize(), //lấy toàn thông tin các fields trong form bằng hàm serialize của jquery
                    success: function (response) {//kết quả trả về từ server nếu gửi thành công
                        $('#result').empty().append(response);
                    }
                });
            }


        </script>
    </head>
    <body>
        <div  class="box">
            <div id="result">
                Nội dung ajax sẽ được load ở đây
            </div>
            <!--<input type="button" name="clickme" id="clickme" onclick="load_ajax()" value="Click Me"/>-->

            <form id="fr_form" name="fr_form">
                <table width="50%">
                    <tr><td>Tên đăng nhập<td><td><input type="text" name="username"></td></tr>
                    <tr><td>Mật mã<td><td><input type="password" name="password"></td></tr>
                    <tr><td>Địa chỉ email<td><td><input type="text" name="email"></td></tr>
                    <tr>
                        <td>Giới tính<td>
                        <td>
                            <input type="radio" name="sex" value="male">Nam <input type="radio" name="sex" value="female">Nữ
                        </td>
                    </tr>
                    <tr>
                        <td>Tuổi<td>
                        <td>
                            <select name="age">
                                <?php for ($age = 10; $age <= 150; $age++) { ?>
                                    <option value="<?php echo $age; ?>"> <?php echo $age; ?> </option>
                                <?php } ?>

                            </select>
                        </td>
                    </tr>
                    <tr><td>Ngày sinh<td><td><input type="text" name="birthday"></td></tr>
                    <tr><td>&nbsp;<td><td>
                            <input type="button" id="btn_register" name="btn_register" value="Đăng ký" onclick="clicka()"/>
                        </td></tr>
                </table>	
            </form>
        </div>
    </body>
</html>


<html>
    <?= $this->Html->css('login.css'); ?>
    <div class="overlay">
        <div class="login-wrapper" style="width: 1000px; ">
            <div class="login-content">
                <a class="close">x</a>
                <center><h1>Sign up</h1></center>
                <form method="post" action="#">
                    <div class="row">
                        <div id="main-content" class="col-md-4">
                            <label for="username">
                                Name:
                                <input type="text" name="name" id="name" placeholder="Please enter name to !!! " required="required" />
                            </label>

                            <label for="phone">
                                Phone:
                                <input type="text" name="phone" placeholder="Please enter phone to !!! " required="required" />
                            </label>
                            <label for="birthday">
                                Birthday:
                                <input type="date" name="birthday" required="required" style="width: 175px;font-size: 15px;" />
                            </label>

                        </div>

                        <div id="main-content" class="col-md-4">
                            <label for="address">
                                Address:
                                <input type="text" name="address" placeholder="Please enter address to !!! " required="required" />
                            </label>
                            <label for="job">
                                Job:
                                <input type="text" name="job" placeholder="Please enter job to !!! " required="required" />
                            </label>

                            <label for="sex" style="float:left;">
                                Boy 
                                <input  type="checkbox" name="sex" value="male"/>
                            </label>

                            <label for="sex"style="float: left;margin-left: 5px;" >
                                Girl
                                <input type="checkbox" name="sex" value="femal" /> 
                            </label>


                        </div>

                        <div id="main-content" class="col-md-4">

                            <label for="email">
                                Email:
                                <input type="email" name="email"  placeholder="Please enter email to !!! " required="required" />
                            </label>
                            <label for="username">
                                Username:
                                <input type="text" name="username"  placeholder="Please enter username to !!! " required="required" />
                            </label>

                            <label for="password">
                                Password:
                                <input type="password" name="password"  placeholder="Please enter password to !!! " required="required" />
                            </label>
                        </div>
                    </div>
                    <button type="submit" style="margin-left:845px;">Sign-up</button>
                </form>
            </div>
        </div>
    </div>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        $("#loginLink").click(function (event) {
            event.preventDefault();
            $(".overlay").fadeToggle("fast");
        });

        $(".overlayLink").click(function (event) {
            event.preventDefault();
            var action = $(this).attr('data-action');

            $.get("ajax/" + action, function (data) {
                $(".login-content").html(data);
            });

            $(".overlay").fadeToggle("fast");
        });

        $(".close").click(function () {
            $(".overlay").fadeToggle("fast");
        });

        $(document).keyup(function (e) {
            if (e.keyCode == 27 && $(".overlay").css("display") != "none") {
                event.preventDefault();
                $(".overlay").fadeToggle("fast");
            }
        });
    });
</script>
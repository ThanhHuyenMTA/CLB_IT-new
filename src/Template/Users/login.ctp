<html>
<?= $this->Html->css('login.css'); ?>

    <div class="overlay">
        <div class="login-wrapper">
            <div class="login-content">
                <a class="close">x</a>
                 <center><h1>Sign in</h1></center>
                <form method="post" action="#">
                    <label for="username">
                        Username:
                        <input type="text" name="email" style="email" id="username" placeholder="Please enter email to !!! " required="required" />
                    </label>
                    <label for="password">
                        Password:
                        <input type="password" name="password" id="password" placeholder="Password must contain 1 uppercase, lowercase and number" required="required" />
                    </label>
                    <button type="submit">Sign in</button>
                </form>
            </div>
        </div>
    </div>
</html>

<script type="text/javascript">
    $(document).ready(function() {
    $("#loginLink").click(function( event ){
        event.preventDefault();
        $(".overlay").fadeToggle("fast");
    });
     
    $(".overlayLink").click(function(event){
        event.preventDefault();
        var action = $(this).attr('data-action');
         
        $.get( "ajax/" + action, function( data ) {
            $( ".login-content" ).html( data );
        }); 
         
        $(".overlay").fadeToggle("fast");
    });
     
    $(".close").click(function(){
        $(".overlay").fadeToggle("fast");
    });
     
    $(document).keyup(function(e) {
        if(e.keyCode == 27 && $(".overlay").css("display") != "none" ) { 
            event.preventDefault();
            $(".overlay").fadeToggle("fast");
        }
    });
});
</script>
<style>
    #top{
        position: inherit;
    }
</style>
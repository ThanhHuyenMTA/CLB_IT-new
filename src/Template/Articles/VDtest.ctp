<?php echo $this->Html->script('ckeditor/ckeditor'); ?>
<div class="row">
    <div id="main-content" class="col-md-12">
        <div class="box">
            Dung
            <input type="button" name="clickme" id="clickme" onclick="bb();" value="Click Me"/>
            <div id="add"></div>
            <input type="button" id="StartButton" value="Click to add 1 to counter" onClick="printNumber();">
            <b>The number of times the button has been clicked is ... </b>
            <br>
            <div id="number"></div>
            <input type="button" value="Show2" onclick="Show2();"/>
            <input type="button" value="Hide2" onclick="Hide2();"/>
            <div id="ad">Adddddddddddd</div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function Hide2() {
        $("#ad").css("color","red");
    }
    function Show2() {
        $("#ad").hide();
    }

    function bb() {
        alert('ok');
    }
    var x = 0;
    function addNumber() {
        x = x + 1;
        return x;
    }

    function printNumber(number) {
        document.getElementById("number").innerHTML = addNumber();
    }
</script>
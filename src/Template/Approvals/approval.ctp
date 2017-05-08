<div id="page-content" class="index-page container">
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'Member')" id="defaultOpen">Member(<?php echo $number_member; ?>)
        </button>
        <button class="tablinks" onclick="openCity(event, 'Article')">Article(<?php echo $number_article; ?>)
        </button>
    </div>

    <div id="Member" class="tabcontent">
        <h6>Some members need approval:</h6>
        <?= $this->Element('Approvals/checkmember') ?>
    </div>
    <div id="Article" class="tabcontent">
        <h6>Some article  need approval:</h6>
        <?= $this->Element('Approvals/checkarticle') ?>
    </div>


    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
</div>
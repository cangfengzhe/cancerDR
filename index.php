<?php
include 'header.php';
?>


<div id='search'>
  <ul id="tabs">
  <li><a href="#"  id='drug' tag='doxorubicin' >Drug</a></li>
  <li><a href="#"  id='disease' tag='breast cancer'>Disease</a></li>
  <li><a href="#"  id='cellLine' tag='MCF-7'>Cell Line</a></li>

  <li><a href="#" id='gene' tag='BRCA1'>Gene&Transcript</a></li>


    </ul>
        <div id='form'>
            <form action="search.php" method='get'>

                <input type="text" id='text' name='value'
                  onfocus="style.color='black';style.fontStyle='normal';" placeholder='eg: doxorubicin' />
                <input type="hidden" name='type' id='hidden' value='aaa' />
                <div>

                    <ul class='example'>
                    <h4>Example</h4>
                        <li>Drug<br/>doxorubicin</li>
                        <li>Disease<br/>breast cancer</li>
                        <li>Cell Line<br/>MCF-7</li>
                        <li>Gene&Transcript<br/>BRCA1</li>

                    </ul>
                </div>
                <input type='submit' id='btn' value='Search' />
            </form>
        </div>
</div>

<div id="intro">
<div class='intro1'>
  <h3>Defination</h3>
  <p>CDRIC is an integrated catalogue of drug resistance in cancers, which encompasses 944 cancer cell lines, 199 anticancer drugs and 237 genes or transcripts related to drug resistance in five categories i.e. mutation, methylation, microsatellite, lncRNA and miRNA. The data is collected manually from the 2199 relevant articles of PubMed and the database of GDSC. </p>
</div>
<div class='intro1'>
  <h3>Characteristic</h3>
  <p>Characterized as housing the plentiful and accurate information of five potential upstream factors related to chemoresistance in cancers, CDRIC may be helpful to develop relevant models, enhance the understanding of the mechanism of drug assistance or provides benefit clues in reversing the chemoresistance and ultimately helps to explore novel schemes in the diagnostics, treatment and prognosis of cancers.
</p>
</div>
<div class='intro1'>
  <h3>Future</h3>
  <p>Ongoing efforts will be made in the further analysis of the information as well as the up-to-date synchronization of the data accompanied with the emergency of novel investigations, which are expected to make contributions to the improvement of global human health in the new era. </p>
</div>
</div>

<div id="tuwen">
<div id='tu'>

</div>
<div id='wen'>

  <p>CDRIC is an integrated catalogue of drug resistance in cancers</p>
</div>

</div>

<!-- search tab js -->

<script>
$(document).ready(function() {
$('#left').css('visibility','visible');

	$("#tabs li:first").attr("id","current"); // Activate first tab

  $("#hidden")[0].value=$("#tabs a:first").attr("id");

    $('#tabs a').click(function(e) {
        e.preventDefault();
        $("#text").attr("placeholder",'eg: '+$(this).attr('tag'));
       $("#tabs li").attr("id","");
        // $("#tabs li").attr("id",""); //Reset id's
        $(this).parent().attr("id","current"); // Activate this
         $("#hidden")[0].value=$(this).attr("id");

        // Show content for current tab
    });
});

</script>











<?php
include 'footer.php';
?>
<?php
include 'header.php';
?>
    <script type="text/javascript" src="./js/jquery.autocomplete.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/jquery.autocomplete.css">

<input type='text' id = 'drug_dis' style='width:200px;'/>
<script type="text/javascript">

		$(function(){ //
			//./autocomplete/search.php?output=json
		    $("#drug_dis").autocomplete('./autocomplete/search.php?output=json', {
        remoteDataType: 'json',
        processData: function(data) {
			var i, processed = [];
			for (i=0; i < data.length; i++) {
				processed.push([data[i][0] + " - " + data[i][1]]);
			}
			return processed;
        },
        minChars: 1,
        useDelimiter: false,
        selectFirst: true,
        autoFill: true

    });
		})



</script>

<?php

include 'footer.php';
?>
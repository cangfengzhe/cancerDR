<?php
include 'header.php';
?>
    <script type="text/javascript" src="./js/jquery.autocomplete.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/jquery.autocomplete.css">

<script type="text/javascript">

		$(function(){ //
			//./autocomplete/search.php?output=json
		var type = 'drug';
		$('#disease').hide();
		complete(type);

			$("#radio_dis").focus(function(){
				type = $("#radio_dis").val();
				$('#disease').show()
				$('#drug').hide();
				console.log(type);
				complete(type);

			});
			$("#radio_drug").focus(function(){
				type = $("#radio_drug").val();
				$('#disease').hide()
				$('#drug').show();

				complete(type);

			});

			function complete(type){


			$("#" + type).autocomplete('./autocomplete/search.php?output=json' + '&type=' + type, {
        remoteDataType: 'json',
        processData: function(data) {
			var i, processed = [];
			console.log(type);
			for (i=0; i < data.length; i++) {
				// processed.push([data[i][0] + " - " + data[i][1]]);
				processed.push([data[i][1]]);

			}
			return processed;
        },
        minChars: 1,
        useDelimiter: false,
        selectFirst: true,
        autoFill: true

    });
		}


		  var url = './autocomplete/gene.php';
		  $('#submit').click(function(){
		  	        $.ajax(url, {
            async: false,
			dataType: "json",
            success: function(data) {
            var tmp = '';
            $.each(data, function(index, value){
            	tmp += value;
            	tmp += '\r';
	        	// console.log(tmp);

            })

            $('#multiline').val(tmp);

            },


        });
		  var name = $('#' + type).val();
 		  var dr_value = '';
 		  $('input[type="checkbox"][name="dr_type"]:checked').each(function(){
 		  	dr_value += $(this).val();

 		  })
 		  console.log(dr_value + name);


		  })


		})



</script>

<style type="text/css">
	#multiline{
		width:300px;
		height:150px;
	}

</style>
<div class='foreword'><h1>Enrichment of Pathway & GO</h1>
<p>Enrichment of Pathway & GO</p>
</div>

<input id="radio_drug" type="radio" name="type" value="drug" checked="checked"/> Drug
<input id="radio_dis" type="radio" name="type" value="disease" /> Disease
<br/>
<input type='text' class = 'drug_dis'  id='drug' style='width:200px;'/>
<input type='text' class = 'drug_dis' id='disease' style='width:200px;'/>

<br/>
<input type = 'checkbox' name = 'dr_type' value = 'a' checked="checked"/> Mutation Genes
<input type = 'checkbox' name = 'dr_type' value = 'b' /> Methylation Genes
<input type = 'checkbox' name = 'dr_type' value = 'c' /> miRNA predicted Targets

<br	/>
<input type='button' value = 'submit' id = 'submit' />
<br/>
<textarea id='multiline' ></textarea>
<?php
include 'footer.php';
?>
s
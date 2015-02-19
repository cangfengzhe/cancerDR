<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Drug Resistance</title>
	<link href="./css/css.css" type="text/css" rel="stylesheet">
	<script src="./js/jquery-2.1.1.min.js"></script>
	<script src='./js/cdric.js'></script>



</head>
<body>
<div id="container">
	<div class="header">

	<div id="nav">
<div id="logo">
<img src="./images/cdric.png" alt=""/>
</div>
		<ul class='heading'>
			<li><a href="/index.php">Home</a></li>
			<li><a href="">Browse</a>
			<ul id='subhead'>
				<li><a href="./search.php?type=disease&value=">Diseases</a></li>
				<li><a href="./search.php?type=cellLine&value=">Cell Lines</a></li>
				<li><a href="./search.php?type=drug&value=">Drugs</a></li>
				<li><a href="./search.php?type=gene&value=">Genes&<br/>Transcripts</a></li>

			</ul></li>
			<li><a href="./network.php">Network</a></li>

			<li><a href="./submit.php">Submit</a></li>
			<li><a href="./guide.php">Guide</a></li>



		</ul>

		<!-- search box -->
	<div id="search_box">
		<form action="search.php" method='get'>

		<select id='sel' name='type'>
		<option value="cellLine">Cell Line</option>
			<option value="disease">Disease</option>

			<option value="drug">Drug</option>
			<option value="gene">Gene</option>

		</select>
		<input type="text" id='input_box' name='value'/>
		<input type='submit' id = 'btn_box' value='search' onclick='setCookie("select_value",document.getElementById("sel").selectedIndex,30)'/>
	<script>
     function setSelectValue(){
     	if(getCookie('select_value')!=''){
     		document.getElementById('sel').selectedIndex=getCookie('select_value');
     	}
     }


	setSelectValue();

	</script>
	</form>

			</div>

	</div>
	</div>
<div id="left">

		<h2>Browse</h2>
		<ul>




      <li><a href='./search.php?type=disease&value='>Drugs</a></li>
      <li><a href='./search.php?type=cellLine&value='>Diseases</a></li>
      <li><a href='./search.php?type=drug&value='>Cell Lines</a></li>
      <li><a href='./search.php?type=gene&value='>Gene & Transcript</a></li>
    		</ul>
        <h2>Download</h2>
    <ul>

      <li><a href='./download.php'>Download Data</a></li>


        </ul>
        <h2>Contact</h2>
        <ul>
        	<li><a href="./contact.php">Contact us</a></li>
        </ul>
        <h2>Hot links</h2>
    <ul>

		<li><a target='_blank'  href='http://pubchem.ncbi.nlm.nih.gov/'>NCBI Pubchem</a></li>
      <li><a  target='_blank' href='http://www.ncbi.nlm.nih.gov/gene/'>NCBI Gene</a></li>
      <li><a target='_blank'  href='http://www.ncbi.nlm.nih.gov/probe'>NCBI Probe</a></li>

      <li><a target='_blank'  href='http://www.drugbank.ca/'>DrugBank</a></li>
      <li><a target='_blank'  href='http://cancer.sanger.ac.uk/cancergenome/projects/cosmic/'>Cosmic</a></li>
      <li><a target='_blank'  href='http://www.cancerrxgene.org/'>GDSC</a></li>
      <li><a target='_blank'  href='http://www.mirbase.org/'>miRBase</a></li>
        <li><a target='_blank'  href='http://www.lncrnadb.org/'>lncRNA</a></li>
        </ul>
</div>
<div id="main">





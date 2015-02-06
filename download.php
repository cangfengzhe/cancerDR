<?php
include 'header.php';

?>
<script type="text/javascript">
	$(function(){
		$('#left').css('visibility','visible');
		});

</script>


<div class='foreword'><h1>Download</h1>

</div>

<ul>
	<li><span>Mutation data</span><a href='./download/mutation.csv'>Mutation</a></li>
	<li><span>Methylation data</span><a href='./download/methylation.csv'>Methylation</a></li>
	<li><span>miRNA data</span><a href='./download/miRNA.csv'>miRNA</a></li>
	<li><span>lncRNA data</span><a href='./download/lncRNA.csv'>lncRNA</a></li>
	<li><span>MSI data</span><a href='./download/MSI.csv'>MSI</a></li>
</ul>
<table>
<tbody>
	<tr><th>Data</th><th>Description</th></tr>
	<tr><td>Mutation Infomation</td><td>Including cell lines, genes, copy number,AA Mutation and CDS Mutation. This data is from <a target="_blank" href="http://cancer.sanger.ac.uk/cancergenome/projects/cosmic/" Cosmic</td></tr>
	<tr><td>Methylation Infomation</td><td>Including disease, cell lines, genes related to methylation, Pubmed ID and the detail.</td></tr>
	<tr><td>miRNA Infomation</td><td>Including disease, cell lines, miRNA, Pubmed ID and details</td></tr>
	<tr><td>lncRNA inof</td><td></td></tr>
	<tr><td></td><td></td></tr>
	<tr><td></td><td></td></tr>
	<tr><td></td><td></td></tr>
	<tr><td></td><td></td></tr>
	<tr><td></td><td></td></tr>
	<tr><td></td><td></td></tr>
</tbody>
</table>
<h2>File Description</h2>
<style type="text/css">
		ul li{
			font-size: 18px;
		}
	span{
		margin: 5px 15px;
	}
</style>

<?php
include 'footer.php';
?>
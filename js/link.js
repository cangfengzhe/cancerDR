	var disease_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

		return '<div style="margin:10px  10px;"><a href="/disease.php?diseaseid=' + rowdata.disease_id + '">' + value + '</a></div>';
	}
	var cell_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

		return '<div style="margin:10px  10px;"><a href="/cell.php?cellid=' + rowdata.cell_id + '">' + value + '</a></div>';
	}
	var mir_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

		return '<div style="margin:10px  10px;"><a href="/mir.php?mirid=' + rowdata.ms_id + '">' + value + '</a></div>';
	}

	var pub_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

		return '<div style="margin:10px  10px;"><a href="http://www.ncbi.nlm.nih.gov/pubmed/?term=' + rowdata.pmid + '">' + value + '</a></div>';
	}

	var drug_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

		return '<div style="margin:10px  10px;"><a href="/drug.php?drugid=' + rowdata.drug_id + '">' + value + '</a></div>';
	}
	var ms_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

		return '<div style="margin:10px  10px;"><a href="/ms.php?msid=' + rowdata.ms_id + '">' + value + '</a></div>';
	}
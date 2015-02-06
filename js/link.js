	var disease_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

	    return '<div style="margin:10px  10px;"><a href="/disease.php?diseaseid=' + rowdata.disease_id + '">' + value + '</a></div>';
	}
	var cell_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {
	    if (value != 'clinical samples') {
	        return '<div style="margin:10px  10px;"><a href="/cell.php?cellid=' + rowdata.cell_id + '">' + value + '</a></div>';
	    }

	}
	var mir_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

	    return '<div style="margin:10px  10px;"><a href="/mir.php?mirid=' + rowdata.mir_id + '">' + value + '</a></div>';
	}
	var lnc_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

	    return '<div style="margin:10px  10px;"><a href="/lnc.php?lncid=' + rowdata.lnc_id + '">' + value + '</a></div>';
	}
	var ms_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

	    return '<div style="margin:10px  10px;"><a href="/ms.php?msid=' + rowdata.ms_id + '">' + value + '</a></div>';
	}
	var pub_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

	    return '<div style="margin:10px  10px;"><a target="_blank" href="http://www.ncbi.nlm.nih.gov/pubmed/?term=' + rowdata.pmid + '">' + value + '</a></div>';
	}

	var drug_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

	    return '<div style="margin:10px  10px;"><a href="/drug.php?drugid=' + rowdata.drug_id + '">' + value + '</a></div>';
	}
	var ms_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

	    return '<div style="margin:10px  10px;"><a href="/ms.php?msid=' + rowdata.ms_id + '">' + value + '</a></div>';
	}
	var gene_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

	    return '<div style="margin:10px  10px;"><a href="/gene.php?geneid=' + rowdata.gene_id + '">' + value + '</a></div>';
	}

	var columnsrenderer = function(value) {
	    return '<div style="margin: 15px 0 0 14px;">' + value + '</div>';
	}

	var multi_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {

	    switch (rowdata.type) {
	        case 'Gene':
	            return '<div style="margin:10px  10px;"><a href="/gene.php?geneid=' + rowdata.id + '">' + value + '</a></div>';
	            break;
	        case 'miRNA':
	            return '<div style="margin:10px  10px;"><a href="/mir.php?mirid=' + rowdata.id + '">' + value + '</a></div>';
	            break;
	        case 'lncRNA':
	            return '<div style="margin:10px  10px;"><a href="/lnc.php?lncid=' + rowdata.id + '">' + value + '</a></div>';
	            break;
	        case 'MicroSatellite':
	            return '<div style="margin:10px  10px;"><a href="/ms.php?msid=' + rowdata.id + '">' + value + '</a></div>';
	            break;
	        default:
	            return 'error';
	    }
	}
	var factorType = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {
	    // txt='<a id="tip" href="#"><span id="tip_info">Mutation:red; Methylation:orange; miRNA:yellow; lncRNA:green; MSI:blue; None:grey</span>';
	    txt = '';
	    if (rowdata.mut == 1) {
	        txt += '<span class="cir" id="cir_mut"></span>';
	    } 
	    // else {
	    //     txt += '<span class="cir" id="cir0"></span>';
	    // }
	    if (rowdata.meth == 1) {
	        txt += '<span class="cir"  id="cir_meth"></span>';
	    } 
	    // else {
	    //     txt += '<span class="cir"  id="cir0"></span>';
	    // }

	    if (rowdata.mir == 1) {
	        txt += '<span class="cir"  id="cir_mir"></span>';
	    } 
	    // else {
	    //     txt += '<span class="cir"  id="cir0"></span>';
	    // }

	    if (rowdata.lnc == 1) {
	        txt += '<span class="cir"  id="cir_lnc"></span>';
	    } 
	    // else {
	    //     txt += '<span class="cir"  id="cir0"></span>';

	    // }

	    if (rowdata.msi == 1) {
	        txt += '<span class="cir" id="cir_msi"></span>';

	    } 
	    // else {
	    //     txt += '<span class="cir" id="cir0"></span>';

	    // }



	    return txt;

	}




	var crossRef = function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {
	    if (value == -1) {
	        return '<div style="margin-top:5px;text-align:center; text-indent:0"><span style="background-color:blue;border:1px solid black;padding:0px 4px;">sensitivity</span></div>';
	    } else if (value == 1) {
	        return '<div style="margin-top:5px;text-align:center; text-indent:0"><span style="background-color:red;border:1px solid black;padding:0px 4px;">resistance</span></div>';
	    }
	    
	     else {
	        return '<div style="margin-top:5px;text-align:center; text-indent:0"><span style="background-color:red;border:1px solid black;padding:0px 4px;">normal</span></div>';

	    }
	}

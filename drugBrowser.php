
	<style type="text/css">
     .cir{
     	width:15px;
     	height: 15px;
     	float:left;
     	display: block;
     	border-radius: 50%;
     	margin: 10px 0px 0 10px;
     }
	#cir0{
		background-color: grey;
	}
     #cir_mut{
		background-color: red;
     }
     #cir_meth{
		background-color: orange;
     }
     #cir_mir{
     	background-color: yellow;
     }
	#cir_lnc{
		background-color: green;
	}
	#cir_msi{
		background-color: blue;
	}

</style>

	<!-- php调用javacript -->
    <script type="text/javascript">
  
        $(document).ready(function () {
            // prepare the data
            var theme = 'energyblue';
      
            var source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'id', type: 'string'},
					 { name: 'drug_id', type: 'string'},
					 { name: 'drug_name', type: 'string'},
					 { name: 'drugbank_id', type: 'string'},
					 { name: 'pubchem_id', type: 'string'},
					 { name: 'mut', type: 'string'},
					 { name: 'meth', type: 'string'},
					 { name: 'mir', type: 'string'},
					 { name: 'lnc', type: 'string'},
					 { name: 'msi', type: 'string'},
					 { name: 'sum', type: 'float'}
                ],
			    url: 'data.php?table=info_drug' + '&value=' + "<?php echo $_GET['value']; ?>" +
			     '&colName=drug_name',
				
				cache: false,
				filter: function()
				{
					// update the grid and send a request to the server.
					$("#jqxgrid").jqxGrid('updatebounddata', 'filter');
				},
				sort: function()
				{
					// update the grid and send a request to the server.
					$("#jqxgrid").jqxGrid('updatebounddata', 'sort');
				},
				root: 'Rows',
				
				beforeprocessing: function(data)
				{		
					if (data != null)
					{
						source.totalrecords = data[0].TotalRows;					
					}
					
				}


            };		


		    var dataadapter = new $.jqx.dataAdapter(source, {
					loadError: function(xhr, status, error)
					{
						alert(error);
					}
				}
			);
	

// # lpd 添加 链接




var crossRef =  function (row, columnfield, value, defaulthtml, columnproperties, rowdata) {
   return '<div style="margin:5px 0 0 10px;"><a href="./drug.php?drugid=' + rowdata.drug_id + '">' + value + '</a></div>';
                
}

var factorType =  function (row, columnfield, value, defaulthtml, columnproperties, rowdata) {
  // txt='<a id="tip" href="#"><span id="tip_info">Mutation:red; Methylation:orange; miRNA:yellow; lncRNA:green; MSI:blue; None:grey</span>';
   txt='';
   if(rowdata.mut==1){
   	txt += '<span class="cir" id="cir_mut"></span>';
   }
   else{
   	txt += '<span class="cir" id="cir0"></span>';
   }
   if(rowdata.meth==1){
   	txt += '<span class="cir"  id="cir_meth"></span>';
   }
   else{
   	txt += '<span class="cir"  id="cir0"></span>';
   }

   if(rowdata.mir==1){
   	txt += '<span class="cir"  id="cir_mir"></span>';
   }
   else{
  	txt += '<span class="cir"  id="cir0"></span>';
   }

   if(rowdata.lnc==1){
  	txt += '<span class="cir"  id="cir_lnc"></span>';
   }
   else{
   	txt += '<span class="cir"  id="cir0"></span>';

   }

   if(rowdata.msi==1){
   	   	txt += '<span class="cir" id="cir_msi"></span>';

   }
   else{
   	txt += '<span class="cir" id="cir0"></span>';

   }
   


   return txt;
                
}
var columnsrenderer = function (value) {
	return '<div style="margin: 15px 0 0 14px;">' + value + '</div>';
}
// <a href="#" title="Mutation:red; Methylation:orange;<br/> miRNA:yellow; lncRNA:green; MSI:blue; None:grey">
 var colType = function(value){
 	txt = 'which factor to show'; 
 	return txt;
 }    
            // initialize jqxGrid
            $("#jqxgrid").jqxGrid(
            {		
                source: dataadapter,
                theme: theme,
				filterable: true,
				sortable: true,
				// autoheight: false,
				pagermode: "simple",
				pageable: true,
				virtualmode: true,
				// height:300,
				columnsheight: 40,
				rowsheight: 30,
				selectionmode: 'none',
				pagerbuttonscount: 6,
				pagesize: 20,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				autoheight: true,
				width: 800,
				rendergridrows: function(obj)
				{
					 return obj.data;    
				},
			    columns: [
                      // { text: 'Drug ID' , datafield:'<a href="./drug.php?drugID=afd'">drugID</a>', width: 200 , cellsrenderer:cellsrenderer},
                       { text: 'Drug ID', datafield: 'id', width: 130 , cellsrenderer:crossRef, renderer:columnsrenderer},
                      { text: 'Drug Name', datafield: 'drug_name', width: 200 , cellsrenderer:crossRef,renderer:columnsrenderer},
                      { text: 'Drugbank ID', datafield: 'drugbank_id', width: 130 ,renderer:columnsrenderer},
                      { text: 'Pubchem ID', datafield: 'pubchem_id', width: 150 ,renderer:columnsrenderer},
                      { text: 'type', datafield: 'sum', width: 190, cellsrenderer:factorType }
                  ]
            });
        });
    </script>

    <div id='jqxWidget'>	
        <div id="jqxgrid"></div>
    </div>


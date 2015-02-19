


	<!-- php调用javacript -->
    <script type="text/javascript">

        $(document).ready(function () {
            // prepare the data
            var theme = 'energyblue';
      		var value ="<?php echo $_GET['value'];?>";
            var source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'id', type: 'string'},
					 { name: 'drug_id', type: 'string'},
					 { name: 'drug_name', type: 'string'},
					 { name: 'other_name', type: 'string'},
					 { name: 'description', type: 'string'},
					 { name: 'pubchem_id', type: 'string'},
					 { name: 'desc', type: 'string'},
					 { name: 'mut', type: 'string'},
					 { name: 'meth', type: 'string'},
					 { name: 'mir', type: 'string'},
					 { name: 'lnc', type: 'string'},
					 { name: 'msi', type: 'string'},
					 { name: 'sum', type: 'float'}
                ],
			    url: 'data.php?table=info_drug' + '&value=' + value +
			     '&colName=other_name',

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


var columnsrenderer = function (value) {
	return '<div style="margin: 15px 0 0 14px;">' + value + '</div>';
}
// <a href="#" title="Mutation:red; Methylation:orange;<br/> miRNA:yellow; lncRNA:green; MSI:blue; None:grey">
 var colType = function(value){
 	txt = 'which factor to show';
 	return txt;
 }
            // initialize jqxGrid
            if(value!=''){
            	$("#jqxgrid").jqxGrid(
            {
                 source: dataadapter,
                width:1000,
                theme: 'energyblue',
				pageable: true,
				sortable: true,
				autoheight: true,
				// rowsheight: 30,
				columnsheight: 40,
				// height:40px;
                virtualmode: true,

                filterable: true,
				sortable: true,
				selectionmode: 'none',
				altrows: true,//交替颜色
				autoshowfiltericon: false,
				showpinnedcolumnbackground: false,
				showrowdetailscolumn:false,
				autorowheight: true,
				pagesize: 20,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				rendergridrows: function(obj)
				{
					 return obj.data;
				},
			    columns: [
                      // { text: 'Drug ID' , datafield:'<a href="./drug.php?drugID=afd'">drugID</a>', width: 200 , cellsrenderer:cellsrenderer},
                      { text: 'Search Value', datafield: 'other_name', width: 400 ,renderer:columnsrenderer},
                      { text: 'Drug Name', datafield: 'drug_name', width: 200 , cellsrenderer:crossRef,renderer:columnsrenderer},
                      { text: 'Drug ID', datafield: 'id', width: 130 , cellsrenderer:crossRef, renderer:columnsrenderer},
                    	{ text: 'type', datafield: 'sum', width: 190, cellsrenderer:factorType,renderer:columnsrenderer }
                  ]
            });
			}else{
				$("#jqxgrid").jqxGrid(
            {
                source: dataadapter,
                width:1000,
                theme: 'energyblue',
				pageable: true,
				sortable: true,
				autoheight: true,
				rowsheight: 30,
				columnsheight: 40,
				// height:40px;
                virtualmode: true,

                filterable: true,
				sortable: true,
				selectionmode: 'none',
				altrows: true,//交替颜色
				autoshowfiltericon: false,
				showpinnedcolumnbackground: false,
				// showrowdetailscolumn:false,
				// autorowheight: true,
				pagesize: 20,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				// autorowheight: true,
				rendergridrows: function(obj)
				{
					 return obj.data;
				},
			    columns: [
                      // { text: 'Drug ID' , datafield:'<a href="./drug.php?drugID=afd'">drugID</a>', width: 200 , cellsrenderer:cellsrenderer},
                      // { text: 'Search Value', datafield: 'other_name', width: 380 ,renderer:columnsrenderer},

                      { text: 'Drug Name', datafield: 'drug_name', width: 200 , cellsrenderer:crossRef,renderer:columnsrenderer},
                      { text: 'Drug ID', datafield: 'id', width: 120 , cellsrenderer:crossRef, renderer:columnsrenderer},
                      { text: 'Description', datafield: 'description', width: 530 ,renderer:columnsrenderer},
                      // { text: 'Pubchem ID', datafield: 'pubchem_id', width: 150 ,renderer:columnsrenderer},
                      { text: 'type', datafield: 'sum', width: 150, cellsrenderer:factorType }
                  ]
            });
			}

        });
    </script>

    <div id='jqxWidget'>
        <div id="jqxgrid"></div>
    </div>
    <div id="note">Note:
    <span class="cir_note cir_mut"></span><span>&nbsp;Mutation&nbsp;&nbsp;&nbsp;</span>
    <span class="cir_note cir_meth"></span><span>&nbsp;Methylation&nbsp;&nbsp;&nbsp;</span>
    <span class="cir_note cir_mir"></span><span>&nbsp;miRNA&nbsp;&nbsp;&nbsp;</span>
    <span class="cir_note cir_lnc"></span><span>&nbsp;lncRNA&nbsp;&nbsp;&nbsp;</span>
    <span class="cir_note cir_msi"></span><span>&nbsp;MicroSatellite</span>
    </div>

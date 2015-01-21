	<!-- php调用javacript -->
    <script type="text/javascript">
 
        $(document).ready(function () {
            // prepare the data
            var theme = 'energyblue';
      
            var source =
            {
                 datatype: "json",
                 datafields: [
					 
					 {name: 'pub_id', type: 'string'},
                      { name: 'disease_id', type: 'string'},
                      { name: 'disease_name', type: 'string'},
                      { name: 'cell_id', type: 'string'},
                      { name: 'cell_name', type: 'string'},
                      { name: 'gene_id', type: 'string'},
                      { name: 'gene_name', type: 'string'},
                      { name: 'pmid', type: 'string'},
                      { name: 'detail', type: 'string'},
                ],
			     url: 'data.php?table='+ "meth_view" +'&colName=drug_id'+ '&value=' + '<?php echo $drug_id; ?>',
				cache: false,
				filter: function()
				{
					// update the grid and send a request to the server.
					$("#meth").jqxGrid('updatebounddata', 'filter');
				},
				sort: function()
				{
					// update the grid and send a request to the server.
					$("#meth").jqxGrid('updatebounddata', 'sort');
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
	
            // initialize jqxGrid
            $("#meth").jqxGrid(
            {		
                source: dataadapter,
                 width:930,
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
				autorowheight: true,
				pagesize: 10,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				rendergridrows: function(obj)
				{
					 return obj.data;    
				},
			    columns: [
                       { text: 'disease_name', datafield: 'disease_name', width: 200},
               { text: 'cell_name', datafield: 'cell_name', width: 120},
                { text: 'gene_name', datafield: 'gene_name', width:120},
               { text: 'pmid', datafield: 'pmid', width: 90},
               { text: 'detail', datafield: 'detail', width: 400},
                  ]
            });
        });
    </script>

   
        <!-- <div id="meth" class='factor'></div> -->
 


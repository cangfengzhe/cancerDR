
	<!-- php调用javacript -->
    <script type="text/javascript">
    <?php 

    ?>
        $(document).ready(function () {
            // prepare the data
            var theme = 'energyblue';
      
            var source =
            {
                 datatype: "json",
                 datafields: [
					 { name: 'id', type: 'string'},
					 { name: 'other_name', type: 'string'},
					 { name: 'all_id', type: 'string'},
					 { name: 'gene_name', type: 'string'},
					 { name: 'type', type: 'string'}
                ],
			    url: 'data.php?table=info_gene_transcript&colName=other_name' + '&value=' + "<?php echo $_GET['value']; ?>" ,
				
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
				width: 900,
				autorowheight: true,
				rendergridrows: function(obj)
				{
					 return obj.data;    
				},
			    columns: [
                      // { text: 'Drug ID' , datafield:'<a href="./drug.php?drugID=afd'">drugID</a>', width: 200 , cellsrenderer:cellsrenderer},
                      { text: 'Search Value', datafield: 'other_name', width: 380 },
                       
                      { text: 'Name', datafield: 'gene_name', width: 200,cellsrenderer: multi_link },
                      { text: 'ID', datafield: 'all_id', width: 130 ,cellsrenderer: multi_link},
                      // { text: 'Search Value', datafield: 'other_name', width: 330 ,renderer:columnsrenderer},
                      // { text: 'Pubchem ID', datafield: 'pubchem_id', width: 150 ,renderer:columnsrenderer},
                      { text: 'type', datafield: 'type', width: 190 }
                  ]
            });
        });
    </script>

    <div id='jqxWidget'>
        <div id="jqxgrid"></div>
    </div>


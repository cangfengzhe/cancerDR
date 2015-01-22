	<!-- php调用javacript -->
    <script type="text/javascript">
 
        $(document).ready(function () {
            // prepare the data
            var theme = 'energyblue';
      		var colName = '<?php echo $colName; ?>';
            var source =
            {
                 datatype: "json",
                 datafields: [
					 
					 
                      { name: 'disease_id', type: 'string'},
                      { name: 'disease_name', type: 'string'},
                      { name: 'cell_id', type: 'string'},
                      { name: 'cell_name', type: 'string'},
                      { name: 'ms_id', type: 'string'},
                      { name: 'ms_name', type: 'string'},
                      { name: 'pmid', type: 'string'},
                      { name: 'detail', type: 'string'},
                ],
			     url: 'data.php?table='+ "ms_view" +'&colName='+ colName + '&value=' + '<?php echo $value; ?>',
				
				cache: false,
				filter: function()
				{
					// update the grid and send a request to the server.
					$("#ms").jqxGrid('updatebounddata', 'filter');
				},
				sort: function()
				{
					// update the grid and send a request to the server.
					$("#ms").jqxGrid('updatebounddata', 'sort');
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
			var disease_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata){
				
				return '<div style="margin:10px  10px;"><a href="/disease.php?diseaseid=' + rowdata.disease_id + '">'+value+'</a></div>';
			}
			var cell_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata){
				
				return '<div style="margin:10px  10px;"><a href="/cell.php?cellid=' + rowdata.cell_id + '">'+value+'</a></div>';
			}
			
			var pub_link = function(row, columnfield, value, defaulthtml, columnproperties, rowdata){
				
				return '<div style="margin:10px  10px;"><a href="http://www.ncbi.nlm.nih.gov/pubmed/?term=' + rowdata.pmid + '">'+value+'</a></div>';
			}

            // initialize jqxGrid
            $("#ms").jqxGrid(
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
                    { text: 'Disease', datafield: 'disease_name', width: 200, cellsrenderer:disease_link},
               		{ text: 'Cell Line', datafield: 'cell_name', width: 120, cellsrenderer:cell_link},
                	{ text: 'Microsatelite', datafield: 'ms_name', width:120, cellsrenderer:term_link},
               		{ text: 'pmid', datafield: 'pmid', width: 90, cellsrenderer: pub_link},
               		{ text: 'Detail', datafield: 'detail', width: 400},
                  ]
            });
        });
    </script>

   
        <!-- <div id="meth" class='factor'></div> -->
 


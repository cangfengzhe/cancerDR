	<!-- php调用javacript -->
    <script type="text/javascript">

        $(document).ready(function () {
            // prepare the data
            var theme = 'energyblue';
      		var colName = '<?php echo $colName;?>';
            var source =
            {
                 datatype: "json",
                 datafields: [
				{ name: 'gene_id' , type: 'string'},
				{name: 'c,renderer:columnsrendererell_id', type: 'string'},

				{name: 'cell_name', type: 'string'},
				{ name: 'gene_name' , type: 'string'},
				{ name: 'cn' , type: 'string'},
				{ name: 'mut_aa' , type: 'string'},
				{ name: 'mut_cds' , type: 'string'},
				{ name: 'mut_desc' , type: 'string'},
				{ name: 'mut_pos' , type: 'string'}
                ],
			     url: 'data.php?table='+ "mut_view" +'&colName='+ colName + '&value=' + '<?php echo $value;?>',

				cache: false,
				filter: function()
				{
					// update the grid and send a request to the server.
					$("#mut").jqxGrid('updatebounddata', 'filter');
				},
				sort: function()
				{
					// update the grid and send a request to the server.
					$("#mut").jqxGrid('updatebounddata', 'sort');
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
            if(colName == 'drug_id'){
            	$("#mut").jqxGrid(
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
				autorowheight: true,
				pagesize: 10,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				rendergridrows: function(obj)
				{
					 return obj.data;
				},
			    columns: [
                    { text: 'Cell Line', datafield: 'cell_name', width: 150, cellsrenderer:cell_link,renderer:columnsrenderer},
               	  		{ text: 'Gene Name', datafield: 'gene_name', width: 120, cellsrenderer:gene_link,renderer:columnsrenderer },
						  { text: 'Copy Numer', datafield: 'cn', width: 100 ,renderer:columnsrenderer},
						  { text: 'AA Mutation', datafield: 'mut_aa', width: 180 ,renderer:columnsrenderer},
						  // { text: 'mut_cds', datafield: 'mut_cds', width: 200 },
						  { text: 'Description', datafield: 'mut_desc', width: 200 ,renderer:columnsrenderer},
						  { text: 'Position', datafield: 'mut_pos', width: 250 ,renderer:columnsrenderer},
						 ]
            });
            }

            if(colName == 'cell_id'){
            	 $("#mut").jqxGrid(
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
				autorowheight: true,
				pagesize: 10,
				enablehover: false,
				enablebrowserselection:'enable', //是否可以选中字体
				rendergridrows: function(obj)
				{
					 return obj.data;
				},
			    columns: [
                   			// { text: 'Drug', datafield: 'drug_name', width: 120, cellsrenderer:drug_link },

						  { text: 'Gene Name', datafield: 'gene_name', width: 150, cellsrenderer:gene_link ,renderer:columnsrenderer},
						  { text: 'Copy Numer', datafield: 'cn', width: 120 ,renderer:columnsrenderer},
						  { text: 'AA Mutation', datafield: 'mut_aa', width: 230 ,renderer:columnsrenderer},
						  { text: 'Description', datafield: 'mut_desc', width: 250,renderer:columnsrenderer },
						  { text: 'Position', datafield: 'mut_pos', width: 250,renderer:columnsrenderer },
						  ]
            });
            }
                 if(colName == 'gene_id'){
            	 $("#mut").jqxGrid(
            {
                source: dataadapter,,renderer:columnsrenderer                width:1000,
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
                   			// { text: 'Drug', datafield: 'drug_name', width: 120, cellsrenderer:drug_link },

						  { text: 'Cell Name', datafield: 'cell_name', width: 150, cellsrenderer:cell_link ,renderer:columnsrenderer,
						  { text: 'Copy Numer', datafield: 'cn', width: 120,renderer:columnsrenderer},
						  { text: 'AA Mutation', datafield: 'mut_aa', width: 230,renderer:columnsrenderer},
						  { text: 'Description', datafield: 'mut_desc', width: 250,renderer:columnsrenderer},
						  { text: 'Position', datafield: 'mut_pos', width: 250,renderer:columnsrenderer},
						  ]
            });
            }
        });
    </script>






    <link rel="stylesheet" href="/css/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="/css/jqx.energyblue.css" type="text/css" />

    <!-- <link rel="stylesheet" href="../../jqwidgets/styles/jqxcustom.css" type="text/css" /> -->
    <script type="text/javascript" src="./js/jquery-1.10.2.min.js"></script> 
	<script type="text/javascript" src="./js/jqxcore.js"></script>
    <script type="text/javascript" src="./js/jqxbuttons.js"></script>
    <script type="text/javascript" src="./js/jqxscrollbar.js"></script>
    <script type="text/javascript" src="./js/jqxmenu.js"></script>
    <script type="text/javascript" src="./js/jqxgrid.js"></script>
    <script type="text/javascript" src="./js/jqxgrid.selection.js"></script>	
	<script type="text/javascript" src="./js/jqxgrid.filter.js"></script>	
	<script type="text/javascript" src="./js/jqxgrid.sort.js"></script>		
    <script type="text/javascript" src="./js/jqxdata.js"></script>	
	<script type="text/javascript" src="./js/jqxlistbox.js"></script>	
	<script type="text/javascript" src="./js/jqxgrid.pager.js"></script>		
	<script type="text/javascript" src="./js/jqxdropdownlist.js"></script>
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
			     url: 'data.php?table='+ "meth_view" +'&colName=drug_id'+ '&value=' + "13",
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

    <div id='jqxWidget'>
        <div id="jqxgrid"></div>
    </div>


 	<script type="text/javascript" src="./jquery-1.10.2.min.js"></script>  
	<script type="text/javascript" src="./jqxcore.js"></script>
    <script type="text/javascript" src="./jqxbuttons.js"></script>
    <script type="text/javascript" src="./jqxscrollbar.js"></script>
    <script type="text/javascript" src="./jqxmenu.js"></script>
    <script type="text/javascript" src="./jqxgrid.js"></script>
    <script type="text/javascript" src="./jqxgrid.selection.js"></script>	
	<script type="text/javascript" src="./jqxgrid.filter.js"></script>	
	<script type="text/javascript" src="./jqxgrid.sort.js"></script>		
    <script type="text/javascript" src="./jqxdata.js"></script>	
	<script type="text/javascript" src="./jqxlistbox.js"></script>	
	<script type="text/javascript" src="./xgrid.pager.js"></script>		
	<script type="text/javascript" src="./jqxdropdownlist.js"></script>
	<!-- php调用javacript -->
    <script type="text/javascript">
        $(document).ready(function () {
            // prepare the data
            var theme = 'darkblue';
      
            var source =
            {
                 datatype: "json",
                 datafields: [
					 
					 { name: 'var1', type: 'double'},
					 { name: 'var2', type: 'string'},
					 { name: 'var3', type: 'string'},
					 { name: 'var4', type: 'string'}
                ],
			    url: 'data.php?table='+ "<?php echo $_GET['type']; ?>" + '&q=' + "<?php echo $_GET['name']; ?>",
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
				pageable: true,
				virtualmode: true,
				// height:300,
				selectionmode: 'none',
				enablebrowserselection:'enable', //是否可以选中字体
				autoheight: true,
				width: 700,
				rendergridrows: function(obj)
				{
					 return obj.data;    
				},
			    columns: [
                      { text: 'lie1', datafield: 'var1' , width: 200 },
                      { text: 'lie2', datafield: 'var2', width: 200 },
                      { text: 'Address', datafield: 'var3', width: 200 },
                      { text: 'City', datafield: 'var4', width: 100 }
                  ]
            });
        });
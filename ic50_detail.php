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
				 {name: 'cell_id', type: 'string'},
                    { name: 'cell_name', type: 'string'},
                    { name: 'drug_name', type: 'string'},
                    { name: 'drug_id', type: 'string'},
                   { name: 'IC25', type: 'float'},
                    { name: 'IC50', type: 'float'},
                   { name: 'IC75', type: 'float'},
                   { name: 'IC90', type: 'float'},
                    { name: 'Z_Score', type: 'float'},
                   	{ name : 'type', type: 'float'}
                ],
			     url: 'data.php?table='+ "ic50" +'&colName='+ colName + '&value=' + '<?php echo $value; ?>',
				
				cache: false,
				filter: function()
				{
					// update the grid and send a request to the server.
					$("#ic50").jqxGrid('updatebounddata', 'filter');
				},
				sort: function()
				{
					// update the grid and send a request to the server.
					$("#ic50").jqxGrid('updatebounddata', 'sort');
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
		var crossRef=function(row, columnfield, value, defaulthtml, columnproperties, rowdata) {
   if(value==-1){
   	return '<div style="background-color:blue">'+value+'</div>';
   }
   else if(value == 1){
   	return '<div style="background-color:red">'+value+'</div>';
   }	
}
          

            
            	 $("#ic50").jqxGrid(
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
                   
               			 
						        // { text: 'cell_id', datafield: 'cell_id', width: 150},
                { text: 'Drug', datafield: 'drug_name', width: 150, cellsrenderer:drug_link},
               { text: 'Log(ic25)', datafield: 'IC25', width: 150},
                { text: 'Log(ic50)', datafield: 'IC50', width: 150},
               { text: 'Log(ic75)', datafield: 'IC75', width: 150},
               { text: 'Log(ic90)', datafield: 'IC90', width: 150},
                  { text: 'Z-Score', datafield: 'Z_Score', width: 150 },
                  { text: 'type', datafield: 'type', width:50, cellsrenderer:crossRef}
              ]
            });
           
            
        });
    </script>

   
      
 


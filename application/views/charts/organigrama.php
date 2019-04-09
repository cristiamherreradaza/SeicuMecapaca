<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {packages:["orgchart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');

        // For each orgchart box, provide the name, manager, and tooltip to show.
        //obtiene el valor del ultimo nivel del organigrama
        var cant='<?php echo $nivel->nivel; ?>';
        
        data.addRows([
          //level one       

          <?php foreach ($data_chart as $tp) : ?>           
              ['<?php echo $tp->unidad; ?>', '<?php echo $tp->jefe; ?>', ''],  
          <?php endforeach; ?>          
        ]);

        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div_pmgm'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {allowHtml:true});
      }
   </script>
    </head>
  <body>
    <div id="chart_div_pmgm"></div>
  </body>
</html>
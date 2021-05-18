




















<?php
include("../config.php");

    
$chart = new PieChart(500, 250);
$db = config::getConnexion();
$select_stmt=$db->prepare("SELECT (SELECT count(*) FROM utilisateur WHERE gender='Male') AS Male, (SELECT count(*) FROM utilisateur WHERE gender='Female') AS Female"); // sql select query
$select_stmt->execute();
$chart->getConfig()->setSortDataPoint(false);

$data = $select_stmt->fetchAll();

$male=$data[0]['Male'];
$female=$data[0]['Female'];
 $dataPoints = array( 
     array("label"=>"Homme", "y"=>$male),
     array("label"=>"Femme", "y"=>$female)
     
 )
  
 ?>
 <!DOCTYPE HTML>
 <html>
 <head>
 <script>
 window.onload = function() {
  
  
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     title: {
         text: "Usage Share of Desktop Browsers"
     },
     subtitles: [{
         text: "November 2017"
     }],
     data: [{
         type: "pie",
         yValueFormatString: "#,##0.00\"%\"",
         indexLabel: "{label} ({y})",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
 </script>
 </head>
 <body>
 <div id="chartContainer" style="height: 370px; width: 100%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 </body>
 </html>   
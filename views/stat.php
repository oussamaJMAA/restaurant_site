<?php
    require_once 'libchart/libchart/classes/libchart.php';
    include("../config.php");
    header("Content-type: image/png");
    
    $chart = new PieChart(500, 250);
$db = config::getConnexion();
$select_stmt=$db->prepare("SELECT (SELECT count(*) FROM utilisateur WHERE gender='Male') AS Male, (SELECT count(*) FROM utilisateur WHERE gender='Female') AS Female"); // sql select query
$select_stmt->execute();
    $chart->getConfig()->setSortDataPoint(false);
    
$data = $select_stmt->fetchAll();

$male=$data[0]['Male'];
$female=$data[0]['Female'];
$dataSet = new XYDataSet();
$dataSet->addPoint(new Point("Male", $male));
$dataSet->addPoint(new Point("Female", $female));
$chart->setDataSet($dataSet);

$chart->setTitle("Number of Female and Male");
$chart->render();

/*
    $dataSet = new XYDataSet();
    $dataSet->addPoint(new Point("Item 1 (20)", 20));
    $dataSet->addPoint(new Point("Item 2 (50)", 50));
    $dataSet->addPoint(new Point("Item 3 (30)", 30));
    $dataSet->addPoint(new Point("Item 4 (70)", 70));
    $chart->setDataSet($dataSet);
    
    $chart->setTitle("This example preserves item order");
    $chart->render();*/
?>
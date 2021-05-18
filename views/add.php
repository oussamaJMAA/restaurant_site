<?php
require_once 'libchart/libchart/classes/libchart.php';
include("../config.php");

$chart = new PieChart(500, 300);
$db = config::getConnexion();
$select_stmt=$db->prepare("SELECT (SELECT count(*) FROM utilisateur WHERE gender='Male') AS Male, (SELECT count(*) FROM utilisateur WHERE gender='Female') AS Female"); // sql select query
$select_stmt->execute();



$data = $select_stmt->fetchAll();

$male=$data[0]['Male'];
$female=$data[0]['Female'];
$dataSet = new XYDataSet();
$dataSet->addPoint(new Point("Male", $male));
$dataSet->addPoint(new Point("Female", $female));
$chart->setDataSet($dataSet);

$chart->setTitle("Number of Female and Male");
$chart->render();













?>
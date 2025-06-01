<?php

include('koneksi.php');

$sql = "
    SELECT 
        SUM(CASE WHEN voted = '1' THEN 1 ELSE 0 END) AS keisya,
        SUM(CASE WHEN voted = '2' THEN 1 ELSE 0 END) AS haekal,
        SUM(CASE WHEN voted = '3' THEN 1 ELSE 0 END) AS herlina
    FROM users;
";
$result = $conn->query($sql);

$dataPoints = array();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $dataPoints = array(
        array("y" => $row["keisya"], "label" => "Keisya"),
        array("y" => $row["haekal"], "label" => "Haekal"),
        array("y" => $row["herlina"], "label" => "Herlina")
    );
} else {
    echo "Tidak ada data yang ditemukan";
}

$conn->close();
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 var chart = new CanvasJS.Chart("chartContainer", {
	 animationEnabled: true,
	 title:{
		 text: "Jumlah Suara Kandidat"
	 },
	 axisY: {
		 title: "Jumlah Suara",
		 includeZero: true
	 },
	 data: [{
		 type: "bar",
		 indexLabel: "{y}",
		 indexLabelPlacement: "inside",
		 indexLabelFontWeight: "bolder",
		 indexLabelFontColor: "white",
		 dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	 }]
 });
 chart.render();
  
 }
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<!-- <script>
    setTimeout(function(){
        location.reload();
    }, 5000); // Refresh halaman setiap 5 detik
</script> -->
</body>
</html>
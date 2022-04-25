<?php include("header.php");?>
<?php require_once("db_connection.php");?>
<?php require_once("functions.php");?>

<?php if (isset($_GET["stock"])) {
									$stock = $_GET["stock"];
									$test=test($_GET["stock"]);
									$count=find_no_of_fields($stock, "open");
									$open_actual=find_data_for_stock($stock, "open");
									$open_predict=find_data_for_stock($stock, "open_mov_av");
									$close_actual=find_data_for_stock($stock, "close");
									$compare_new=0;
									$compare_new=$open_actual[1];
									$sum_actual=0;
									$sum_predict=0;
									for($i=2 ;$i<$count;$i++){
										$sum_actual=$sum_actual + $open_actual[$i];
										$sum_predict=$sum_predict + $open_predict[$i];
									}
									$avg_actual=$sum_actual/($count-2);
									$avg_predict=$sum_predict/($count-2); 
									
									$compare=($test[9][3]+$test[9][4])/2;
								}
?>

<style>
body {
  background-image: url('images/recom3.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
  
}
div{
	font-size: 20px;
  text-align: center;
  font-style: italic;
  color: yellow;

}
h1{
	font-size: 40px;
  text-align: center;
  font-style: italic;
  color: yellow;
  text-decoration: underline;
}
</style>
<body>

<h1>Accuracy</h1>
<div style="margin: 50px">
<?php if(isset($_GET['stock'])) { 
			if($compare > $compare_new){
					$result=(($compare-$compare_new)/$compare_new)*100;
					echo "The accuracy for ". strtoupper($_GET['stock']) ." stocks is ".(100-$result)."<br>"; 
			}
			else if($compare < $compare_new){
					$result=(($compare_new-$compare)/$compare)*100;
					echo "The accuracy for ". strtoupper($_GET['stock']) ." stocks is ".(100-$result)."<br>";
			}
}?>
</div>
<table border="1">
<tr><td>Count</td>
	<td>Open Price</td>
	<td>Close Price</td>
</tr>

<?php
								echo "Open Price new=".$open_actual[1]."---------------------------------------"." Close Price new=".$close_actual[1]."<br>";
								for($i=2 ;$i<$count;$i++){
										echo "<tr><td>".($i-1)."</td><td>".$open_actual[$i]."</td><td>".$close_actual[$i]."</td></tr>";
									}
?>
</table>
</body>
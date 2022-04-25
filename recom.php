
<style>
body {
  background-image: url('images/recom3.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed; 
  background-size: 100% 100%;
  font-size: 50px;
  text-align: center;
  font-style: italic;
  color: yellow;
  text-decoration: underline;
}
div{
	text-align: center;
}
</style>
<body>

<h1>RECOMMENDATION</h1>
<div style="margin: 50px">
<?php if($_GET['stock']&& $_GET['diff']>0) { 
		echo "It is recommended to invest in the ". strtoupper($_GET['stock']) ." stocks.";
} else if($_GET['stock']&& $_GET['diff']<0) {
		echo "It is recommended <b>NOT</b> to invest in the ". strtoupper($_GET['stock']) ." stocks.";
} ?>
<div>
</body>
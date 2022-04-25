<?php include("header.php");?>
<?php require_once("db_connection.php");?>
<?php require_once("functions.php");?>
<html>
<body>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>

<script>
function popup() {
	var modal = document.getElementById("myModal");
	var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

  modal.style.display = "block";
}

// Get the modal


// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</head>
<!-- Header -->
      <div id="header" class="skel-panels-fixed">

        <div class="top">

          <!-- Logo -->
            <div id="logo">
              <a href="index.php"><span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span></a>
              <a href="index.php"><h1 id="title">&lt;Arpit, Shahvez & Alok presenting you &gt;</h1></a>
              <span class="byline">Predicting The Unpredictable</span>
            </div>

          <!-- Nav -->
            <nav>
              <ul>
                <li><a href="index.php"><span class="icon icon-home">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a></li>
                
              </ul>
            </nav>
            <nav id="nav">
              <ul>
                
                <li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="icon icon-th">Opening Price Prediction</span></a></li>
                <li><a href="#closing" id="portfolio-link" class="skel-panels-ignoreHref"><span class="icon icon-th">Closing Price Prediction</span></a></li>
                
              </ul>
            </nav>
			
			<nav>
				<ul>
					
					<?php 
								if (isset($_GET["stock"])) {
									$stock = $_GET["stock"];
									$rec=recommendation($stock);
								
								} 
								//echo $rec;
								if($rec>0){
							?>
							
								<button id="myBtn" style="width:245px; height: 30px; "><a href="recom.php?stock=<?php echo $stock; ?>&diff=<?php echo $rec;?>">Recommendation</a></button> 
							<?php } 
							else{ ?>
				
								<button id="myBtn" style="width:245px; height: 30px; "><a href="recom.php?stock=<?php echo $stock; ?>&diff=<?php echo $rec;?>">Recommendation</a></button>
							<?php } ?>
							<button id="myBtn" style="width:245px; height: 30px; "><a href="accuracy.php?stock=<?php echo $stock; ?>">Accuracy</a></button>
				
				<div id="myModal" class="modal">
					  <!-- Modal content -->
					  <div class="modal-content">
						<span class="close">&times;</span>
						<p>Some text in the Modal..</p>
					  </div>

					</div>
						
				</ul>
			</nav>
            
        </div>
        
        <div class="bottom">

          <ul class="icons">
              <li><a href="http://www.facebook.com" target="_blank" class="icon icon-facebook"><span>Facebook</span></a></li>
              <li><a href="https://github.com" target="_blank" class="icon icon-github"><span>Github</span></a></li>
              <li><a href="mailto:kumararpit13@gmail.com" class="icon icon-envelope"><span>Email</span></a></li>
            </ul>
        </div>
      
      </div>

      <div id="main">
			
				<!-- Intro -->
					<section id="top" class="one">
						<div class="container">
						<header><h3>Opening Price Prediction For <?php echo strtoupper($_GET["stock"]);?></h3></header>
						<?php
	
							if (isset($_GET["stock"])) {
								$stock = $_GET["stock"];
								predict_for_opening_price($stock);
							}

						?>

						</div>
					</section>
					<section id="closing" class="two">
						<div class="container">
						<header><h3>Closing Price Prediction For <?php echo strtoupper($_GET["stock"]);?></h3></header>

								<?php
			
									if (isset($_GET["stock"])){
										$stock = $_GET["stock"];
										predict_for_closing_price($stock);
										
									}

								?>

						</div>
					</section>
		</div>

	</body>
</html>

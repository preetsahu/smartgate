<?php
function tiny($url){
	$tiny = file_get_contents("http://tinyurl.com/api-create.php?url=$url");
	return $tiny;
}
 ?>

<!DOCTYPE HTML>
	<html>
	<!-- <img src="http://tinyurl.com/y8zsvy3u" alt="img">  http://tinyurl.com/api-create.php?url= -->
	<title>Generate QRCode</title>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	</head>
	<body>
		<div class="w3-container w3-center w3-blue">
			<h1>Generate QR</h1>
		</div>

		<br>
		<!-- <center>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-3641343196914554"
		     data-ad-slot="5783482020"
		     data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		</center> -->
		<br>

		<div class="w3-content">
			<!-- <h1>What you want to create?</h1><hr> -->
				<form method="post" action="qr.php">
					<div class="w3-row">
							<a href="javascript:void(0)" onclick="openCity(event, 'text');">
								<div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Text
								</div>
							</a>
					</div>

					<div id="text" class="w3-container city" style="display:none">
						<br><h2>Text</h2><br>
						<input type="text" name="text" class="w3-input" placeholder="Write Something!" required><br>
							<input type="submit" name="submit_text" class="w3-blue w3-btn w3-hover-blue w3-round" value="submit">
						</div>
					</div>
				</form>
		</div>
					<?php
						if (isset($_POST['submit_text'])) 
						{
							$text = urlencode($_POST['text']);
							$create_qr_txt = tiny("https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl=$text");
							echo "<img src='$create_qr_txt'>";
						}

					?>
		<div class="w3-footer w3-center w3-blue w3-bottom">
			<h4></h4>
		</div>
</body>

		<script>
					function openCity(evt, cityName) {
					  var i, x, tablinks;
					  x = document.getElementsByClassName("city");
					  for (i = 0; i < x.length; i++) {
					     x[i].style.display = "none";
					  }
					  tablinks = document.getElementsByClassName("tablink");
					  for (i = 0; i < x.length; i++) {
					     tablinks[i].className = tablinks[i].className.replace(" w3-border-blue", "");
					  }
					  document.getElementById(cityName).style.display = "block";
					  evt.currentTarget.firstElementChild.className += " w3-border-blue";
					}
		</script>

</html>

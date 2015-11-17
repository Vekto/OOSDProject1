<!DOCTYPE html>

<html>

<head>

<title>Travel Experts</title>
<link rel="stylesheet" type="text/css" href="style.css">
<!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
  <![endif]-->
  <script type="text/javascript">

  //slide the packages 

  function show()
  {
  	if (document.getElementById("expand").style.display == "block")
  	 {
  	 	document.getElementById("expand").style.display = "none";
  	 }
  	 else
  	 {
  	 	document.getElementById("expand").style.display = "block";

  	 }

  }

  function show2()
  {
  	if (document.getElementById("expand2").style.display == "block")
  	 {
  	 	document.getElementById("expand2").style.display = "none";
  	 }
  	 else
  	 {
  	 	document.getElementById("expand2").style.display = "block";

  	 }

  }

  function show3()
  {
  	if (document.getElementById("expand3").style.display == "block")
  	 {
  	 	document.getElementById("expand3").style.display = "none";
  	 }
  	 else
  	 {
  	 	document.getElementById("expand3").style.display = "block";

  	 }

  }

  function show4()
  {
  	if (document.getElementById("expand4").style.display == "block")
  	 {
  	 	document.getElementById("expand4").style.display = "none";
  	 }
  	 else
  	 {
  	 	document.getElementById("expand4").style.display = "block";

  	 }

  }


  </script>
</head>

<body>
<?php
  	include("header.php");

 ?> 	
	<div id="main_container">
	<!--WRITE YOUR CODE BELOW THIS LINE-->

<div id="center_packages">
		<h1>All Inclusive Packages</h1>


<input class="toggle-box" id="header1" type="checkbox" />

<label for="header1">
<div id="pac1"><img src="Images/Pcaribbean.jpg" width="350px;" height="85px;"></div>
<i style="padding-left:20px;">Cruise the Caribbean & Celebrate the New Year </i><br/>
<h1 style="padding-left:40px;">CAD $4800.00 </h1>

</label>

<div id="package_holder1">
	<!--<div class="holiday">
		<br/>
		<img src="Images/Pcaribbean.jpg" width="900px" >
	</div>-->

	<p>
		Travel Experts offers the best deals on luxury Caribbean vacation packages to some of the most popular Caribbean destinations. Escape to beautiful beaches, glorious sunshine, crystal clear waters, picturesque landscapes, and tropical breezes, and experience the ultimate in Caribbean vacations. With so much to do, see, and experience for all ages, it's no wonder the Caribbean is one of the world's most popular vacation destinations.

	</p>
	<input type="submit" value="Book Today"/>
</div>

<input class="toggle-box" id="header2" type="checkbox" />

<label for="header2">
<div id="pac2"><img src="Images/Phawaii.jpg" width="350px;" height="85px;"></div>
<i style="padding-left:20px;">8 Day All Inclusive Hawaiian Vacation </i><br/>
<h1 style="padding-left:40px;">CAD $3000.00 </h1>

</label>

<div id="package_holder2">
	<!--<div class="holiday">
		<br/>
		<img src="Images/Phawaii.jpg" width="900px" >
	</div>-->

	<p>
		The biggest island in the United States is a tropical paradise where you can swim , hike and explore volcanoes. Rent a car to see the island, as public transportation is limited to the larger towns. Rental operators can be found at both of Hawaii Islandâ€™s international airports, and from the Hilo and Kailua-Kona townships. Driving is the easiest way to travel across the island to visit all of the major attractions, including the remote PololÅ« Valley Outlook, and the Hawaii Volcanoes National Park

	</p>
	<input type="submit" value="Book Today"/>
</div>

<input class="toggle-box" id="header3" type="checkbox" />

<label for="header3">
<div id="pac3"><img src="Images/nepal.jpg" width="350px;" height="85px;"></div>
<i style="padding-left:20px;">Asian Expedition: Airfaire, Hotel and Eco Tour </i><br/>
<h1 style="padding-left:40px;">CAD $2800.00 </h1>

</label>

<div id="package_holder3">
	<!--<div class="holiday">
		<br/>
		<img src="Images/nepal.jpg" width="900px" >
	</div>-->

	<p>
		Evergreen Tours offers the best vacation packages to the most spectacular destinations beyond Himalayas including Nepal, Tibet, and Bhutan.
Our all inclusive and affordable vacation packages feature the fine lodging, jungle safari in National Parks of Nepal, trekking in Himalayas, overland trip to Tibet, cultural tour in Bhutan and more.
Our vacation packages are designed & developed with best touring ingredient that makes your family vacations or small & big group travel a memorable experience of life time.


	</p>
	<input type="submit" value="Book Today"/>
</div>

<input class="toggle-box" id="header4" type="checkbox" />
<label for="header4">
<div id="pac4"><img src="Images/Peurope.jpg" width="350px;" height="85px;"></div>
<i style="padding-left:20px;">Euro Tour with Rail Pass and Travel Insurance </i><br/>
<h1 style="padding-left:40px;">CAD $3000.00 </h1>

</label>

<div id="package_holder4">
	<!--<div class="holiday">
		<br/>
		<img src="Images/Peurope.jpg" width="900px" >
	</div>-->

	<p>
		Travel Experts offers an extensive collection of European vacations and several European vacation packages to meet your vacation needs. Find a selection of flights to some of the most popular European vacation destinations, and pair your Europe flight with a hotel and/or car rental for convenient Europe vacation packages. Customise Europe vacation packages with sightseeing tours and excursions and revel in the vacation of a lifetime. Plan your dream European vacation in advance or take advantage of last minute deals and cheap Car rental services to complete your European vacations.


	</p>
	<input type="submit" value="Book Today"/>
</div>


</div><!--center packages ends-->


	<!--WRITE YOUR CODE ABOVE THIS LINE-->
	</div>

	

	<?php


	  include("footer.php");
    ?>
	




</body>
</html>
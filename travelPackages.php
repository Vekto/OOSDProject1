<!DOCTYPE html>
<html>
  <head>

  <?php
    include_once("header.php");
    include_once("Functions.php");
    //fetch the script
    print(getJsPkgArray());
  ?>

  <script>
  var pkg = 0;
  //displays all the package information
  function displayPkg(pkg){
     document.getElementById("images").src = pkgArray[pkg].PkgImageUrl;
     document.getElementById("a").innerHTML = pkgArray[pkg].PkgName;
     document.getElementById("b").innerHTML = pkgArray[pkg].PkgStartDate;
     document.getElementById("c").innerHTML = pkgArray[pkg].PkgEndDate;
     document.getElementById("d").innerHTML = pkgArray[pkg].PkgDesc;
     document.getElementById("e").innerHTML = pkgArray[pkg].PkgBasePrice;
  }

  //rotates through packages
  function swapImage()
  {


     displayPkg(pkg);
     if(pkg < pkgArray.length - 1)
     {
     	pkg++;
     }
     else
     {
     	pkg = 0;
     }
     setTimeout("swapImage()",3000);
  }
  </script>
  <style>

  .pkgDisplay{
    display:inline-block;
    position:relative;
    top:90px;
    padding-bottom: 40px;
    margin-bottom: 40px;

  }
    #pkgImageContainer{
      margin-bottom:60px;


    }
    #pkgTable{
      position:absolute;
      top:90px;
      border-collapse: collapse;
      margin-left: 20px;

    }
  </style>

  </head>
  <body>

  <div class="pkgDisplay" id="pkgImageContainer">
  		<img width="800" id="images" height="400" name="slide" src=''  />
  </div>

  <table class="pkgDisplay" border="1" id="pkgTable">
    <tr>
      <th id="1">Package Name</th>
      <th id="2">Package Start Date</th>
      <th id="3">Package End Date</th>
      <th id="4">Description</th>
      <th id="5">Price</th>
    </tr>
    <tr>
      <td id="a"></td>
      <td id="b"></td>
      <td id="c"></td>
      <td id="d"></td>
      <td id="e"></td>
    </tr>


  <script>
    swapImage();
  </script>
  <table>
    <th>
  </table>


  </body>
  <?php

    include_once("footer.php");
   ?>

</html>

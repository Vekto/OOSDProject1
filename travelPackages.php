<!DOCTYPE html>
<html>
  <head>

  <?php
    include_once("header.php");
    include_once("Functions.php");
    //fetch the script
    print(getJsPkgArray());
  ?>
<br />
<br />
<br />
<br />
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
  function packageList()
  {
    contCount = 0;
    pkgCount=0;
    for (contCount = 0;contCount <= (pkgArray.length)/5;contCount++)
    {
      document.write("<div id =container" + contCount + " class='PackageContainer' style='visibility:hidden'>");
      for (i = 0; i <= 5; i++)
      {
        if(pkgCount <= pkgArray.length-1)
        {
          //alert(pkgArray.length);
          document.write("<input class='toggle-box' id=header'"+ pkgCount +"' type='checkbox' >");
          document.write("<label for='header" + pkgCount + "'>" + pkgArray[pkgCount].PkgName + "</label>");
          document.write("<div id=package_holder'" + pkgCount + "'>");
          document.write("<div class='holiday'>");
        	document.write("<br/>");
        	document.write("<img src='" + pkgArray[pkgCount].PkgImageUrl + "' width='900px' >");
        	document.write("</div>");
        	document.write("<p>" + pkgArray[pkgCount].pkgDesc + "</p>");
          document.write("<a href='Images/booking.php'>All Inclusive CAD '" + pkgArray[pkgCount].PkgBasePrice + "'</a></br>");
          document.write("</div>");
          pkgCount ++;
        }
      }
    }
    document.write("</div>");
  document.getElementById("container0").style.visibility="visible";
  }

  //rotates through package
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


  <script>
    packageList();
  </script>
  <table>
    <th>
  </table>


  </body>
  <?php

    include_once("footer.php");
   ?>

</html>

  <?php
    include_once("header.php");
    include_once("Functions.php");
    //fetch the script
    print(getJsPkgArray());
  ?>
  <script>
  var currentCont = 0;
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
  function prevCont()
  {
    document.getElementById("container" + currentCont).style.display= "none";
    currentCont--;
    document.getElementById("container" + currentCont).style.display= "initial";
    if (currentCont == 0)
    {
      document.getElementById("prevBtn").style.display="none";
    }
    else
    {
      document.getElementById("prevBtn").style.display="initial";
    }
    if (currentCont <= ((pkgArray.length/5)-1))
    {
      document.getElementById("nextBtn").style.display="initial";
    }
  }
  function nextCont()
  {
    document.getElementById("container" + currentCont).style.display= "none";
    currentCont++;
    document.getElementById("container" + currentCont).style.display= "initial";
    if (currentCont >= ((pkgArray.length/5)-1))
    {
      document.getElementById("nextBtn").style.display="none";
    }
    else
    {
      document.getElementById("nextBtn").style.display="initial";
    }
      document.getElementById("prevBtn").style.display="initial";
  }
  function firstCont()
  {
    document.getElementById("container" + currentCont).style.display= "none";
    currentCont = 0;
    document.getElementById("container" + currentCont).style.display= "initial";
    document.getElementById("prevBtn").style.display="none";
    if (pkgArray > 5)
    {
      document.getElementById("nextBtn").style.display="initial";
    }

  }
  function lastCont()
  {
    document.getElementById("container" + currentCont).style.display= "none";
    currentCont = Math.floor(pkgArray.length/5);
    document.getElementById("container" + currentCont).style.display= "initial";
    document.getElementById("nextBtn").style.display="none";
    if (currentCont != 0)
    {
      document.getElementById("prevBtn").style.display="initial";
    }
  }

  function packageList()
  {
    contCount = 0;
    pkgCount=0;
    for (contCount = 0;contCount <= (pkgArray.length)/5;contCount++)
    {
      document.write("<div id =container" + contCount + " class='PackageContainer' style='display:none'>");
      for (i = 0; i < 5; i++)
      {
        document.write("<div id='center_packages'>")
        if(pkgCount <= pkgArray.length-1)
        {
          //alert(pkgArray.length);
          document.write("<input class='toggle-box' class='packageHeader' id='header" + pkgCount + "' type='checkbox'/>");
          document.write("<label for='header" + pkgCount + "'>");
          document.write("<div class='pac' id='pac" + pkgCount + "'><img src=" + pkgArray[pkgCount].PkgImageUrl + " width='350px'; height='85px';></div>");
          document.write("<i style='padding-left:20px;'>" + pkgArray[pkgCount].PkgName + "</i><br/>");
          document.write("<h1 style='padding-left:40px;'>CAD $" + pkgArray[pkgCount].PkgBasePrice + "</h1>");
          document.write("</label>");
          document.write("<div class='package_holder' id='package_holder" + pkgCount + "'>");
          document.write("<p>" + pkgArray[pkgCount].PkgDesc + "</p>");
          document.write("<form action='Booking.php'><input type=hidden value='" + pkgArray[pkgCount].PackageId + "' name='packageId'/>");
          document.write("<input type='submit' value='Book Today'/>");
          document.write("</form>");
          document.write("</div>");

          pkgCount ++;
        }
        document.write("</div>");
      }
      document.write("</div>");
    }

  document.getElementById("container0").style.display="initial";
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

  <div id="main_container">


  <script>
    packageList();
  </script>
  <div align="center">
    <button onclick="firstCont()" id="firstBtn">FIRST</button>
      <button onclick="prevCont()" id="prevBtn" style='display:none;'>PREV</button>
  <button onclick="nextCont()" id="nextBtn">NEXT</button>
  <button onclick="lastCont()" id="lastBtn" >LAST</button>
</div>


</div>
  <?php

    include_once("footer.php");
   ?>

</html>

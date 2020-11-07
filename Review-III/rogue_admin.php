
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cyhome";

// Create connection
$conn = new mysqli($servername, $username,$password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


#1$2y$10$R7V5UR8M0K8Rp
#$2y$10$R7V5UR8M0K8Rp


?>



<style>
body {
  min-height: 100vh;
  padding:0px;
  margin:0px;
  border:0px black solid;
}

#article {
	min-height: 450px;
}
#create_div{
	padding-bottom:350px;
}
footer {
  position: relative;
  bottom: 0px;
  margin-top: 50px;
  width: 100%;
  
}
</style>
<html>

<head>

<link rel="icon" href="images\logo1.jpg">
	
	<meta charset="UTF-8">
	<meta http_equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<title>Admin dashboard</title>
	
	<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="cboard.css">
 
</head>
<body >
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
 
<!--   <img class="mr-auto rounded" src="logo1.jpg" height="40px" width="40px"> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-4">
      <li class="nav-item active">
        <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
      </li>
  </ul>
  	 <form class="form-inline my-2 my-lg-0 mr-auto frm">
      <input class="form-control mr-sm-0" type="search" onclick="location.href='advsearch.html'"  placeholder="Search" aria-label="Search" size="100%">
      <button class="btn btn-outline-light my-2 my-sm-0 ml-1" type="submit">Search</button>
    </form>
    <ul class="navbar-nav navbar-auto">
    	  
      <li class="nav-item">
        <a class="nav-link active mr-4" href="#">rogue server</a>
      </li>

       <li class="nav-item dropdown active ml-2 mr-4 ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Explore
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#contact">Contact us</a>
          <a class="dropdown-item" href="#contact">About</a>
          
        </div>
      </li>
      </ul>
   </div>
 </div>
</nav>
	
<div id="#article"  class="bg-light" style="min-height: 320px;">
<article  class="container bg-white shadow pt-5" style="min-height: 290px;">



<h2 align="left"><b>Admin Log</b></h2>
<hr width="95%" align="center">

<?php
			//echo '<ul style="list-style: none;" >';
			$querysub="select * from record";
			$resultsub=$conn->query($querysub);
			if($resultsub===false||mysqli_num_rows($resultsub)==0)
			{
				echo '<ul style="list-style: none;" ><li><div class="bid">

<span class="subject" style="color:#333333;" ><i>No visits yet. <b style="color: #008800">Good things take time!</b></i></span>

<button class="kn"  style="background-color: #00AA55; margin-right: 0px;position:relative;bottom:5px;" >&nbsp;&#9432;&nbsp;<i>Know more&nbsp;&nbsp;</i></button>


</div></li></ul><br><br>';
			}
			else
			{
				echo '<ul style="list-style: none;" >';
				while($rowsub = $resultsub -> fetch_assoc())
				{
				echo '<li><div class="bid"><b><span class="sellerid">'.$rowsub['ip'].'</span><span style="font-size: large;">&nbsp;:-&nbsp;&nbsp;</span>
					<span class="price">'.$rowsub['out_info'].'</span></b><br>
					<span class="subject" style="color: #333333;"><b>'.$rowsub['in_info'].'</b></span>
					<span class="description"><i>Input vector: '.$rowsub['arr_in'].'</i></span>
					<span class="description"><i>Output vector: '.$rowsub['arr_in'].'</i></span>
					<button class="kn">&nbsp;&#9432;&nbsp;<i>Know more&nbsp;&nbsp;</i></button>
					</div>
					</li>';
	
				}
				echo '</ul><br><br>';
			}
			
			//echo '</ul><br><br>';

?>

</article>



</div>


<!-- ///////////////////////////////////footer//////////////////////////////// -->


<footer  class="page-footer font-small mdb-color pt-4 bg-dark text-white">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Footer links -->
    <div class="row text-center text-md-left mt-3 pb-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
        <h6 class="text-uppercase mb-4 font-weight-bold">CyHome Corporation</h6>
        <p>A step towards Enchancement, Expansion and Economizing</p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3 text-white productso">
        <h6 class="text-uppercase mb-4 font-weight-bold">light</h6>
        <p>
          fan
        </p>
        <p>
          door
        </p>
        <p>
          curtain
        </p>
        <p>
          more to come
        </p>
      </div>
      <!-- Grid column -->

      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3 links text-white">
        <h6 class="text-uppercase mb-4 font-weight-bold"> Creators</h6>
        <p>
        R Senthil Kumar
        </p>
        <p>
        Nishkarsh
        </p>
        <p>
        Gunjan Kumar
        </p>
        
      </div>

      <!-- Grid column -->
      <hr class="w-100 clearfix d-md-none">

      <!-- Grid column -->
      <div id="contact" class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3 text-white text-left homefont">
        <h6 class="text-uppercase text-left mb-4 font-weight-bold">Contact</h6>
        <p>
          <i class="fas fa-home mr-3"></i> CyHome corporation</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> gkr54322@gmail.com</p>
       
        <p>
          <i class="fas fa-print mr-3"></i> +91 9752422440</p>
           <p>
          <i class="fas fa-print mr-3"></i> +91 7339659559</p>
      </div>
      <!-- Grid column -->

    </div>
    <!-- Footer links -->

    <hr>

    <!-- Grid row -->
    <div class="row d-flex align-items-center">

      <!-- Grid column -->
      <div class="col-md-7 col-lg-8">

        <!--Copyright-->
        <p class="text-center text-md-left">© 2020 Copyright:
          <a href="#!" class="text-white">
            <strong> CyHome</strong>
          </a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-5 col-lg-4 ml-lg-0">

        <!-- Social buttons -->
        <div class="text-center text-md-right socialo">
          <ul class="list-unstyled list-inline">
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-google-plus-g"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn-floating btn-sm rgba-white-slight mx-1">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>

        </div>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

</footer>

<!-- Footer -->


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="cboard.js"></script>

</body>
</html>

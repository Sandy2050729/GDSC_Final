
<?php
//DECLARE VARIABLES
$passphrase='pass';

//title insert
$cname=$_POST['cname'];
$name=$_POST['name'];
$contact=$_POST['contact'];
$email=$_POST['email'];  //db add
$address=$_POST['address'];
$county=$_POST['county'];
$username=$_POST['username'];
$pswd=$_POST['pswd'];
$confpswd=$_POST['pswd2'];
//CHECK WHETHER FIELD ARE EMPTY -- ifB
if($cname=="" or $name=="" or $contact=="" or $email=="" or $address=="" or $county=="" or $username=="" or $pswd==""){
echo "***All fields must be entered, hit back button and re-enter information";
}else{

//CHECK WHETHER PASSWORD IS EQUAL TO CONFIRM PASSWORD ENTERED
if($pswd!=$confpswd){//-ifA
	echo 'Passwords Entered are not similar. Please re-enter correct details';

}else{

//ESTABLISH CONNECTION
$con=mysqli_connect("localhost","root","","findb");
if(!$con){
	die('Could not connect: '.mysqli_error());
}
mysqli_select_db($con,"findb");

//INSERT INTO TABLE charity_key: name, Password, Username
$sql = "INSERT INTO charity_key VALUES(
 '$_POST[username]',
 SHA2('$_POST[pswd]',256)
)" ;


//CHECK FOR ERROR
if(!mysqli_query($con,$sql)){
	die('Error:'.mysqli_error($con));
}
//echo "Record for $_POST[name] added successfully";*/

//INSERT INTO TABLE charity_general_info: cname, name, address, Date_of_Employment
$sql2 = "INSERT INTO charity_general_info VALUES(
  '$_POST[cname]',
 '$_POST[name]',
 '$_POST[address]',
  '$_POST[county]'
)" ;
//CHECK FOR ERROR
if(!mysqli_query($con,$sql2)){
	die('Error:'.mysqli_error($con));
}
//echo "Record for $_POST[name] added successfully";*/
//AES_ENCRYPT('$_POST[countymp]','$passphrase')
//INSERT INTO TABLE charity_details: contact, email
$sql3 = "INSERT INTO charity_details VALUES(
 '$_POST[contact]',
 '$_POST[email]'
)" ;

//CHECK FOR ERROR
if(!mysqli_query($con,$sql3)){
	die('Error:'.mysqli_error($con));
}
echo "Record for $_POST[name] added successfully";
echo '<br/><a href="finalhome.html">Login Page</a>';

//END OF IF STATEMENT FOR PASSWORD - ifA
}
}//end of ifB
?>
<!DOCTYPE html>
<html lang="en">
<head>
 
  <title>Food Waste System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  body {
    font: 400 15px Lato, sans-serif;
    line-height: 1.8;
    color: #818181;
  }
  h2 {
    font-size: 24px;
    text-transform: uppercase;
    color: #303030;
    font-weight: 600;
    margin-bottom: 30px;
  }
  h4 {
    font-size: 19px;
    line-height: 1.375em;
    color: #303030;
    font-weight: 400;
    margin-bottom: 30px;
  }  
  .jumbotron {
    background-color: #33B5FF;
    color: #fff;
    padding: 100px 25px;
    font-family: Montserrat, sans-serif;
  }
  .container-fluid {
    padding: 60px 50px;
  }
  .bg-grey {
    background-color: #f6f6f6;
  }
  .logo-small {
    color: #33B5FF;
    font-size: 50px;
  }
  .logo {
    color: #33B5FF;
    font-size: 200px;
  }
  .thumbnail {
    padding: 0 0 15px 0;
    border: none;
    border-radius: 0;
  }
  .thumbnail img {
    width: 100%;
    height: 100%;
    margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
    background-image: none;
    color: #33B5FF;
  }
  .carousel-indicators li {
    border-color: #33B5FF;
  }
  .carousel-indicators li.active {
    background-color: #33B5FF;
  }
  .item h4 {
    font-size: 19px;
    line-height: 1.375em;
    font-weight: 400;
    font-style: italic;
    margin: 70px 0;
  }
  .item span {
    font-style: normal;
  }
  .panel {
    border: 1px solid #33B5FF; 
    border-radius:0 !important;
    transition: box-shadow 0.5s;
  }
  .panel:hover {
    box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
    border: 1px solid #33B5FF;
    background-color: #fff !important;
    color: #33B5FF;
  }
  .panel-heading {
    color: #fff !important;
    background-color: #33B5FF !important;
    padding: 25px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
    border-bottom-left-radius: 0px;
    border-bottom-right-radius: 0px;
  }
  .panel-footer {
    background-color: white !important;
  }
  .panel-footer h3 {
    font-size: 32px;
  }
  .panel-footer h4 {
    color: #aaa;
    font-size: 14px;
  }
  .panel-footer .btn {
    margin: 15px 0;
    background-color: #33B5FF;
    color: #fff;
  }
  .navbar {
    margin-bottom: 0;
    background-color: #33B5FF;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 4px;
    border-radius: 0;
    font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
    color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
    color: #33B5FF !important;
    background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
    border-color: transparent;
    color: #fff !important;
  }
  footer .glyphicon {
    font-size: 20px;
    margin-bottom: 20px;
    color: #33B5FF;
  }
  .slideanim {visibility:hidden;}
  .slide {
    animation-name: slide;
    -webkit-animation-name: slide;
    animation-duration: 1s;
    -webkit-animation-duration: 1s;
    visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
      width: 100%;
      margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
      font-size: 150px;
    }
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">Usiwaste</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="finalhome.html">ABOUT</a></li>
        <li><a href="foodaccepted.html">FOOD ACCEPTED</a></li>
        <li><a href="howitworks.html">HOW IT WORKS</a></li>
        <li><a href="signup.html">SIGN-UP</a></li>
        <li><a href="contacts.html">CONTACT</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1>The usiwaste initiative</h1> 
  <p>Tackling food waste and hunger through redistribution</p> 
  <form>
    <div class="input-group">
      <input type="email" class="form-control" size="50" placeholder="Email Address" required>
      <div class="input-group-btn">
        <button type="button" class="btn btn-danger">Subscribe</button>
      </div>
    </div>
  </form>
</div>

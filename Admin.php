<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];
if(empty($_SESSION['Email']))
{
header("location:index.php");
}
else
{
if($role=="Admin")
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
	body
	{
		background-image:url(background2.jpg);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
    font-family: serif;
        
	}
  #sub
  {
    font-weight: 600;
    font-size: 1.2em;
    color: red;
  }
</style>
<title>Project Management System</title>
</head>
<div>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 10px;">
  <a class="navbar-brand" href="#">ADMIN | </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="ADMIN/student.php">Add Student </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="ADMIN/faculty.php">Add Faculty </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="ADMIN/stsearch.php">Search Student </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="ADMIN/fa_search.php">Search Faculty </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="ADMIN/allocate.php">Allocate </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="ADMIN/report.php">Reports </a>
      </li>
    </ul>
    <ul class="nav justify-content-end">
      <li class="nav-item active">
      <a class="nav-link active" href="logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container" >
  <div class="jumbotron" style="opacity: 0.7;">
    <h1 class="display-4">Hello, CMRIT!</h1>
    <p class="lead">CMRIT is not just a college. It’s a community of pro-active students with ambitious dreams. A dream of a bright future. A dream of a successful life. And we, at CMRIT, provide our students with all the necessary tools and guidance to convert these dreams into actions.</p>
    <hr class="my-4">
    <p><span id="sub">Vision :</span><br>
  To be a nationally acclaimed and globally recognised institute of engineering, technology and management, producing competent professionals with appropriate attributes to serve the cause of the nation and of society at large.</p>
    <a class="btn btn-primary btn-lg" href="https://www.cmrit.ac.in/about-cmrit/" role="button">Learn more</a>
  </div>
</div>
</body>
</div>
</html>
 <?php
}
elseif($role=="Faculty")
{
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<style>
	body
	{
		background-image:url(background2.jpg);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
    	font-family: serif;
	}
  #sub
  {
    font-weight: 600;
    font-size: 1.2em;
    color: red;
  }
</style>

<title>Project Management System</title>
</head>
<div>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 10px;">
  <a class="navbar-brand" href="#">FACULTY | <?php
    print $user;
    ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="FACULTY/view.php">View Projects </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="FACULTY/mail.php">Interact </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="FACULTY/meeting.php">Meeting </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="FACULTY/marks2.php">Marks </a>
      </li>
        <li class="nav-item ">
        <a class="nav-link" href="FACULTY/review.php">Review </a>
      </li>
    </ul>
    <ul class="nav justify-content-end">
      <li class="nav-item active">
      <a class="nav-link active" href="logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container" >
  <div class="jumbotron" style="opacity: 0.7;">
    <h1 class="display-4">Hello, CMRIT!</h1>
    <p class="lead">CMRIT is not just a college. It’s a community of pro-active students with ambitious dreams. A dream of a bright future. A dream of a successful life. And we, at CMRIT, provide our students with all the necessary tools and guidance to convert these dreams into actions.</p>
    <hr class="my-4">
    <p><span id="sub">Vision :</span><br>
  To be a nationally acclaimed and globally recognised institute of engineering, technology and management, producing competent professionals with appropriate attributes to serve the cause of the nation and of society at large.</p>
    <a class="btn btn-primary btn-lg" href="https://www.cmrit.ac.in/about-cmrit/" role="button">Learn more</a>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</div>
</html>
 <?php
}
else
{
?>
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="global.css">
<style>
	body
	{
		background-image:url(background2.jpg);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
        font-family: serif;
	}
  #sub
  {
    font-weight: 600;
    font-size: 1.2em;
    color: red;
  }
</style>
<title>Project Management System</title>
</head>
<div>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 10px;">
  <a class="navbar-brand" href="#">STUDENT | <?php
    print $user;
    ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="STUDENT/project.php">Projects </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="STUDENT/mail.php">Interact </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="STUDENT/report.php">Meeting </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="STUDENT/marks2.php">Marks </a>
      </li>
    </ul>
    <ul class="nav justify-content-end">
      <li class="nav-item active">
      <a class="nav-link active" href="logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container" >
  <div class="jumbotron" style="opacity: 0.7;">
    <h1 class="display-4">Hello, CMRIT!</h1>
    <p class="lead">CMRIT is not just a college. It’s a community of pro-active students with ambitious dreams. A dream of a bright future. A dream of a successful life. And we, at CMRIT, provide our students with all the necessary tools and guidance to convert these dreams into actions.</p>
    <hr class="my-4">
    <p><span id="sub">Vision :</span><br>
  To be a nationally acclaimed and globally recognised institute of engineering, technology and management, producing competent professionals with appropriate attributes to serve the cause of the nation and of society at large.</p>
    <a class="btn btn-primary btn-lg" href="https://www.cmrit.ac.in/about-cmrit/" role="button">Learn more</a>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</div>
</html>
<?php
}
?>
</table>
<p>
  <?php
}
?>


</p>
<p>&nbsp;</p>
  </table>
</table>


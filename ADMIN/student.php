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
    <link rel="stylesheet" type="text/css" href="../global.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	body
	{
		background-image:url(../background8.jpg);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
    font-family: serif;
	}
        
</style>
<title>Project Management System</title>
</head>
<div>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 10px;">
  <a class="navbar-brand" href="../Admin.php">ADMIN | </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link active" href="student.php">Add Student </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="faculty.php">Add Faculty </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="stsearch.php">Search Student </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="fa_search.php">Search Faculty </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="allocate.php">Allocate </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="report.php">Reports </a>
      </li>
    </ul>
    <ul class="nav justify-content-end">
      <li class="nav-item active">
      <a class="nav-link active" href="../logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-sm-12 col-xs-12"></div>
    <div class="col-md-4 col-sm-12 col-xs-12">
      <form class="form-container" method="post" action="st.php">
        <h1>Student Info</h1>
        <div class="form-group">
          <label for="exampleInputEmail1">Student Id :</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Name :</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="stname" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email Id :</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="stemail" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Phone Number :</label>
          <input type="Phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="stphone" required>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="stpass" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Year :</label>
          <input type="Number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="styear" required>
        </div>
        <select class="btn btn-outline-primary dropdown-toggle btn-block" name="stream" required>
        <option value="" selected>Stream</option>
        <option value="CSE">CSE</option>
        <option value="COM">ISE</option>
        <option value="EEE">EEE</option>
        <option value="ECE">ECE</option>
        <option value="MECH">MECH</option>
        <option value="Civil">CIV</option>          
        </select>
        <button type="submit" class="btn btn-success btn-block" name="add" value="Add">ADD</button>
</form>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12"></div>
    
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
elseif($role=="Faculty")    
{
?>
    <?php 
    header('Location:../Admin.php');
    ?>
 <?php
}
else   
{
?>
    <?php 
    header('Location:../Admin.php');
    ?>
<?php
}
?>
</table>
<p>
  <?php
}
?>
    
    

<p>&nbsp;</p>

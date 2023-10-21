<?php
session_start();
if(empty($_SESSION['email']))
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="global.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Project Management System</title>
</head>
<div>
<body>
  <nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="https://www.cmrit.ac.in/about-cmrit/">
    <img src="cmrit_logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
    Project Management system
  </a>
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12"></div>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <form class="form-container" action="chk.php" method="post">
        <h1>Log-in</h1>
        <div class="form-group">
          <label for="exampleInputEmail1" >User Id</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
        </div>
        
        <select class="btn btn-secondary dropdown-toggle btn-block" name="role">
        <option value="" selected>Designation</option>
        <option value="Student">Student</option>
        <option value="Faculty">Faculty</option>
        <option value="Admin">Admin</option>          
        </select>
        <button type="submit" class="btn btn-success btn-block" name="register" value="Log in">Submit</button>
</form>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12"></div>
    
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
header("location:Admin.php");
}

?>
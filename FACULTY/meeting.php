<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';
        if(isset($_POST['submit']))
        {
           $sid=$_POST['sid'];
           $fid=$_POST['fid'];
           $date=$_POST['dat'];
           $time=$_POST['tem'];
           $dec=$_POST['des'];


          if (!empty($date)||!empty($time)||!empty($dec))
           {

            $sql= "INSERT INTO `pmas`.`meeting` (`meeting_id`, `f_id`, `s_id`, `date`, `time`, `desc`) VALUES ('', '$fid', '$sid', '$date', '$time', '$dec');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:meeting.php');
           }
        else

        {
              echo 'Please fill up all fields';
              header('Location:meeting.php');
        }

        }


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
    <link rel="stylesheet" type="text/css" href="../css.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	body
	{
		background-image:url(../background.jpeg);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
	}
</style>
<title>Project Management System</title>
</head>
<div>
<body>

 <?php
 header("location:../Admin.php");
}
elseif($role=="Faculty")
{
?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../global.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<style>
	body
	{
		background-image:url(../background2.jpg);
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
        font-family: serif;
	}
        a link{
            text-decoration: none;
        }
</style>
<title>Project Management System</title>
</head>
<div>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 10px;">
  <a class="navbar-brand" href="../Admin.php">FACULTY | <?php
    print $user;
    ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="view.php">View Projects </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="mail.php">Interact </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link active" href="meeting.php">Meeting </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="marks2.php">Marks </a>
      </li>
    </ul>
    <ul class="nav justify-content-end">
      <li class="nav-item active">
      <a class="nav-link active" href="../logout.php">Log Out</a>
      </li>
    </ul>
  </div>
  </nav>
 <?php
}
else
{
?>

<?php
header("location:../Admin.php");
}
}
?>
<div class="container-fluid">
<div class="row">
<div class="col-md-4 col-sm-12 col-xs-12"></div>
<div class="col-md-4 col-sm-12 col-xs-12">
<form class="form-container" style="opacity: 0.8;" action="meeting.php" method="post">
    <h2>Meeting Details :</h2>
    <?php
        include '../connection.php';
        $sql="select s_id from project where f_id='$user';";
        $result=  mysqli_query($conn, $sql)
         ?> 
         <div class="form-group">
          <label for="exampleInputEmail1">From :</label>
          <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" type="text" name="fid" value="<?php echo $user;?>" readonly>
        </div>
         <h6>Student ID :</h6>
         <select name="sid" class="btn btn-outline-primary dropdown-toggle btn-block">
        <option selected="selected">Choose From Supervisory</option>
        <?php
        while($row = mysqli_fetch_assoc($result))
        {
            $category= $row['s_id'];
            ?>
         <option value="<?php echo $category; ?>"><?php echo $category;?></option>
         <?php
         }
         ?>
        </select>  &nbsp;&nbsp;&nbsp;
        <div class="form-group">
          <label for="exampleInputEmail1">Date :</label>
          <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" type="date" name="dat">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Time :</label>
          <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" type="time" name="tem">
        </div>
        <h6>Message :</h6>
        <textarea class="form-control" name="des" cols="25" rows="5" placeholder="Start typing here..." required ></textarea><br/><br/>
        <button type="submit" class="btn btn-success btn-block" value="Submit" name="submit">Send</button>
</form>
</div>
<div class="col-md-4 col-sm-12 col-xs-12"></div>
</div>
</div>

</div>
</form>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</div>
</html>

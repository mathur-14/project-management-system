<?php
session_start();
$user=$_SESSION['Email'];
$role=$_SESSION['Role'];

include '../connection.php';

if (isset($_POST['submit']))
{
            $to=$_POST['student'];
            $proj=$_POST['proj'];
           $marks1=$_POST['slide1'];$marks2=$_POST['slide2'];$marks3=$_POST['slide3'];$marks4=$_POST['slide4'];$marks5=$_POST['slide5'];
        


          if (!empty($proj))
           {

            $sql= "UPDATE `pmas`.`revmarks` SET `rev1`='$marks1',`rev2`='$marks2',`rev3`='$marks3',`rev4`='$marks4',`rev5`='$marks5' WHERE `pmas`.`revmarks`.`p_id`='$proj'; ";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:marks2.php');
           }
        else

        {
              echo 'Please fill up all fields';
              header('Location:marks2.php');
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
    header("location:../Admin.php?image=image.php");
?>


 <?php
}
elseif($role=="Faculty")
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
        <a class="nav-link" href="meeting.php">Meeting </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link active" href="marks2.php">Marks </a>
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
    <div class="col-md-4 col-sm-4 col-xs-12"></div>
    <div class="col-md-4 col-sm-4 col-xs-12">   
<form class="form-container" method="post" action="marks2.php">
  <h1>Enter Marks:</h1>
  <br>
<?php
    $sql1="select * from revmarks where f_id='$user' ";
    $rec=mysqli_query($conn,$sql1);
    $std=mysqli_fetch_assoc($rec);
    ?>
    <h6>Student ID :</h6>
    <?php
    include '../connection.php';
     $sql="select s_id from revmarks where f_id='$user';";
     $result=  mysqli_query($conn, $sql)
     ?> 
    <select name="student" class="btn btn-outline-primary dropdown-toggle btn-block">
    <option selected="selected">Students list</option>
    <?php
    while($row = mysqli_fetch_assoc($result))
    {
        $category= $row['s_id'];
        ?>
    <option value="<?php echo $category; ?>"><?php echo $category;?></option>
    <?php
    }     ?>
    </select>

    <h6>Project ID :</h6>
    <?php
    include '../connection.php';
     $sql="select p_id from revmarks where f_id='$user';";
     $result=  mysqli_query($conn, $sql)
     ?> 
    <select name="project" class="btn btn-outline-primary dropdown-toggle btn-block">
    <option selected="selected">Projects list</option>
    <?php
    while($row = mysqli_fetch_assoc($result))
    {
        $category= $row['p_id'];
        ?>
        <option value="<?php echo $category; ?>"><?php echo $category;?></option>
        
        <?php
        }     ?>
    </select>
    
    <table><div>
       <?php
       if (isset($_POST['chk']))
       {
                    $username=$_POST['project'];
                    $sql1="select * from revmarks where p_id ='$username'; ";
                    $rec=mysqli_query($conn, $sql1);
                    $row=mysqli_fetch_assoc($rec);
       }
       ?>
       <br>

       <button type="submit" class="btn btn-success btn-block" id="successmessage" name="chk" value="Search">Send</button>
       <br><hr>
    <div class="form-group">
          <label for="exampleInputEmail1">Project ID:</label>
          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="proj" value="<?php echo $row['p_id'];?>" readonly >
    </div>
    <div class="progress">
  <div class="progress-bar progress-bar-striped bg-warning " role="progressbar" style="width: <?php echo 20*$row['rev_no']; ?>%" aria-valuenow="<?php echo 20*$row['rev_no']; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo 20*$row['rev_no']; ?>%</div>
</div>
<br>
    <div class="form-group">
          <label for="exampleInputEmail1">Enter Marks 1:</label>
          <input type="Number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="slide1" value="<?php echo $row['rev1'];?>" >
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Enter Marks 2:</label>
          <input type="Number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="slide2" value="<?php echo $row['rev2'];?>" >
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Enter Marks 3:</label>
          <input type="Number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="slide3" value="<?php echo $row['rev3'];?>" >
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Enter Marks 4:</label>
          <input type="Number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="slide4" value="<?php echo $row['rev4'];?>" >
    </div>
    <div class="form-group">
          <label for="exampleInputEmail1">Enter Marks 5:</label>
          <input type="Number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="slide5" value="<?php echo $row['rev5'];?>" >
    </div>
    
    <button type="submit" class="btn btn-success btn-block" name="submit" value="Submit">Submit</button>
</form>
</div>
    <div class="col-md-4 col-sm-4 col-xs-12"></div>
  </div>
</div>
<?php  
	$r=0;
    if($row['rev1']!=0)
    	$r=1;
    if($row['rev2']!=0)
    	$r=2;
    if($row['rev3']!=0)
    	$r=3;
    if($row['rev4']!=0)
    	$r=4;
    if($row['rev5']!=0)
    	$r=5;
    $sql= "UPDATE `pmas`.`revmarks` SET `rev_no`='$r' WHERE `pmas`.`revmarks`.`p_id`='$username'; ";
	mysqli_query($conn, $sql);
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body></div></html>
    
<?php
}
?>
</table>
<p>
  <?php
}
?>
</p>
</body>
</div>
</html>
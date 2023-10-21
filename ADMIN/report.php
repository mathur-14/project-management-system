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
		background-image:url(../background5.jpg);
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
        <a class="nav-link" href="student.php">Add Student </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="faculty.php">Add Faculty </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link " href="stsearch.php">Search Student </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link " href="fa_search.php">Search Faculty </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="allocate.php">Allocate </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link active" href="report.php">Reports </a>
      </li>
    </ul>
    <ul class="nav justify-content-end">
      <li class="nav-item active">
      <a class="nav-link active" href="../logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
    <br/><br/><br/>
    <table class="table container" bgcolor="LightGrey" style="opacity: 0.8;">
            <tr align="center">
            <?php
                echo "<th>"."Meeting ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Faculty ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Student ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Date"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Time"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Description"."</th>";
                echo "</tr>";
                ?>  </tr> <?php
                include './connection.php';
                        $sql1="select * from meeting ";
                        $rec=mysqli_query($conn, $sql1);
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="center"><?php
                            echo "<td>".$std['meeting_id']."<td/>";
                            echo "<td>".$std['f_id']."<td/>"; 
                            echo "<td>".$std['s_id']."<td/>"; 
                            echo "<td>".$std['date']."<td/>"; 
                            echo "<td>".$std['time']."<td/>"; 
                            echo "<td>".$std['desc']."<td/>"; 
                            ?>  </tr> <?php 
                        }
            ?>
        </table>
    <br>
    <br>
        <table  class="table container" bgcolor="LightGrey" style="opacity: 0.8;">
            <tr align="center">
            <?php
                echo "<th>"."Project ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Project name"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Domain"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Student ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Faculty ID"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Project File name"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "<th>"."Remarks"."</th>";
                echo "<th>" ?> &nbsp; <?php "</th>";
                echo "</tr>";
              ?>  </tr> <?php
                include './connection.php';
                        $sql1="select * from project ";
                        $rec=mysqli_query($conn, $sql1);
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="center"><?php
                            echo "<td>".$std['p_id']."<td/>"; 
                            echo "<td>".$std['name']."<td/>"; 
                            echo "<td>".$std['domain']."<td/>"; 
                            echo "<td>".$std['s_id']."<td/>"; 
                            echo "<td>".$std['f_id']."<td/>"; 
                            echo "<td>".$std['ppf']."<td/>"; 
                            echo "<td>".$std['remark']."<td/>"; 
                            ?>  </tr> <?php 
                        }
            ?>
        </table>
    </form>

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
    header('Location:../Admin.php'); 
?>
 <?php
}
else   
{
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
   
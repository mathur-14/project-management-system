<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';


if (isset($_POST['submit']))
{
            $to=$_POST['student'];
           $msg=$_POST['msg'];


          if (!empty($to))
           {

            $sql= "INSERT INTO `pmas`.`st_mail` (`s_mail_id`, `s_id`, `f_id`, `mag`) VALUES ('', '$user', '$to', '$msg');";
                mysqli_query($conn, $sql);
                $conn->close();
                header('Location:mail.php');
           }
        else

        {
              echo 'Please fill up all fields';
              header('Location:mail.php');
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
elseif($role=="Student")
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
		background-image:url(../background10.jpg);
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
  <a class="navbar-brand" href="../Admin.php">STUDENT | <?php
    print $user;
    ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="project.php">Projects </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link active" href="mail.php">Interact </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="report.php">Meeting </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="marks.php">Marks </a>
      </li>
    </ul>
    <ul class="nav justify-content-end">
      <li class="nav-item active">
      <a class="nav-link active" href="../logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
<div class="row justify-content-center" >
            <div class="col-md-6" >
                <form class="jumbotron" style="opacity: 0.8;" action="mail.php" method="post">
                    <h2>Compose Mail:</h2>
                    <?php
                    $sql1="select * from project where f_id='$user' ";
                    $rec=mysqli_query($conn, $sql1);
                    $std=mysqli_fetch_assoc($rec);
                    ?>
                    <?php
                        include '../connection.php';
                         $sql="select f_id from project where s_id='$user';";
                         $result=  mysqli_query($conn, $sql)
                         ?> 
                         <h6>To :</h6>
                         <select name="student" class="btn btn-outline-primary dropdown-toggle btn-block">
                        <option selected="selected">Choose From Supervisory</option>
                        <?php
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $category= $row['f_id'];
                            ?>
                        <option value="<?php echo $category; ?>"><?php echo $category;?></option>
                        <?php
                        }
                        ?>
                        </select>  &nbsp;&nbsp;&nbsp;
                        <div class="form-group">
                          <label for="exampleInputEmail1">From :</label>
                          <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" type="text" name="from" value="<?php echo $user;?>" readonly>
                        </div>
                        <h6>Message :</h6>
                        <textarea class="form-control" name="msg" cols="25" rows="5" placeholder="Start typing here..." ></textarea><br/><br/>
                    <button type="submit" class="btn btn-success btn-block" value="Send" name="submit">Send</button>
            </form>
            </div>
            <div class="col-md-6">
                        <nav class="navbar navbar-light " style="background-color: rgba(100,100,100,0.9);">
                          <form class="form-inline" method="post" action="mail.php">
                            <input class="form-control mr-sm-2 btn btn-outline-light" type="submit" value="Inbox" name="inbox" aria-label="Search">
                            <input class="form-control mr-sm-2 btn btn-outline-light" type="submit" value="Sent Mail" name="sent" aria-label="Search">
                          </form>
                        </nav>


                        <?php
                    if (isset($_POST['inbox']))
                    {
                        echo "<br/>";
                        ?>

                    <table class="table container" bgcolor="LightGrey" style="opacity: 0.8;>
                    <tr align="center">
                    <?php
                        echo "<th>"."FROM"."</th>";
                        echo "<th>" ?> &nbsp; <?php "</th>";
                        echo "<th>"."MESSAGE"."</th>";
                        echo "<th>" ?> &nbsp; <?php "</th>";
                        ?>  </tr>
                    <?php
                        $sql1="select * from mail where s_id ='$user'";
                        $rec=mysqli_query($conn, $sql1);

                        echo "<tr>";
                        while ($std= mysqli_fetch_assoc($rec))
                        {
                           if ($std['from']="supervisor")
                            {
                               ?> <tr bgcolor="beige" align="left"><?php
                            echo "<td>".$std['f_id']."<td/>";
                            echo "<td>".$std['msg']."<td/>";
                            ?>  </tr> <?php
                            }
                        }

                        ?> </table> <?php

                    }

                    elseif (isset($_POST['sent']))
                    {
                      echo "<br/>";
                        ?>  
                    <table class="table container" bgcolor="LightGrey" style="opacity: 0.8;>
                    <tr align="center">
                    <?php
                        echo "<th>"."TO"."</th>";
                        echo "<th>" ?> &nbsp; <?php "</th>";
                        echo "<th>"."MESSAGE"."</th>";
                        echo "<th>" ?> &nbsp; <?php "</th>";
                        ?>  </tr>
                    <?php
                        $sql1="select * from st_mail where s_id ='$user' ";
                        $rec=mysqli_query($conn, $sql1);

                        echo "<tr>";
                        while ($std=mysqli_fetch_assoc($rec))
                        {
                           ?> <tr bgcolor="beige" align="left"><?php
                            echo "<td>".$std['f_id']."<td/>";
                            echo "<td>".$std['mag']."<td/>";
                            ?>  </tr> <?php
                        }
                        //echo "<tr/>";
                        ?> </table> <?php
                    }
                ?>
    
            </form>
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
    header("location:../Admin.php?image=image.php");
?>

<?php
}
?>
</table>
<p>
  <?php
}
?>

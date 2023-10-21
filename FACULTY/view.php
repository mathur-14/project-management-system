<?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];

include '../connection.php';
//$sql="select s_id from project where f_id='$user';";
//$record=mysqli_query($conn, $sql);


if (isset($_POST['ppf']))
{
    $file=$_POST['file_name'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('ppf/'.$file);
    exit();}
 else {
    echo 'no file';
    }
}
elseif (isset($_POST['psf']))
{
    $file=$_POST['file_name1'];
    if(!empty($file)){
    header('Content-type:doc/pdf');
    header('Content-Disposition: attachment; filename="'.$file.'"');
    readfile('psf/'.$file);
    exit();}
 else {

}
}
                    elseif (isset($_POST['assess']))
                {
                $feed=$_POST['assessmen'];
                $prid=$_POST['pid'];
                if(!empty($feed))
                {
                $sql2= "UPDATE `pmas`.`project` SET `remark` = '$feed' WHERE `project`.`p_id` = '$prid';";
                mysqli_query($conn, $sql2);
                $conn->close();
                header('Location:view.php');
                }
                else
                {
                      header('Location:view.php');

                }
                }
                elseif (isset($_POST['rem']))
                {
                $re=$_POST['remainder'];
                $stuid=$_POST['stid'];
                //$stuid;
                $sql3= "INSERT INTO `pmas`.`mail` (`mail_id`, `s_id`, `f_id`, `msg`) VALUES ('', '$stuid', '$user', '$re');";
                mysqli_query($conn, $sql3);
                $conn->close();
                header('Location:view.php');
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
        font-family: serif;
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
    <link rel="stylesheet" type="text/css" href="../global.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
	body
	{
		background-image:url(../background3.jpg);
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
        <a class="nav-link active" href="view.php">View Projects </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="mail.php">Interact </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="meeting.php">Meeting </a>
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
?>
</table>
<p>
  <?php
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12"></div>
    <div class="col-md-4 col-sm-4 col-xs-12">
      <form class="form-container" action="view.php" method="post">
        <h1>Project Details:</h1>
        <?php
            include '../connection.php';
             $sql="select s_id from project where f_id='$user';";
             $result=  mysqli_query($conn, $sql)
        ?>
        <select class="btn btn-primary dropdown-toggle btn-block" name="student">
        <option selected="selected">Supervisory</option>
        <?php
                 while($row = mysqli_fetch_assoc($result))
                 {
                     $category= $row['s_id'];
                     ?>
                 <option  value="<?php echo $category; ?>"><?php echo $category;?></option>
                 <?php
                 }
     ?>         
        </select>  &nbsp;&nbsp;&nbsp;
        <button type="submit" class="btn btn-success btn-block" name="asses" value="Feedback">Submit</button>
</form>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12"></div>
  </div>
</div>
    
    <form method="post" action="view.php">
        <div style="background-color:white;  alignment-adjust: central; width:70%; margin-left:15%; margin-top:75px;border-radius:12px;">
    <table width="100%" cellpadding="5" cellspacing="5" border="1" align="center">
    <?php
            if (isset($_POST['asses']))
            {
                $stuid=$_POST['student'];
                echo "<tr>";?>

                <th>Student USN</th>
                <th>Project Proposal</th>
                <th>Assessment</th>

                <?php
                echo "</tr>";
                echo "<tr>";

                echo "<td>"?> <input style="border-radius:12px;border-color:white;" type="text" name="stid" readonly value="<?php echo $stuid;?>"/> <?php "</td>";

                $sql1="select * from project where s_id ='$stuid' ";
                $rec=mysqli_query($conn, $sql1);

                while ($std=mysqli_fetch_assoc($rec))
                {
                    echo "<td>"?> <input style="border-radius:12px;border-color:white;" name="file_name" value="<?php echo $std["ppf"]?>" type="text" readonly /><br/><br/>
                    <input style="border-radius:12px;border-color:white;" type="submit" value="Download" name="ppf"/> <input style="border-radius:12px;border-color:white;" type="hidden" name="pid" value="<?php echo $std['p_id']?>"/> <?php "</td>";


                    echo "<td>"?><textarea style="border-radius:12px;border-color:black;"   name="assessment" cols="20" rows="5" ></textarea><br/><br/>
                    <input type="submit" value="Submit" name="assess"/> <?php "</td>";



                    echo "</tr>";


            }
            }
    ?>
    </table>
        </div>
    </form>
</p>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body></div>

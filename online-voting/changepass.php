<?php
session_start();
require('connection.php');

//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
} 
//retrive student details from the tbmembers table
$result=mysqli_query($con, "SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // get data from db
 $stdId = $row['member_id']; 
  $encpass= $row['password'];
}
?>
<?php
// updating sql query
if (isset($_POST['changepass'])){
$myId =  $_REQUEST['id'];
$oldpass = md5($_POST['oldpass']);
$newpass = $_POST['newpass'];
$conpass = $_POST['conpass'];
if($encpass == $oldpass)
{
  if($newpass == $conpass)
  {
    $newpassword = md5($newpass); //This will make your password encrypted into md5, a high security hash
    $sql = mysqli_query($con,"UPDATE tbmembers SET password='$newpassword' WHERE member_id = '$myId'" );
    echo "<script>alert('Password Change')</script>";
  }
  else
  {
    echo "<script>alert('New and Confirm Password Not Match')</script>";
  }

}
else
{
    echo "<script>alert('Old password not match')</script>";
}


// redirect back to profile
// header("Location: manage-profile.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Profile Management</title>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/user.js">
</script>
</head>
<body bgcolor="tan">
     
<center><b><font color = "brown" size="6"></font></b></center><br><br>
<div id="page">
<div id="header">
  <h1>MANAGE MY PROFILE</h1>
  <a href="student.php">Home</a> | <a href="vote.php">Current Polls</a> | <a href="manage-profile.php">Manage My Profile</a> | <a href="changepass.php">Change Password</a>| <a href="logout.php">Logout</a>
</div>
<div id="container">
<table border="0" width="620" align="center">
<CAPTION><h3>CHANGE PASSWORD</h3></CAPTION>
<form action="changepass.php?id=<?php echo $_SESSION['member_id']; ?>" method="post">
<table align="center">
<tr class="password"><td>Old Password:</td><td><input type="password" style="border: none;
  outline:none;
  background: none;
  font-size: 18px;
  color: #555;
  padding:20px 10px 20px 5px;" name="oldpass" maxlength="5" value=""></td></tr>
<tr class="password"><td>New Password:</td><td><input type="password" style="border: none;
  outline:none;
  background: none;
  font-size: 18px;
  color: #555;
  padding:20px 10px 20px 5px;" name="newpass" maxlength="5" value=""></td></tr>
<tr class="password"><td>Confirm New Password:</td><td><input type="password" style="border: none;
  outline:none;
  background: none;
  font-size: 18px;
  color: #555;
  padding:20px 10px 20px 5px;" name="conpass" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td></td><td><input style="outline: none;
  border:none;
  cursor: pointer;
  width:100%;
  height: 60px;
  border-radius: 30px;
  font-size: 20px;
  font-weight: 700;
  font-family: 'Lato', sans-serif;
  color:#fff;
  text-align: center;
  background: #24cfaa;
  box-shadow: 3px 3px 8px #b1b1b1,
              -3px -3px 8px #ffffff;
  transition: 0.5s;" type="submit" name="changepass" value="Update Profile"></td></tr>
</table>
</form>
<hr>
</div>
<div id="footer"> 
  <div class="bottom_addr">&copy; ONLINE VOTING SYSTEM</div>
</div>
</div>
</body>
</html>
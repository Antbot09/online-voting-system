<?php
session_start();
require('../connection.php');
?>
<html><head>
<link href="css/admin_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="js/admin.js">
</script>
</head><body bgcolor="tan">
   
<center><b><font color = "brown" size="6"></font></b></center><br><br>
<div id="page">
<div id="header">
<h1>MANAGE ADMINISTRATORS  </h1>
<a href="admin.php">Home</a> | <a href="positions.php">Manage Positions</a> | <a href="candidates.php">Manage Candidates</a> | <a href="refresh.php">Poll Results</a> | <a href="manage-admins.php">Manage Account</a> | <a href="change-pass.php">Change Password</a>  | <a href="logout.php">Logout</a>
</div>

<div id="container">
<?php
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}

//fetch data for update file
$result=mysqli_query($con, "SELECT * FROM tbadministrators WHERE admin_id = '$_SESSION[admin_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // get data from db
 $adminId = $row['admin_id'];
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
 $email = $row['email'];
 }

//Process
if (isset($_GET['id']) && isset($_POST['update']))
{
$myId = addslashes( $_GET['id']);
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];

$sql = mysqli_query($con, "UPDATE tbAdministrators SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail' WHERE admin_id = '$myId'" );
}
?>
<table align="center">
<tr>
<td>
<form action="manage-admins.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
<table align="center">
<CAPTION><h4>UPDATE ACCOUNT</h4></CAPTION>
<tr class="username"><td>First Name:</td><td><input type="text" style="border: none;
  outline:none;
  background: none;
  font-size: 18px;
  color: #555;
  padding:20px 10px 20px 5px;" name="firstname" maxlength="15" value="<?php echo $firstName ?>"></td></tr>
<tr class="username"><td>Last Name:</td><td><input type="text" style="border: none;
  outline:none;
  background: none;
  font-size: 18px;
  color: #555;
  padding:20px 10px 20px 5px;" name="lastname" maxlength="15" value="<?php echo $lastName ?>"></td></tr>
<tr class="username"><td>Email Address:</td><td><input type="text" style="border: none;
  outline:none;
  background: none;
  font-size: 18px;
  color: #555;
  padding:20px 10px 20px 5px;" name="email" maxlength="100" value="<?php echo $email?>"></td></tr>
<tr><td>&nbsp;</td><td><input style="outline: none;
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
  transition: 0.5s;" type="submit" name="update" value="Update Account"></td></tr>
</table>
</form>
</td>
</tr>
</table>
</div>
<div id="footer">
<div class="bottom_addr">&copy; ONLINE VOTING SYSTEM</div>
</div>
</div>
</body></html>
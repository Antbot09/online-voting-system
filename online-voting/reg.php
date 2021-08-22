<?php 

    

   
        
session_start();
		if(isset($_POST['sendmail'])) {
			require 'PHPMailerAutoload.php';
			require 'credential.php';

			$mail = new PHPMailer;

			// $mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'votingsys74@gmail.com';                 // SMTP username
			$mail->Password = 'Voting@1234';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587; 
			$mail->isHTML(true);                                   // TCP port to connect to

			$mail->setFrom('votingsys74@gmail.com', 'OVS');
			$mail->addAddress($_POST['email']);     // Add a recipient

			$mail->addReplyTo('votingsys74@gmail.com');
			// print_r($_FILES['file']); exit;
			
            $mail->isHTML(true);
                                              // Set email format to HTML
      $firstname=$_POST['firstname'];
      $lastname=$_POST['lastname'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			
      $_SESSION['firstname'] = $firstname;
      $_SESSION['lastname'] = $lastname;
			$_SESSION['email'] = $email;
			$_SESSION['password'] = $password;
			
			
			$mail->Subject = "REGISTER";
			$mail->Body    = "<div style='font-family:HelveticaNeue-Light,Arial,sans-serif;background-color:#eeeeee'>
			<table align='center' width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
			<tbody>
				<tr>
					<td>
						<table align='center' width='750px' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='width:750px!important'>
						<tbody>
							<tr>
								<td>
									<table width='690' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
									<tbody>
										<tr>
											<td colspan='3' height='80' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='padding:0;margin:0;font-size:0;line-height:0'>
												<table width='690' align='center' border='0' cellspacing='0' cellpadding='0'>
												<tbody>
													<tr>
														<td width='30'></td>
														<td align='left' valign='middle' style='padding:0;margin:0;font-size:0;line-height:0'><a href='http://192.168.137.1/online%20voting/login.html' target='_blank'><img src='http://192.168.137.1/rrcelib/rsz_rrcelib1.png' alt='discussdesk' ></a></td>
														<td width='30'></td>
													</tr>
												   </tbody>
												</table>
											  </td>
										</tr>
										<tr>
											<td colspan='3' align='center'>
												<table width='630' align='center' border='0' cellspacing='0' cellpadding='0'>
												<tbody>
													<tr>
														<td colspan='3' height='60'></td></tr><tr><td width='25'></td>
														<td align='center'>
															<h1 style='font-family:HelveticaNeue-Light,arial,sans-serif;font-size:48px;color:#404040;line-height:48px;font-weight:bold;margin:0;padding:0'>WELCOME TO ovs Thank you for Register</h1>
														</td>
														<td width='25'></td>
													</tr>
													<tr>
														<td colspan='3' height='40'></td></tr><tr><td colspan='5' align='center'>
															<p style='color:#404040;font-size:16px;line-height:24px;font-weight:lighter;padding:0;margin:0'>
		
		Thank you for register. Your user id is '$email' and password is '$password' 
		
		Vote '$firstname''$lastname' </p><br>
															<p style='color:#404040;font-size:16px;line-height:22px;font-weight:lighter;padding:0;margin:0'>
																</p>
														</td>
													</tr>
													<tr>
													<td colspan='4'>
														<div style='width:100%;text-align:center;margin:30px 0'>
															<table align='center' cellpadding='0' cellspacing='0' style='font-family:HelveticaNeue-Light,Arial,sans-serif;margin:0 auto;padding:0'>
															<tbody>
																<tr>
																	<td align='center' style='margin:0;text-align:center'><a href='http://192.168.137.1/online%20voting/login.html' style='font-size:21px;line-height:22px;text-decoration:none;color:#ffffff;font-weight:bold;border-radius:2px;background-color:#0096d3;padding:14px 40px;display:block;letter-spacing:1.2px' target='_blank'>Login Here</a></td>
																  </tr>
															   </tbody>
															</table>
														   </div>
													   </td>
												   </tr>
												<tr><td colspan='3' height='30'></td></tr>
											 </tbody>
											</table>
										 </td>
									   </tr>
									
									<tr bgcolor='#ffffff'>
										<td width='30' bgcolor='#eeeeee'></td>
										<td>
											<table width='570' align='center' border='0' cellspacing='0' cellpadding='0'>
											<tbody>
											
									  </tbody>
									</table>
									  <table align='center' width='750px' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee' style='width:750px!important'>
									<tbody>
										<tr>
											<td>
												<table width='630' align='center' border='0' cellspacing='0' cellpadding='0' bgcolor='#eeeeee'>
												<tbody>
													<tr><td colspan='2' height='30'></td></tr>
													<tr>
														<td width='360' valign='top'>
															<div style='color:#a3a3a3;font-size:12px;line-height:12px;padding:0;margin:0'>&copy;<script>document.write(new Date().getFullYear());</script>Designed by sagar k</div>
															<div style='line-height:5px;padding:0;margin:0'>&nbsp;</div>
															<div style='color:#a3a3a3;font-size:12px;line-height:12px;padding:0;margin:0'></div>
														</td>
														  <td align='right' valign='top'>
															<span style='line-height:20px;font-size:10px'><a href='https://www.facebook.com/' target='_blank'><img src='https://i.imgbox.com/BggPYqAh.png' alt='fb'></a>&nbsp;</span>
															<span style='line-height:20px;font-size:10px'><a href='https://twitter.com/' target='_blank'><img src='https://i.imgbox.com/j3NsGLak.png' alt='twit'></a>&nbsp;</span>
															<span style='line-height:20px;font-size:10px'><a href='https://plus.google.com/' target='_blank'><img src='https://i.imgbox.com/wFyxXQyf.png' alt='g'></a>&nbsp;</span>
														  </td>
													</tr>
													<tr><td colspan='2' height='5'></td></tr>
												   
												  </tbody>
												</table>
											   </td>
										  </tr>
									  </tbody>
									</table>
								  </td>
							</tr>
						  </tbody>
						</table>
					</td>
				</tr>
			 </tbody>
			</table>
		</div>";
			
			$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// Additional headers
$headers .= 'From: OVS<votingsys74@gmail.com>' . "\r\n";
$headers .= 'Cc: votingsys74@gmail.com' . "\r\n";
$headers .= 'Bcc: votingsys74@gmail.com' . "\r\n";
            $mail->AltBody = "Thank you";
			

			if(!$mail->send()) {
				echo "<script type='text/javascript'>alert('Message could not be sent')</script>";
			   
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				echo "<script type='text/javascript'>alert('Successfully Register')</script>";
				
            
       
			}
		}
	 ?>



<?php 
session_start();  
 require('DBConnection.php');

if (isset($_POST['firstname']) and isset($_POST['lastname'])){
	
// Assigning POST values to variables.
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];



  

    $password = ($password);

  	$query = "INSERT INTO tbmembers (first_name, last_name, email, password) 
  			  VALUES('$firstname', '$lastname', '$email', '$password')";
  	mysqli_query($connection, $query);
  	
    
    header("location:login.html");
  }
  ?>























<!-- <html>
<body>
<form  name="contact_form" class="default-form" action="test.php" method="post" data-js-validate="true" data-js-highlight-state-msg="true">
                        <div class="form-group">
                            <label for="name">Name
                                    <span class="required">*</span>
                            </label>
                                    <input type="text" name="form_name" class="form-control" value="">
                        </div>
                          
                        <div class="form-group">
                             <label for="email">Email
                                     <span class="required">*</span>
                              </label>
                                    <input type="email" name="form_email" class="form-control required email" value="">
                        </div>
                         
                         <div class="form-group">
                                <label for="contact">Contact
                                    <span class="required">*</span>
                                </label>
                                    <input type="text" name="form_contact" class="form-control" value="" >
                         </div>
                       
                          <div class="form-group">
                                <label for="comment">Comment</label>
                                    <textarea name="form_comment" class="form-control textarea required" ></textarea>
                          </div>
                            
                         <div class="form-group">
                               <button class="btn" type="submit" name="submit" id="payBtn">Submit</button>  
                        </div>
                 </form> -->
<?php
    // if(isset($_POST['submit'])){
    //     if(empty($_POST['form_name'])){
    //         echo"Name is Required";
    //     }
    //      if(empty($_POST['form_email'])){
    //         echo"Name is Required";
    //     }
    //      if(empty($_POST['form_contact'])){
    //         echo"Name is Required";
    //     }
    // }
    // else{


	  $email=$_POST['form_email'];
    $Name=$_POST['form_name'];
    // $InstituteName=$_POST['form_Institutename'];
    // $Designation=$_POST['ddlDesignation'];
    $Contact=$_POST['form_contact'];
    $Comment=$_POST['form_comment'];
 

	require("classes/class.phpmailer.php");

	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
    $mail->From = "asim@peaceinfotech.com";
    $mail->FromName = "Shaikh Asim";
	$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
//	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "mail.peaceinfotech.com"; 
	 // $mail ->SMTPSecure = 'ssl';
  //  $mail ->Host = "smtp.gmail.com";
  //  $mail ->Port = 465; // or 587
  //  $mail ->IsHTML(true);// mail.smtp.com
	$mail->Port = 587; // or 587
	$mail->IsHTML(true);
	$mail->Username = "asim@peaceinfotech.com";
	$mail->Password = "Asim321";
	$mail->SetFrom("asim@peaceinfotech.com");
	$mail->Subject = "Enquiry";
    $mail->Body = " <style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    
    }
    th, td {
    padding: 5px;
    text-align: left;    
    }
    </style>

    <table style='width:50%'>
    
    <tr><th>Name</th><td>$Name</td></tr>
    <tr><th>Email-Id</th><td>$email</td></tr>
    <tr><th>Contact</th><td>$Contact</td></tr>
    <tr><th>Comment</th><td>$Comment</td></tr>
   
    
    </table> 
      ";
	$mail->AddAddress('rizvan_ansari75@yahoo.com');
	$mail->AddCC($email);

	 /*if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	 } else {
		 echo "<script type='text/javascript'>
          alert('Contacted successfully');
            </script>";
            header('Location: Contact.html');
	 }*/

//      if($mail->Send()) {
//         echo "<script type='text/javascript'>
//           alert('Enquire submited');
          
//             </script>";
//            header('Location: Contacts.html');
     
// }    
if($mail->Send()) {
        echo "<script type='text/javascript'>
          alert('Feedback submited');
          location='feedback.html';
            </script>";
           // header('Location: Contact.html');
     
}
else{
    echo "<script type='text/javascript'>
          alert('Try Again Later');
          location='feedback.html';
            </script>";
}
// header('Location: Contact.html');
?>
</body>
</html>
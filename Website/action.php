




<?php 
echo "Success";
$link = mysqli_connect("localhost", "root", "", "dbs");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


$fname = mysqli_real_escape_string($link, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($link, $_REQUEST['lname']);
$address1 = mysqli_real_escape_string($link, $_REQUEST['address1']);
$address2 = mysqli_real_escape_string($link, $_REQUEST['address2']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
$state = mysqli_real_escape_string($link, $_REQUEST['state']);

$pincode = mysqli_real_escape_string($link, $_REQUEST['pincode']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
$pancard = mysqli_real_escape_string($link, $_REQUEST['pancard']);


$sql = "INSERT INTO CUSTOMER(Firstname,Lastname,Address1,Address2,City,State,Pincode,Phone,Pancard,Email) VALUES('$fname','$lname','$address1','$address2','$city','$state','$pincode','$phone','$pancard','$email')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}













require 'PHPMailer/PHPMailerAutoload.php';
$fname = $_POST['fname_'];
$lname = $_POST['lname_'];
$address1 = $_POST['address1_'];
$address2 = $_POST['address2_'];
$email = $_POST['email_'];
$city = $_POST['city_'];
$state = $_POST['state_'];
$pincode = $_POST['pincode_'];
$pancard = $_POST['pancard_'];
$email = $_POST['email_'];
// $phone = $_POST['phone'];
// $message = $_POST['message'];
$msg = nl2br("Thank you for choosing Advomate \r\n You have submitted following details" . "\r\n" . "FirstName: " . $fname . "\r\n" . "LastName: " . $lname . "\r\n" . "Email: " . $email . "\r\n" . "\r\n" . "Address: " . $address1 . $address2 . "\r\n" . "City: " . $city ."\r\n" . "State: " . $state. "\r\n" . "Pincode: " . $pincode. "\r\n" . "Pancard: " . $pancard);

//echo $to;
$to1 = '';
$pass = '';
$flag = 0;
$mail = new PHPMailer;
{
    $mail->SMTPDebug = 2;                               // Enable verbose debug output

      $mail->isSMTP();    
   $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
                                 // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '@gmail.com';                 // SMTP username
    $mail->Password = '';                           // SMTP password
    $mail->SMTPSecure = 'tsl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                      // TCP port to connect to

    $mail->setFrom('@gmail.com', 'Simran');
    // $mail->addAddress('@gmail.com');     // Add a recipient
    $mail->addAddress('@gmail.com');               // Name is optional
    $mail->addReplyTo('@gmail.com');
    $mail->addCC('@gmail.com');
    $mail->addBCC('@gmail.com');

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Thank you for your form submission';
    $mail->Body = $msg;

   if (!$mail->send()) {
        header("location: index.html?connection_failure=mailnotsent". $mail->ErrorInfo);
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        header("location: index.html");
        echo "Done with submission";
    }
}

// defined('server') ? null : define("server", "localhost");
// defined('user') ? null : define ("user", "root") ;
// defined('pass') ? null : define("pass","");
// defined('database_name') ? null : define("database_name", "db") ;

// $conn = @mysql_connect(server,user,pass);
// $db_select = @mysql_select_db(database_name,$conn);


// $sql = "INSERT INTO CUSTOMER(Firstname,Lastname,Address,City,State,Country,Pincode) VALUES('$')";


mysqli_close($link);



 ?>
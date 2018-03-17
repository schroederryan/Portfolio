<?php 

if(isset($_POST['submit'])) {
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $privatekey = '6Lcf4wgUAAAAAIQeNzmJ75u1EbOSCYO46S8Cd2qc';
    $response = file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);

    $data = json_decode($response);

    if(isset($data->success) AND $data->success==true) {
        $to = "schroeder2013@gmail.com"; // this is your Email address
        $from = $_POST['email']; // this is the sender's Email address
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        $subject = "Website Contact";
        $subject2 = "Copy of your form submission";
        $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . $_POST['information'];
        $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['information'];

        $headers = "From:" . $from;
        $headers2 = "From:" . $to;
        mail($to,$subject,$message,$headers);
        mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
        header("Location: http://www.schroederryan.com/thankyou");

    }else {
        header("Location: http://www.schroederryan.com/sorry");
    }
}
?>

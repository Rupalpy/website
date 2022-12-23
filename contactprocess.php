<?php 

    require 'phpmailer/src/Exception.php';   
    require 'phpmailer/src/PHPMailer.php';   
    require 'phpmailer/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

   if(isset($_POST["btn-send"])){
    //$mail=new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true;
    $mail->Username='md236572@gmail.com';
    $mail->Password='eovayltytfhueiqe';
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

    $mail->setFrom('md236572@gmail.com');

    $mail->addAddress("md236572@gmail.com");

    $mail->isHTML(true);

    $mail->Subject=$_POST["Subject"];
    $mail->Body=$_POST["msg"];

    $mail->send();

    echo
    "
    <script>
    alert('sent succesfully');
    window.location='index.php';
    </script>
    ";

   }

?>
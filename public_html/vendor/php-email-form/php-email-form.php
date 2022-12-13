<?php

if(isset($_POST)){
    $formok = true;

    //form data

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    //validation
    if(empty($name) || empty($email) || empty($message)){
        $formok = false;
    }

    if($formok){
        $headers = "From: $email" . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $emailbody = "<p>لقد تلقيت رسالة جديدة من نموذج الاستفسارات على موقع الويب الخاص بك</p>
                 <p>الاسم : {$name}> </p>
                 <p>الرسالة : {$message} </p> ";
        /*$emailbody = "<p>لقد تلقيت رسالة جديدة من نموذج الاستفسارات على موقع الويب الخاص بك</p>
                  <p><strong>الاسم : {$name}</strong> </p>
                  <p><strong>الرسالة : {$message} </strong> </p> ";*/

          if (mail("bilalghourani92@gmail.com",$subject,$emailbody,$headers)) {
            echo "OK";
        } else {
            echo "error";
        }

    }

    //redirect back to form
    // header('location: ' . $_SERVER['HTTP_REFERER']);

}

?>

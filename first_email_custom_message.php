<?php

include_once 'config.php';
include_once 'mail.php';

/* outer-if */
if(isset($_POST['send'])){

    $from_password = $_POST['from_password'];
    $from_email = $_POST['from_email'];
    $from_name = $_POST['from_name'];
    if($from_name==null || $from_name==""){
        $from_name = $VAR['from_name'];
    }

    $recipient = $_POST['to_email'];  
    $to_name = $_POST['to_name'];
    if($to_name==null || $to_name==""){
        $to_name=$VAR['to_name'];
    }
    
    $message = $_POST['message'];
    if($message=='' || $message==null){
        $message = $VAR['message'];
    }
                    
    
    $subject = $_POST['subject'];
    if($subject==null || $subject==""){
        $subject = $VAR['subject'];
    }

    $from = $from_email;
    $from_password = $from_password;
    $from_name = $from_name;
    $to = $recipient;
    
    $msg=$_POST['message'];
    if($msg==null || $msg==""){
        $msg=$VAR['message'];
    }

    /* inner-if */
    if(send_mail($from,$from_password,$from_name,$to,$to_name,$subject,$msg)){

?>
        <script type="text/javascript">alert('Email send to <?php echo $to; ?>');</script>

<?php

    }else{

?>
        <script type="text/javascript">alert('Email cannot be send due to some error.');</script>
<?php

    }
    /* inner-if-end */
}
/* outer-if-end */
?>


<!DOCTYPE html>
<html>
<head>
    <title>
        Send Simple Email
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="padding: 5%;">

    <h1> Email with custom message only</h1>
    <form method="POST" class="form-action">
        <div class="form-group">
            <input type="text" name="from_name" class="form-control" placeholder="sender's name">    
        </div>
        <div class="form-group">
            <input type="email" name="from_email" placeholder="sender's email" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="password" name="from_password" placeholder="sender's email password" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="text" name="to_name" placeholder="recipient's name" class="form-control">
        </div>
        <div class="form-group">
            <input type="email" name="to_email" placeholder="recipient's email" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="text" name="subject" placeholder="subject of sending this email" class="form-control">
        </div>
        <div class="form-group">
            <textarea name="message" placeholder="enter message to be send" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="send" >Click me to send email</button>
    </form>

</body>
</html>
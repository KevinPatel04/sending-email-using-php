<?php

include_once 'config.php';
include_once 'mail.php';

/* outer-if */
if(isset($_POST['send'])){

    $from_password = $VAR['from_password'];
    $from = $VAR['from_email'];
    $from_name = $VAR['from_name'];
    $to_email = $VAR['to_email'];  
    $to_name = $VAR['to_name'];
    $message = $VAR['message'];
    $subject = $VAR['subject'];
    $msg=$VAR['message'];

    /* inner-if */
    if(send_mail($from,$from_password,$from_name,$to_email,$to_name,$subject,$msg)){

?>
        <script type="text/javascript">alert('Email send to <?php echo $to_name; ?>');</script>

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
<body style="padding: 20%;">

    <h1> Send Email</h1>
    <form method="POST" class="form-action">
        <button type="submit" class="btn btn-primary" name="send" >Click me to send email</button>
    </form>

</body>
</html>
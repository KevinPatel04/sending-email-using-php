<?php

include_once 'config.php';
include_once 'mail.php';

/* outer-if */
if(isset($_POST['send'])){

    $recipient=$VAR['to_email'];  
    $name=$VAR['to_name'];
    $msg = file_get_contents('./mail-templates/email-template.html'); 

    $msg=str_replace('{{ name }}', $VAR['to_name'], $msg);
    $msg=str_replace('{{ heading }}', $VAR['heading'], $msg);
    $msg=str_replace('{{ message }}', $VAR['message'], $msg);
    $msg=str_replace('{{ btn-link }}', $VAR['btn-link'], $msg);
    $msg=str_replace('{{ from }}', $VAR['from_name'], $msg);
                        
    $subject = 'This is first email using email template';
    $from=$VAR['from_email'];
    $from_password=$VAR['from_password'];
    $from_name = $VAR['from_name'];
    $to = $recipient;
    $to_name = $name;

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
<body style="padding: 20%;">

    <h1> Email with template</h1>
    <form method="post">
        <button type="submit"  class="btn btn-primary" name="send" >Click me to send email</button>
    </form>

</body>
</html>
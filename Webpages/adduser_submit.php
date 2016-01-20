<?php

session_start();

if(!isset( $_POST['username'], $_POST['password'], $_POST['form_token']))
{
    $message = 'Please enter your username and password';
}

elseif( $_POST['form_token'] != $_SESSION['form_token'])
{
    $message = 'Invalid information';
}
else
{

    $username = ($_POST['username']);
    $password = ($_POST['password']);


    $password = sha1( $password );
    
    $servername = 'localhost';

    $dbusername = 'hmbock';

    $dbpassword = 'team@480';

    $dbname = 'hmbock';

    try
    {
        $dbh = new PDO("mysql:host=$servername;dbname=$dbusername", $dbname, $dbpassword);
        
        $stmt = $dbh->prepare("INSERT INTO login (username, password ) VALUES (:username, :password )");

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        unset( $_SESSION['form_token'] );

        $message = 'New user added';
$message='<a href="adduser.php"> Register </a> | <a href="login_submit.php"> Login </a>';
    }
    catch(Exception $e)
    {
    //username already exists
        if( $e->getCode() == 23000)
        {
            $message = 'Username already exists';
        }
        else
        {
            //something is wrong with database
            $message = 'Unable to process. Please try again later"';
        }
    }
}
?>

<html>
<head>
<title>Register Page</title>
</head>
<body>
<p><?php echo $message; ?>
</body>
</html>



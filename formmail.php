<?php
/* Set e-mail recipient */
$myemail  = "hussein.zoubi@hotmail.com";
$subject = "from Noblesoap.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], "Enter your name");

$email    = check_input($_POST['email']);

$comments = check_input($_POST['comments'], "Write your message");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}


/* Message for the e-mail */
$message = "Hello!

Your contact form has been submitted by:

Name: $name
E-mail: $email

Comments:
$comments

End of message
";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: thankyou.php');
exit();

/* Functions used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
<!doctype html>
<html>
<head>
<meta name="robots" content="noindex,nofollow">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Husein Alzoubi">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="icon" href="favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<title>Home | Noble Soap</title>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.js"></script>
</head>

<body>
<main class="container">
  <section class="text-center">
    <h1>Please correct the following error:</h1>
    <p><?php echo $myError; ?></p>
    <br/>
    <p id="backlink"> <a href="index.php">Go back</a> </p>
  </section>
</main>
</body>
</html>
<?php
exit();
}
?>
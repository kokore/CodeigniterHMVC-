<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PEWPEW</title>
</head>

<body>
    <form action="<?php echo base_url("pew/show") . '?' . $_SERVER['QUERY_STRING'] ?>" method="post">
        Username: <input type="text" name="uname"><br/>
        password: <input type="password" name="pname"><br/>
        <a href="<?php echo base_url("pew/registration")?>">Registration</a> <br/>
        <?php echo validation_errors(); ?>
        <input type="submit" value="Submit">
    </form>
</body>

</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
    <form action="<?php echo base_url("pew/regbth") . '?' . $_SERVER['QUERY_STRING'] ?>" method="post">
        Username: <input type="text" name="uname"><br/>
        Password: <input type="password" name="pname"><br/>
        Email: <input type="text" name="email"><br/>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
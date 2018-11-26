<?php
    session_start();
?>

<style type="text/css">
    .container-fluid{
        width: 500px;
        border: 1px gray solid;
        border-radius: 4px;
        margin-top: 20px;
    }

</style>
<!DOCTYPE html>
<html>
    <head>
        <title> Ottermart - Admin </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <h1>Ottermart - Admin Site</h1>
            <form method="POST" action="loginProcess.php">
                <strong>Username:</strong> <input type="text" class="form-control" name="username" placeholder="Enter username"/><br />
                <strong>Password:</strong> <input type="password" class="form-control" name="password" placeholder="Password"/><br />
                <input type="submit" class='btn btn-primary' name="submitForm" value="Login!"/><br />
                <br/>
            </form>
            <?php
                if($_SESSION['incorrect']){
                echo "<p class='lead' id='error' style='color:red'>";    
                echo "<strong>Incorrect Username or Password!</strong></p>";
                }
            ?>
        </div>
    </body>
</html>
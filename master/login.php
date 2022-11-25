<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RW 006 Kebonsari</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/vendor/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/master.css">
        <style>
            body {
                background: url('../assets/image/bg-login.JPG') rgba(31, 41, 55, 0.5);
                background-size: cover;
                background-repeat: no-repeat;
                background-blend-mode: multiply;
                height: 100%;
            }
        </style>
    </head>
    <body>
        <section class="pt-5 pb-5">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <form action="proses_login.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">User Name</label>
                                <input type="text" name="username_user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password_user" class="form-control" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-primary">Log In</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
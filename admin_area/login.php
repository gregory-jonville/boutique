<?php require_once '../core/init.php';

if (isset($_POST['login'])) {
    
    $admin_email = $getFromU->checkInput($_POST['admin_email']);
    $admin_pass = $getFromU->checkInput($_POST['admin_pass']);

    if (!empty($admin_email) && !empty($admin_pass)) {

        if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
            $error = "Adresse email invalide !";
        } elseif (strlen($admin_pass) < 5) {
            $error = "Le mot de passe doit comporter au minimum 5 caractères.";
        } else {
            $admin_login = $getFromU->admin_login($admin_email, $admin_pass);
            if ($admin_login === false) {
                $error = "Email ou password incorrect !";
            }
        }
    }
}

?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="./assets/css/main.min.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="./assets/css/auth-light.css" rel="stylesheet" />
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="brand">
            <a class="link" href="index.php">Admin</a>
        </div>
        <form id="login-form" action="login.php" method="post" class="rounded">
            <h2 class="login-title">Connexion</h2>
            <?php if (isset($error)) : ?>
                <div class="alert alert-danger text-center text-white alert-dismissible fade show" role="alert">
                    <?php echo $error; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="email" name="admin_email" placeholder="Email" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="admin_pass" placeholder="Password">
                </div>
            </div>
            <div class="form-group d-flex justify-content-between">
                <label class="ui-checkbox ui-checkbox-info">
                    <input type="checkbox">
                    <span class="input-span"></span>Se souvenir de moi</label>
                <a href="#">Mot de passe oublié ?</a>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit" name="login">Connexion</button>
            </div>
        </form>
    </div>
    <!-- PLUGINS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <!-- SCRIPTS-->
    <script src="./assets/js/app.min.js"></script>
    <!-- SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    admin_email: {
                        required: true,
                        email: true
                    },
                    admin_pass: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>
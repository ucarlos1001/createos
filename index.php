<?php
    session_start();

    if(isset($_SESSION['admin_logged'])) {
        header('Location: painel/');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Acessar Gerador | Gerador de OS</title>

    <!-- Links to style documents -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/general.css">

    <!-- Link to import icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <!-- Wrapper -->
    <div class="wrapper" id="wrapper">

        <!-- Change Password -->
        <div class="change-password" id="change-password">
            <div class="container">
                <div class="text">
                    <p>Um e-mail será enviado ao seu e-mail para continuar com a alteração da senha de sua conta.</p>
                </div>

                <form action="">
                    <input type="email" placeholder="E-mail vinculado com sua conta">
                    <button type="submit">
                        <i class="fas fa-envelope"></i>
                        Solocitar
                    </button>
                </form>
            </div>
        </div>
        <!-- End Change Password -->

        <!-- Login -->
        <div class="login" id='login'>

            <!-- Container Login -->
            <div class="container" id="container-login">
                <!-- Text -->
                <div class="text">
                    <h1>Acessar Gerador</h1>
                    <p>Preencha os campos abaixo para acessar o gerador de OS.</p>
                </div>

                <!-- Form Login -->
                <form id="form-login">
                    <div class="input-block">
                        <label for="user">Nome de Usuário</label>
                        <input type="text" name="user" id="user" placeholder="Ex: marcosbr05">
                    </div>
                    <div class="input-block">
                        <label for="password">Senha de Acesso</label>
                        <input type="password" name="password" id="password" placeholder="Ex: ************">
                        <span class="show-password" onclick="showPassword()">Mostrar senha</span>
                    </div>
                    

                    <button type="submit" id="btn-submit">
                        <i class="fas fa-sign-in-alt"></i>
                        Acessar
                    </button>

                    <div class="error-area">
                        <div class="content">
                            <p> 
                                <i class="fas fa-exclamation-triangle"></i>
                                <span></span>
                            </p>
                        </div>
                    </div>

                    <a id="open-change">Esqueceu sua senha?</a>
                </form>
                <!-- End Form Login -->

            </div>
            <!-- End Container Login -->

            <!-- Process Login -->
            <div class="process-login" id="process-login"></div>
        </div>
        <!-- End Login -->

    </div>
    <!-- End Wrapper -->

    <script src="js/login.js"></script>
</body>
</html>
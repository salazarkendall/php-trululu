<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Tienda Trululu</title>
    <link rel="stylesheet" href="/trululu/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link href="/trululu/images/logo-trululu-store.png" type="image" rel="shortcut icon" />
</head>

<body>
    <img src="/trululu/images/Logo-Trululu.png" class="logo" alt="">
    <main>
        <div class="main_container">
            <div class="bg_box">
                <div class="bg_box_login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia sesión para entrar en la página</p>
                    <button id="btn_on_session" class="btn">Iniciar Sesión</button>
                </div>
                <div class="bg_box_register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Registrate para iniciar sesión</p>
                    <button class="btn" id="btn_on_register">Registrarse</button>
                </div>
            </div>

            <div class="container_login-register">
                <!-- Login -->
                <form method="POST" class="form_login">
                    <h2>Iniciar Sesión</h2>

                    <input type="text" name="emailLogin" id="emailLogin" class="field" placeholder="Correo Electrónico">
                    <span class="error"></span>

                    <input type="password" name="passwordLogin" id="passwordLogin" class="passwordLogin" placeholder="Contraseña">
                    <span class="error"></span>
                    <span class="error" id="loginHint"></span>

                    <div class="CTA">
                        <input type="submit" value="Iniciar Sesión" id="btnLogin" class="btn" />
                    </div>
                </form>

                <!-- Registro -->
                <form method="POST" class="form_register">
                    <h2>Registrarse</h2>
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="name" placeholder="Nombre">
                        <span class="error"></span>
                    </div>

                    <div class="form-group">
                        <input type="text" name="lastName1" id="lastName1" class="lastName1" placeholder="Primer Apellido">
                        <span class="error"></span>
                    </div>

                    <div class="form-group">
                        <input type="text" name="lastName2" id="lastName2" class="lastName2" placeholder="Segundo Apellido">
                        <span class="error"></span>
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" id="email" class="email" required placeholder="Correo Electrónico">
                        <span class="error"></span>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" id="password" class="password" placeholder="Contraseña">
                        <span class="error"></span>
                    </div>

                    <div class="CTA">
                        <input type="submit" id="btnRegister" value="Crear Cuenta" class="btn" />
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script src="/trululu/scripts/loginScript.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
    <script src="./scripts/loginSP.js"></script>
    <script src="scripts/index.js"></script>
</body>

</html>
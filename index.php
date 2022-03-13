<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/index.css" rel="stylesheet"/>
<title>Cadastro de usuário</title>
</head>
<body>
<h2 class="titulo">Cadastro de usuário</h2>

<form action="index.php" method="post">
  	<div class="container">
		<label for="nome">Nome:</label>
		<input type="text" placeholder="Seu nome" name="nome" required>
		<br>
		<label for="email">E-mail:</label>
		<input type="email" placeholder="Seu E-mail" name="email" required>
		<br>
		<label for="psw">Senha:</label>
		<input type="password" placeholder="Senha" name="psw" required>
		<br>
		<label for="psw2">Repetir Senha:</label>
		<input type="password" placeholder="Repetir senha" name="psw2" required>
        <br>
		<br>
		<input type="submit" name ="grava" value ="Gravar">
		<br>
		<br>
		<a href="login.php" target="_blank">Já possuí uma conta? Clique aqui para entrar!</a></noscript>
	</div>
</form>
</body>
</html>

<?php  
 $host = "localhost";  
 $username = "root";  
 $password = "";  
 $database = "pw2_bd";  
 $message = "";  
 
		$botao = filter_input(INPUT_POST, 'grava', FILTER_SANITIZE_STRING);  
		$usuario = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING); //Recebe o nome do form
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);//Recebe o email do form
		$senha = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_STRING);//Recebe o email do form
		$senha2 = filter_input(INPUT_POST, 'psw2', FILTER_SANITIZE_STRING); 
    //    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING); 
 
 try  
 { 		

      $conexao = new PDO("mysql:host=$host; dbname=$database", $username, $password);  
      $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
 	  if($botao)
      {  

			
	    if($senha == $senha2)
		{
	 
      $dados = "insert into cadastro(nome,email,pass) values ('$usuario','$email','$senha')";  
       $grava_dados = $conexao->prepare($dados);	
				if($grava_dados->execute())		{
				?>
				<script>alert("Dados gravados com sucesso!");</script>
				<?php
				}
				else  
                {  
				?>
				<script>alert("Dados não gravados!");</script>
				<?php
                }  
		}
		else{
			echo "As senhas devem ser iguais!";
		}
    }  
 }  
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  

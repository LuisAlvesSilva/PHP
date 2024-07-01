<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/signup.css">
    <meta name="author" content="Seu Nome ou Empresa">
    <title>Tela de Login</title>
</head>
<body>
    <?php
        require('./connection.php'); 

        if (isset($_POST['signUP-button'])) {
            $nome = trim($_POST['nome']);
            $sobrenome = trim($_POST['sobrenome']);
            $email = trim($_POST['email']);
            $pass = trim($_POST['password']);
            $confpass = trim($_POST['confpassword']);

            if (!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($pass) && !empty($confpass)) {
                if ($pass === $confpass) {
                    $con = Crud::conect(); 
                    if ($con) {
                        $query = 'INSERT INTO CRUDTABLE(nome, sobrenome, email, pass) VALUES (?, ?, ?, ?)';
                        $params = array($nome, $sobrenome, $email, $pass);

                        $stmt = sqlsrv_query($con, $query, $params);
                        if ($stmt === false) {
                            die('Erro na execução da query: ' . print_r(sqlsrv_errors(), true));
                        } else {
                            echo '';
                        }
                    } else {
                        echo 'Não foi possível conectar ao banco de dados.';
                    }
                } else {
                    echo 'Senhas não correspondem!';
                }
            } else {
                echo 'Por favor, preencha todos os campos!';
            }
        }
    ?>

    <div class="form">
        <div class="titulo">
            <p>Crie sua Conta</p>
        </div>
        <form action="" method="post">
            <input type="text" name="nome" placeholder="Nome" required>
            <input type="text" name="sobrenome" placeholder="Sobrenome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Senha" required>
            <input type="password" name="confpassword" placeholder="Confirmar Senha" required>
            <input type="submit" value="Sign Up" name="signUP-button">
        </form>
    </div>
</body>
</html>

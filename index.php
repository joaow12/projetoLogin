<?php 
require_once 'CLASSES/usuarios.php';
$u = new Usuario();
?>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Projeto Login</title>
    <link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
    <div class="corpo">
        <h1>ENTRAR</h1>
        <form method="POST">
            <input type="email" name="email" placeholder="Usuário">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" value="ACESSAR" class="botao">
            <a href="cadastrar.php">Ainda não tem cadastro? <strong>CADASTRE-SE</strong></a>
        </form>
    </div>
    <?php
    if(isset($_POST['email']))
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        
        if(!empty($email) && !empty($senha))
        {
            $u->conectar("tela_login","localhost","root","");
            if($u->msgErro == "")
            {
                if($u->logar($email,$senha))
                {
                    header("location: AreaPrivada.php");
                }
                else
                {
                    ?>
                    <div class="msg-erro">
                        Email e/ou senha estão incorretos!
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                <div class="msg-erro">
                    <?php echo "Erro: ".$u->msgErro; ?>
                </div>
                <?php
            }
        }else
        {
            ?>
            <div class="msg-erro">
                Preencha todos os campos!
            </div>
            <?php
        }
    }
    ?>
</body>
</html>
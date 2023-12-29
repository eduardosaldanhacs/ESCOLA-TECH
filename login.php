<?php
    require_once("templates/header.php");
    echo $_SESSION['token'];
?>
    
    <div class="login-container">
        <div class="login-content">
            <form action="<?= $BASE_URL ?>login_process.php" method="POST">
                <h4>Entre:</h4>
                <input type="hidden" name="type" value="login">
                    <label for="email">Digite o seu email:</label>
                    <input type="email" name="email">
                    <label for="password">Digite a sua senha:</label>
                    <input type="password" name="senha">
                <input type="submit" value="Login" class="login-button">
            </form>
        </div>
        <div class="register-content">
            <form action="<?= $BASE_URL ?>login_process.php" method="POST">
                <h4>Cadastre-se:</h4>
                <input type="hidden" name="type" value="register">
                    <label for="text">Digite o seu nome:</label>
                    <input type="text" name="nome">
                    <label for="number">Escolha a sua turma:</label>
                    <select name="turma" id="">
                        <option value="101">Turma 101</option>
                        <option value="102">Turma 102</option>
                        <option value="201">Turma 201</option>
                        <option value="202">Turma 202</option>
                        <option value="301">Turma 301</option>
                        <option value="302">Turma 302</option>
                    </select>
                    <label for="number">Digite a sua idade:</label>
                    <input type="number" name="idade">
                    <label for="email">Digite o seu email:</label>
                    <input type="email" name="email">
                    <label for="password">Digite a sua senha</label>
                    <input type="password" name="senha"> 
                    <label for="password">Confirme a sua senha</label>
                    <input type="password" name="senha2">
                <input type="submit" value="Cadastrar" class="login-button">
            </form>
        </div>
    </div>

<?php
    require_once("templates/footer.php");
?>
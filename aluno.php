<?php
    require_once("templates/header.php")
?>

<div class="aluno-container">
    <div class="aluno-content">
        <div class="aluno-nome">
            <h2>Olá, <?= $aluno['nome'] ?> - <?= $aluno["turma"] ?></h2>
        </div>
        <div class="aluno-nav">
            <ul>
                <li class="aluno-list-item"><a href="">Minhas notas</a></li>
                <li class="aluno-list-item"><a href="">Frequência</a></li>
                <li class="aluno-list-item"><a href="">Matrícula</a></li>
                <li class="aluno-list-item"><a href="">Documentos</a></li>
                <li class="aluno-list-item"><a href="">Cadastro</a></li>
            </ul>
        </div>
    </div>
</div>

<?php
    require_once("templates/footer.php")
?>
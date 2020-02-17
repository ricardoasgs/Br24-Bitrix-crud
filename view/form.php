<!DOCTYPE html>
<html lang="pt-br">
<?php include("header.php"); ?>

<form class="text-center border border-light p-5" action="../controller/cadastrar-empresa.php" method="POST">

    <p class="h4 mb-4">Cadastre-se</p>


    <input type="text" name="nome" class="form-control mb-4" placeholder="Name">


    <input type="phone" name="telefone" class="form-control mb-4" placeholder="Telefone">


    <input type="email" name="email" class="form-control mb-4" placeholder="E-mail">


    <input type="text" name="cpf" class="form-control mb-4" placeholder="CPF">


    <input type="text" name="empresa" class="form-control mb-4" placeholder="Nome da Empresa">


    <input type="text" name="cnpj" class="form-control mb-4" placeholder="CNPJ">


    <button class="btn btn-primary btn-block" type="submit">Cadastrar</button>


</form>


<?php include("footer.php"); ?>
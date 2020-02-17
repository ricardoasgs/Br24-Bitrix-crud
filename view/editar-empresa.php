<!DOCTYPE html>
<html lang="pt-br">
<?php include("header.php"); ?>
<?php require_once("../controller/atualizar-empresa.php");?>
<form class="text-center border border-light p-5" action="../controller/atualizar-empresa.php" method="POST">

    <p class="h4 mb-4">Cadastre-se</p>


    <input type="text" name="nome" class="form-control mb-4" placeholder="Name"
        value=<?php echo $Empresa->getNome(); ?>>


    <input type="phone" name="telefone" class="form-control mb-4" placeholder="Telefone"
        value=<?php echo $Empresa->getTelefone(); ?>>


    <input type="email" name="email" class="form-control mb-4" placeholder="E-mail"
        value=<?php echo $Empresa->getEmail(); ?>>


    <input type="text" name="cpf" class="form-control mb-4" placeholder="CPF" value=<?php echo $Empresa->getCpf(); ?>>


    <input type="text" name="empresa" class="form-control mb-4" placeholder="Nome da Empresa"
        value=<?php echo $Empresa->getEmpresa(); ?>>


    <input type="text" name="cnpj" class="form-control mb-4" placeholder="CNPJ"
        value=<?php echo $Empresa->getCnpj(); ?>>

    <input type="hidden" name="id" value="<?php echo $Empresa->getId();?>">
    <button class="btn btn-primary btn-block" type="submit">Cadastrar</button>


</form>



<?php include("footer.php"); ?>
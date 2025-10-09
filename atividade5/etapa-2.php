<?php
session_start();
$erro_nome = "";
$erro_cpf = "";
$erro_telefone = "";
$erro_email = "";
$erro_localizacao = "";
$erro_estado = "";
$erro_cidade = "";
$erro_endereco = "";
$erro_bairro = "";
$erro_complemento = "";
$erro_validacao = 0;
if (isset($_POST["botao"])) {
	$_SESSION["nome"]  = $_POST["nome"];
	$_SESSION["cpf"] = $_POST["cpf"];
	$_SESSION["telefone"]  = $_POST["telefone"];
    $_SESSION["email"]  = $_POST["email"];
    $_SESSION["localizacao"]  = $_POST["localizacao"];
    $_SESSION["estado"]  = $_POST["estado"];
    $_SESSION["cidade"]  = $_POST["cidade"];
    $_SESSION["endereco"]  = $_POST["endereco"];
    $_SESSION["bairro"]  = $_POST["bairro"];
    $_SESSION["complemento"]  = $_POST["complemento"];

		// VALIDACAO: NOME É OBRIGATORIO
	if ($_SESSION["nome"] == "") {
		$erro_nome = "<span style='color:blue'>Preencha o nome</span>";
		$erro_validacao ++;
	} 

		// VALIDAÇÃO: cpf É OBRIGATÓRIO		
	if (($_SESSION["cpf"] == "") ){
		$erro_cpf = "<span style='color:blue'>Preenchimento inválido ! Digite Apenas números</span>";
		$erro_validacao ++;
	}
    
    if ($_SESSION["telefone"] == "") { 
		$erro_telefone = "<span style='color:blue'>Preenchimrnto inválido ! Digite Apenas 11 números</span>";
		$erro_validacao ++;
	}

    if ($_SESSION["email"] == "") {
		$erro_email = "<span style='color:blue'>Preenchimento inválido ! Digite o email</span>";
		$erro_validacao ++;
	}

    if ($_SESSION["localizacao"] == "") {
		$erro_localizacao = "<span style='color:blue'>Preencha a Localização (Brasil)</span>";
		$erro_validacao ++;
	}

    $estado_ver = ["AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO"];
    if (!in_array($_SESSION["estado"] = strtoupper($_SESSION["estado"]), $estado_ver)) {
		$erro_estado = "<span style='color:blue'>Preenchimento inválido ! Digite Apenas as siglas do Estado</span>";
		$erro_validacao ++;
	}

    if ($_SESSION["cidade"] == "") {
		$erro_cidade = "<span style='color:blue'>Preencha a Cidade</span>";
		$erro_validacao ++;
	}

    if ($_SESSION["endereco"] == "") {
		$erro_endereco = "<span style='color:blue'>Preenchimento inválido ! Digite apenas letras </span>";
		$erro_validacao ++;
	}

    if ($_SESSION["bairro"] == "") {
		$erro_bairro = "<span style='color:blue'>Preencha o Bairro</span>";
		$erro_validacao ++;
	}

    if ($_SESSION["complemento"] == "") {
		$erro_complemento = "<span style='color:blue'>Preencha o Complemento</span>";
		$erro_validacao ++;
	}

	// SEM ERRO DE VALIDAÇÃO
	// VAI PARA PROXIMA ETAPA
	if ($erro_validacao == 0) {
		Header("location:etapa-3.php");
	}
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Roupas</title>
</head>
<body>
	<h2>DADOS DO CLIENTE</h2>
	<form method="POST" action="etapa-2.php"> <br/>
		Nome:  <input type="text" name="nome" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["nome"])) echo $_SESSION["nome"] ?>">
		<?php echo $erro_nome ?> 
		<br/><br/>

		CPF:  <input type="number" name="cpf" size="20" maxlength="11" minlength="11"
		value="<?php if (isset($_SESSION["cpf"])) echo $_SESSION["cpf"] ?>">
		<?php echo $erro_cpf ?> 
		<br/><br/>

        Telefone:  <input type="number" name="telefone" size="20" maxlength="11" minlength="11" placeholder="Apenas números"
		value="<?php if (isset($_SESSION["telefone"])) echo $_SESSION["telefone"] ?>">
		<?php echo $erro_telefone ?> 
		<br/><br/>

        Email:  <input type="email" name="email" size="30" maxlength="30" minlength="10"
		value="<?php if (isset($_SESSION["email"])) echo $_SESSION["email"] ?>">
		<?php echo $erro_email ?> 
		<br/><br/>

        Localização:  <input type="text" name="localizacao" size="40" maxlength="35" placeholder="Brasil"
		value="<?php if (isset($_SESSION["localizacao"])) echo $_SESSION["localizacao"] ?>">
		<?php echo $erro_localizacao ?> 
		<br/><br/>

        Estado:  <input type="text" name="estado" size="2" maxlength="2" minlength="2" style="text-transform: uppercase"
		value="<?php if (isset($_SESSION["estado"])) echo $_SESSION["estado"] ?>">
		<?php echo $erro_estado ?> 
		<br/><br/>

        Cidade:  <input type="text" name="cidade" size="50" maxlength="50" minlength="3"
		value="<?php if (isset($_SESSION["cidade"])) echo $_SESSION["cidade"] ?>">
		<?php echo $erro_cidade ?> 
		<br/><br/>

        Endereço: <input type="text" name="endereco" size="60" maxlength="50" 
		value="<?php if (isset($_SESSION["endereco"])) echo $_SESSION["endereco"] ?>"> 
		<?php echo $erro_endereco?>
        <br/> <br/>
		
		Bairro: <input type="text" name="bairro" size="50" maxlength="50" 
		value="<?php if (isset($_SESSION["bairro"])) echo $_SESSION["bairro"] ?>">
		<?php echo $erro_bairro ?>
        <br/><br/>

        Complemento:  <input type="text" name="complemento" size="60" maxlength="50" minlength="5"
		value="<?php if (isset($_SESSION["complemento"])) echo $_SESSION["complemento"] ?>">
		<?php echo $erro_complemento ?> 
		<br/><br/>


		<br/><br/><br/><br/>
		<input type="submit" value="prosseguir" name="botao">
	</form>
	<a href="index.php"><button>Voltar</button></a>
</body>
</html>
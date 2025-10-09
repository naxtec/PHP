<?php
session_start();
$erro_quantidade = "";
$erro_vestido = "";
$erro_quantidadeV = "";
$erro_calca = "";
$erro_quantidadeC = "";
$erro_validacao = 0;

if (isset($_POST["botao"])) {
	$_SESSION["acessorio"]  = $_POST["acessorio"];
	$_SESSION["qtdade1"] = $_POST["qtdade1"];
    $_SESSION["vestido"]  = $_POST["vestido"];
    $_SESSION["qtdade2"] = $_POST["qtdade2"];
    $_SESSION["calca"]  = $_POST["calca"];
    $_SESSION["qtdade3"] = $_POST["qtdade3"];

	if ($_SESSION["qtdade1"] < 1) {
		$erro_quantidade = "<span style='color:red'>Preencher Quantidade</span>";
		$erro_validacao ++;
	}

	if ($_SESSION["qtdade1"] > 4) {
		$erro_quantidade = "<span style='color:red'>Limite de Venda excedido</span>";
		$erro_validacao ++;
	}

    if ($_SESSION["vestido"] == "") {
		$erro_camisa = "<span style='color:red'>Escolha um tipo de vestido</span>";
		$erro_validacao ++;
	}

    if ($_SESSION["qtdade2"] < 1) {
		$erro_quantidadeV = "<span style='color:red'>Preencher Quantidade</span>";
		$erro_validacao ++;
	}

	if ($_SESSION["qtdade2"] > 4) {
		$erro_quantidadeV = "<span style='color:red'>Limite de Venda excedido</span>";
		$erro_validacao ++;
	}

    if (empty($_SESSION["calca"])) {
		$erro_calca = "<span style='color:red'>Escolha um tipo de calça</span>";
		$erro_validacao ++;
	}

    if ($_SESSION["qtdade3"] < 1) {
		$erro_quantidadeC = "<span style='color:red'>Preencher Quantidade</span>";
		$erro_validacao ++;
	}

	if ($_SESSION["qtdade3"] > 4) {
		$erro_quantidadeC = "<span style='color:red'>Limite de Venda excedido</span>";
		$erro_validacao ++;
	}

	if ($erro_validacao == 0) {
		Header("location:etapa-4.php");
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
	<h2> DADOS dos Produtos </h2>
	<form method = "POST" action="etapa-3.php">
		<! acessando dados etapa 2 >
		<h2>Escolha seus Produtos:</h2>
		<fieldset>
        <h2>Acessórios:</h2> 
		<select name="acessorio"> 
			<option value="1" <?php if((isset($_SESSION["acessorio"])) AND ($_SESSION["acessorio"] == "1")) echo 'selected="true"' ?>> Cinto - R$ 60,00 </option> 
			<option value="2" <?php if((isset($_SESSION["acessorio"])) AND ($_SESSION["acessorio"] == "2")) echo 'selected="true"' ?>> Bolsa de Mão  -  R$ 120,00 </option> 
			<option value="3" <?php if((isset($_SESSION["acessorio"])) AND ($_SESSION["acessorio"] == "3")) echo 'selected="true"' ?>> Brinco (Par) - R$ 35,00 </option>
			<option value="4" <?php if((isset($_SESSION["acessorio"])) AND ($_SESSION["acessorio"] == "4")) echo 'selected="true"' ?>> Lenço / Encharpe - R$ 80,00 </option>
		</select><br/>

		Quantidade: 
		<input type="text" name="qtdade1" size="1" maxlength="1" 
		value="<?php if (isset($_SESSION["qtdade1"])) echo $_SESSION["qtdade1"] ?>" />
		<?php echo $erro_quantidade ?>
        </fieldset>
        <br/><br/>

        <fieldset>
        <h2>Vestido:</h2>
		    <input type="radio" name="vestido" value="Vestido Tubinho - R$ 140,00" <?php if((isset($_SESSION["vestido"])) AND ($_SESSION["vestido"] == "Vestido Tubinho - R$ 140,00")) echo 'checked' ?>> Vestido Tubinho - R$ 140,00<br>
		    <input type="radio" name="vestido" value="Vestido Longo - R$ 220,00" <?php if((isset($_SESSION["vestido"])) AND ($_SESSION["vestido"] == "Vestido Longo - R$ 220,00")) echo 'checked' ?>> Vestido Longo - R$ 220,00<br>
		    <input type="radio" name="vestido" value="Vestido Envelope (Wrap Dress) - R$ 180,00" <?php if((isset($_SESSION["vestido"])) AND ($_SESSION["vestido"] == "Vestido Envelope (Wrap Dress) - R$ 180,00")) echo 'checked' ?>> Vestido Envelope (Wrap Dress) - R$ 180,00<br>
		    <input type="radio" name="vestido" value="Vestido Camiseta (T-Shirt Dress) - R$ 120,00" <?php if((isset($_SESSION["vestido"])) AND ($_SESSION["vestido"] == "Vestido Camiseta (T-Shirt Dress) - R$ 120,00")) echo 'checked' ?>> Vestido Camiseta (T-Shirt Dress) - R$ 120,00<br>
		<?php echo $erro_vestido ?>

        Quantidade: 
		<input type="text" name="qtdade2" size="1" maxlength="1" 
		value="<?php if (isset($_SESSION["qtdade2"])) echo $_SESSION["qtdade2"] ?>" />
		<?php echo $erro_quantidadeV ?>
        </fieldset>       
        <br/><br/>

        <fieldset>
		<h2>Calça:</h2>
		<input type="checkbox" name="calca[]" value="Calça Skinnny - R$ 120,00" <?php if((isset($_SESSION["calca"])) AND in_array("Calça Skinnny - R$ 120,00", $_SESSION["calca"])) echo 'checked' ?>> Calça Skinnny - R$ 120,00<br>
		<input type="checkbox" name="calca[]" value="Calça Pantalona - R$ 180,00" <?php if((isset($_SESSION["calca"])) AND in_array("Calça Pantalona - R$ 180,00", $_SESSION["calca"])) echo 'checked' ?>> Calça Pantalona - R$ 180,00<br>
		<input type="checkbox" name="calca[]" value="Calça Cargo - R$ 160,00" <?php if((isset($_SESSION["calca"])) AND in_array("Calça Cargo - R$ 160,00", $_SESSION["calca"])) echo 'checked' ?>> Calça Cargo - R$ 160,00<br>
		<input type="checkbox" name="calca[]" value="Calça Social (Alfaiataria) - R$ 240,00" <?php if((isset($_SESSION["calca"])) AND in_array("Calça Social (Alfaiataria) - R$ 240,00", $_SESSION["calca"])) echo 'checked' ?>> Calça Social (Alfaiataria) - R$ 240,00<br>
		<?php echo $erro_calca ?>

        Quantidade: 
		<input type="text" name="qtdade3" size="1" maxlength="1" 
		value="<?php if (isset($_SESSION["qtdade3"])) echo $_SESSION["qtdade3"] ?>" />
		<?php echo $erro_quantidadeC ?>
        </fieldset>
		<br/><br/> 
    

		<input type="submit" value="prosseguir" name="botao">
	</form>
	<a href="etapa-2.php"><button>Voltar</button></a>
</body>
</html>
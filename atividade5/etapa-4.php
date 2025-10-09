<?php
session_start();
$erro_pagto = "";
$erro_pagamentop = "";
$erro_frete = "";
$erro_validacao = 0;

if (isset($_POST["botao"])) {

	if (!empty($_POST["fpagto"])) {
		$_SESSION["fpagto"] = $_POST["fpagto"];
	}

    elseif (!empty($_POST["fpagtop"])) {
        $_SESSION["fpagto"] = $_POST["fpagtop"]; 
    }

    else {
		$erro_validacao++;
		$erro_pagto = '<span style="color:blue">Selecione uma forma de pagamento</span>';
	}

    if (!empty($_POST["frete"])) {
        $_SESSION["frete"] = $_POST["frete"];
    } else {
        $erro_frete = '<span style="color:red">Selecione o tipo de frete</span>';
        $erro_validacao++;
    }

	if ($erro_validacao == 0) {
		header("Location:confirma-.php");
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
	<h2> FORMA DE PAGAMENTO E FRETE  </h2>
	<form method = "POST" action="etapa-4.php">
		<! acessando dados etapa 3>
        <fieldset>
		<h2>Escolha a Forma de Pagamento</h2>
		<input type="radio" name="fpagto" value="1" <?php if ((isset($_SESSION["fpagto"])) AND ($_SESSION["fpagto"] == "1")) echo 'checked="true"' ?> >A vista desconto (Pix) 5% <br/>
		<input type="radio" name="fpagto" value="2" <?php if ((isset($_SESSION["fpagto"])) AND ($_SESSION["fpagto"] == "2")) echo 'checked="true"' ?> >A vista (dinheiro)  <br/>
		<input type="radio" name="fpagto" value="3" <?php if ((isset($_SESSION["fpagto"])) AND ($_SESSION["fpagto"] == "3")) echo 'checked="true"' ?> >Carnê 1x - Acréscimo de 10% <br/>
    <?php echo $erro_pagto ?>    
    </fieldset>    
    </br><br/>

    <fieldset>
        <h2>Parcelado no Crédito:
        <select name="fpagtop">
            <option value="4" <?php if((isset($_SESSION["fpagtop"])) AND ($_SESSION["fpagtop"] == "4")) echo 'selected="true"' ?>> -------- </option> 
			<option value="5" <?php if((isset($_SESSION["fpagtop"])) AND ($_SESSION["fpagtop"] == "5")) echo 'selected="true"' ?>> Parcelado em 3x - Acréscimo de 15% </option> 
			<option value="6" <?php if((isset($_SESSION["fpagtop"])) AND ($_SESSION["fpagtop"] == "6")) echo 'selected="true"' ?>> Parcelado em 6x - Acréscimo de 20% </option> 
			<option value="7" <?php if((isset($_SESSION["fpagtop"])) AND ($_SESSION["fpagtop"] == "7")) echo 'selected="true"' ?>> Parcelado em 9x - Acréscimo de 25% </option>
			
		</select>
        <?php echo $erro_pagamentop ?>
    </fieldset>
    

		<br/><br/> 

         <fieldset>
            <h3>Escolha o tipo de frete:</h3>
            <input type="radio" name="frete" value="sedex" <?php if(isset($_SESSION["frete"]) && $_SESSION["frete"]=="sedex") echo 'checked'; ?>> Sedex - 29,90<br>
            <input type="radio" name="frete" value="pac" <?php if(isset($_SESSION["frete"]) && $_SESSION["frete"]=="pac") echo 'checked'; ?>> PAC - 37,90<br>
            <input type="radio" name="frete" value="retirada" <?php if(isset($_SESSION["frete"]) && $_SESSION["frete"]=="retirada") echo 'checked'; ?>> Retirada na Loja - 0<br>
            <?php echo $erro_frete ?>
        </fieldset>

		<br/><br/><br/>
		<input type="submit" value ="prosseguir" name="botao">
	</form>
	<a href="etapa-3.php"><button>Voltar</button></a>
</body>
</html>
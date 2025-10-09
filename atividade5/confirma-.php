<?php 
	session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venda de Roupas</title>
</head>
<body>
	<?php
    	// recebendo dados - etapa 1
		$nome=$_SESSION["nome"]; 
		$cpf=$_SESSION["cpf"]; 
		$telefone=$_SESSION["telefone"];
        $email=$_SESSION["email"];
        $localizacao=$_SESSION["localizacao"];
        $estado=$_SESSION["estado"];
        $cidade=$_SESSION["cidade"];
        $endereco=$_SESSION["endereco"];
        $bairro=$_SESSION["bairro"];
        $complemento=$_SESSION["complemento"]; 
		

    	// recebendo dados - etapa 2
		$acessorio=$_SESSION["acessorio"];
		if ($acessorio==1) {
			$acessorio = "Cinto";
			$preco1 = 60;
		} elseif ($acessorio==2) {
			$acessorio = "Bolsa de Mão";
			$preco1 = 120;
		} elseif ($acessorio==3) {
			$acessorio = "Brinco (Par)";
			$preco1 = 35;	
		} elseif ($acessorio==4) {
			$acessorio = "Lenço / Encharpe";
			$preco1 = 80;	
        }else {
            $acessorio = "";
            $preco1 = 0;
        }
		$qtdade1=$_SESSION["qtdade1"];

        $vestido=$_SESSION["vestido"];
		if ($vestido=="Vestido Tubinho - R$ 140,00") {
			$vestido = "Vestido Tubinho ";
			$preco2 = 140;
		} elseif ($vestido=="Vestido Longo - R$ 220,00") {
			$vestido = "Vestido Longo";
			$preco2 = 220;
		} elseif ($vestido=="Vestido Envelope (Wrap Dress) - R$ 180,00") {
			$vestido = "Vestido Envelope (Wrap Dress)";
			$preco2 = 180;	
		} elseif ($vestido=="Vestido Camiseta (T-Shirt Dress) - R$ 120,00") {
			$vestido = "Vestido Camiseta (T-Shirt Dress)";
			$preco2 = 120;	
        }else {
            $vestido = "";
            $preco2 = 0;
        }
		$qtdade2=$_SESSION["qtdade2"];

        $calcaArray = $_SESSION["calca"]; 
        if (!empty($calcaArray)) {
            $calca = $calcaArray[0];
        
		    if ($calca=="Calça Skinnny - R$ 120,00") {
			    $calca = "Calça Skinnny ";
			    $preco3 = 120;
		    } elseif ($calca=="Calça Pantalona - R$ 180,00") {
			    $calca = "Calça Pantalona";
			    $preco3 = 180;
		    } elseif ($calca=="Calça Cargo - R$ 160,00") {
			    $calca = "Calça Cargo";
			    $preco3 = 160;	
		    } elseif ($calca=="Calça Social (Alfaiataria) - R$ 240,00") {
			    $calca = "Calça Social (Alfaiataria)";
			    $preco3 = 240;	    
            }else {
                $calca = "";
                $preco3 = 0;
            }
        }
		$qtdade3=$_SESSION["qtdade3"];



    	// calculando pagamento
		$total = ($preco1*$qtdade1)+($preco2*$qtdade2)+($preco3*$qtdade3);

        
        
    	// recebendo dados - etapa 3
		$fpagto=$_SESSION["fpagto"];
		if ($fpagto==1) {
			$fpagto = "A vista desconto (Pix) 5%";
			$valorpg = $total - ($total * 0.05);
			$vparc = 0;
		} elseif ($fpagto==2) {
			$fpagto = "A Vista (Dinheiro)";
			$valorpg = $total ;
			$vparc = 0;
        } elseif ($fpagto==3) {
			$fpagto = "Carnê 1x - Acréscimo de 10%";
			$valorpg = $total + ($total * 0.10);
			$vparc = 0;
        } elseif ($fpagto==5) {
			$fpagto = "Parcelado 3x - Acréscimo de 15%";
			$valorpg = $total + ($total * 0.15);
			$vparc = $valorpg / 3;
        } elseif ($fpagto==6) {
			$fpagto = "Parcelado 6x - Acréscimo de 20%";
			$valorpg = $total + ($total * 0.20);
			$vparc = $valorpg / 6;
        } elseif ($fpagto==7) {
			$fpagto = "Parcelado 9x - Acréscimo de 25%";
			$valorpg = $total + ($total * 0.25);
			$vparc = $valorpg / 9;
		} else{
			$c= "";
		}

        //valores do frete
        $frete = $_SESSION["frete"];
        if ($frete=="sedex") {
            $frete = "Sedex";
            $valorf= 29.90;
        } elseif ($frete=="pac") {
            $frete = "Pac";
            $valorf= 37.90;
        } elseif ($frete=="retirada") {
            $frete = "Retirada";
            $valorf= 0;
        }

        $valortotal = $valorpg + $valorf;

    	//Confirmando dados//
		echo "<h2> Confirmando Pedido</h2>";
		echo "<h3> DADOS DO CLIENTE<br /></h3>";
		echo "Nome do Cliente: $nome <br/>";
		echo "CPF: $cpf <br/>";
		echo "Telefone: $telefone <br/>";
        echo "Email: $email <br/><br/>";
        echo "Localização: $localizacao <br/><br/>";
        echo "Estado: $estado <br/><br/>";
        echo "Cidade: $cidade <br/><br/>";
        echo "Endereço: $endereco <br/><br/>";
        echo "Bairro: $bairro <br/><br/>";
        echo "Complemento: $complemento <br/><br/>";	

   	 	//Confirmando dados do pedido//
		echo "<h3> DADOS DO PEDIDO</h3>";
		echo "Acessório: $acessorio <br/>";
		echo "Quantidade: $qtdade1 <br/>";
		echo "Preço: $preco1 <br/><br/>";
        echo "Vestido: $vestido <br/>";
		echo "Quantidade: $qtdade2 <br/>";
		echo "Preço: $preco2 <br/><br/>";
        echo "Calça: $calca <br/>";
		echo "Quantidade: $qtdade3 <br/>";
		echo "Preço: $preco3 <br/><br/>";

		echo "Valor Total da Compra: $total <br/><br/>";

    	//Confirmando Forma de Pagamento//
		echo "<h3> FORMA DE PAGAMENTPO e FRETE <br/></h3>";
		echo "Forma de pagamento: $fpagto <br/>";
		echo "Valor a Pagar: $valorpg <br/>";
		echo "Valor Parcelado: $vparc <br/><br/><br/>";
        echo "Opções de Frete: $frete <br/>";
		echo "Valor a Pagar: $valorf <br/>";

        echo "Total a pagar com frete: $valortotal <br/>";
		
	?>
	<br/><br/>
	<a href="index.php"><button>Nova Venda</button></a>
	</body>
</html>
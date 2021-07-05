<?php
	function alerta ($texto="alerta!!!!")
	{
		echo "<script language=\"javascript\">alert('$texto'); </script>";
	}
	
	function transforma_data_BD($data)
	{
		//$date = date_create($data);
		$date = str_replace('/', '-', $data);
		
		return date('Y-m-d',strtotime($date));	
	}
	
	function transforma_data_apresentacao($data)
	{
		$date = date_create($data);
		
		return date_format($date, 'd/m/Y');	
	}
	
	function formata_texto_acentos($texto)
	{
		return htmlentities($texto,ENT_QUOTES, "ISO-8859-1");
	}
	
	function eliminar_cookie($nome_cookie)
	{
		unset($_COOKIE[$nome_cookie]);
		setcookie($nome_cookie, '', time() - 3600,'/');
	}
	
	function redireciona($pagina)
	{
		echo("<script language= \"JavaScript\">location.href=\"".$pagina."\";</script>");
	}
	
	function abre_base_dados(&$link,$escrever_erro=true)
	{
        $link = new mysqli('localhost', 'root', '', 'pap');

        if ($link->connect_errno)
            if ($escrever_erro) echo "ERRO 1 -> Não foi possível efetuar a ligação à base de dados: ".$link->connect_error;
        return 1;

        return 0;
	}
	
	function fecha_base_dados(&$link,$escrever_erro=true)
	{
		if (!mysqli_close($link))
		{
			if ($escrever_erro) echo "ERRO 2 -> Não foi possível fechar a ligação à base de dados.";
			return 2;
		}
		
		return 0;
	}
	
	function teste_se_tabela_existe($ligacao,$tabela,$escrever_erro=true)
	{
		$sql_str="SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = 'vbeta20' AND TABLE_NAME = '$tabela'";
		
		if (!$ligacao->query($sql_str))
		{
			if ($escrever_erro) echo "ERRO 3 -> Erro no tecnimobile_ddviagens se a tabela existe.\n".$sql_str;
			return 3;
		}
		
		return 0;
	}
	
	
	function teste_se_campo_existe($ligacao,$tabela,$campo,$escrever_erro=true)
	{
		$sql_str="SELECT * FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = 'gestmodprof' AND TABLE_NAME = '$tabela' AND COLUMN_NAME = '$campo'";
		
		if (!$ligacao->query($sql_str))
		{
			if ($escrever_erro) echo "ERRO 4 -> Erro no tecnimobile_ddviagens se o campo existe na tabela.\n".$sql_str;
			return 4;
		}
		
		return 0;
	}

	function valor_comparacao_campo($ligacao,$tabela,$campo,$valor,$comparacao,$escrever_erro=true,&$mensagem_de_erro=NULL)
	{
		if (($ligacao==NULL) || ($ligacao==""))
		{
			if ($escrever_erro) echo "ERRO 10 -> A ligação à base de dados não está efetuada.";
			return 10;
		}
		
		$tabela=trim($tabela);
		$campo=trim($campo);
		$comparacao=trim($comparacao);
		
		if ($tabela=="")
		{
			if ($escrever_erro) echo "ERRO 11 -> Tem de especificar uma tabela.";
			return 11;
		}
		
		if ($campo=="")
		{
			if ($escrever_erro) echo "ERRO 12 -> Tem de especificar um campo.";
			return 12;
		}
		
		if ($valor=="")
		{
			if ($escrever_erro) echo "ERRO 13 -> Tem de um valor para a comparação.";
			return 13;
		}
		
		if ($comparacao=="") 
		{
			if ($escrever_erro) echo "ERRO 14 -> Tem de especificar uma comparação.";
			return 14;
		}
		else
		{
			$comparacao=" WHERE ".$comparacao;
		}
		
		$sql_str="SELECT $campo FROM $tabela".$comparacao;
		$var_query=$ligacao->query($sql_str);
		
		if (!$var_query)
		{
			if ($escrever_erro) echo "ERRO 15 -> Erro no select à base de dados.\n".$sql_str;
			return 15;
		}
		
		if ($ligacao->affected_rows==0)
		{
			if ($escrever_erro) echo "ERRO 16 -> Não existem dados correspondentes a essa comparação.\n".$sql_str;
			return 16;
		}
		
		$row = $var_query->fetch_row();
		
		if ($valor!=$row[0])
		{
			if ($escrever_erro) echo "ERRO 17 -> O valor indicado e o valor na base de dados não são iguais.\n".$sql_str;
			return 17;
		}
		
		if ($escrever_erro) echo "O registo existe.";
		
		return 0;
	}
	
	function verifica_num_registos($ligacao, $tabelas, $comparacao="", $escrever_erro=true, &$mensagem="")
	{
		if (($ligacao==NULL) || ($ligacao==""))
		{
			if ($escrever_erro) echo "ERRO 20 -> A ligação à base de dados não está efetuada.";
			$mensagem="ERRO 20 -> A ligação à base de dados não está efetuada.";
			return 20;
		}

		$tabelas=trim($tabelas);
		$campos="*";
		$comparacao=trim($comparacao);
		
		if ($tabelas=="")
		{
			if ($escrever_erro) echo "ERRO 21 -> Tem de especificar uma tabela.";
			$mensagem="ERRO 21 -> Tem de especificar uma tabela..";
			return 21;
		}
		
		if ($campos=="")
		{
			if ($escrever_erro) echo "ERRO 22 -> Tem de especificar um campo.";
			$mensagem="ERRO 22 -> Tem de especificar um campo.";
			return 22;
		}
		
		if ($comparacao!="") $comparacao=" WHERE ".$comparacao;
		
		$sql_str="SELECT $campos FROM $tabelas".$comparacao;
			
		if (!$ligacao->query($sql_str))
		{
			if ($escrever_erro) echo "ERRO 23 -> Erro no select à base de dados.<br>".$sql_str;
			$mensagem="ERRO 23 -> Erro no select à base de dados.<br>".$sql_str;
			return 23;
		}
		
		$mensagem="Query String: ".$sql_str;
		return $ligacao->affected_rows;
	}
	
	function select_base_dados($ligacao,$tabelas,$campos="*",$comparacao="",$escrever_erro=true)
	{
		if (($ligacao==NULL) || ($ligacao==""))
		{
			if ($escrever_erro) echo "ERRO 25 -> A ligação à base de dados não está efetuada.";
			return 25;
		}

		$tabelas=trim($tabelas);
		$campos=trim($campos);
		$comparacao=trim($comparacao);
		
		if ($tabelas=="")
		{
			if ($escrever_erro) echo "ERRO 26 -> Tem de especificar uma tabela.";
			return 26;
		}
		
		if ($campos=="")
		{
			if ($escrever_erro) echo "ERRO 27 -> Tem de especificar um campo.";
			return 27;
		}
		
		if ($comparacao!="") $comparacao=" WHERE ".$comparacao;
		
		$sql_str="SELECT $campos FROM $tabelas".$comparacao;
			
		if (!$ligacao->query($sql_str))
		{
			if ($escrever_erro) echo "ERRO 28 -> Erro no select à base de dados.\n".$sql_str;
			return 28;
		}
		
		return 0;
	}
	
	function devolve_valor_campo($ligacao,$tabela,$campo_a_devolver,$comparacao,$escrever_erro=true,&$mensagem_de_erro=NULL)
	{
		$tabela=trim($tabela);
		$campo_a_devolver=trim($campo_a_devolver);
		$comparacao=trim($comparacao);
		
		if ($tabela=="")
		{
			if ($escrever_erro) echo "ERRO 31 -> Tem de especificar uma tabela.";
			return "ERRO 31";
		}
		
		if ($campo_a_devolver=="")
		{
			if ($escrever_erro) echo "ERRO 32 -> Tem de especificar um campo a devolver.";
			return "ERRO 32";
		}
		
		if ($comparacao=="") 
		{
			if ($escrever_erro) echo "ERRO 33 -> Tem de especificar uma comparação.";
			return "ERRO 33";
		}
		else
		{
			$comparacao=" WHERE ".$comparacao;
		}
		
		$sql_str="SELECT $campo_a_devolver FROM $tabela".$comparacao;
		$var_query=$ligacao->query($sql_str);
			
		if (!$var_query)
		{
			if ($escrever_erro) echo "ERRO 34 -> Erro no select à base de dados.<br>".$sql_str."<br>".$ligacao->error;
			return "ERRO 34";
		}
		
		if ($ligacao->affected_rows==0)
		{
			if ($escrever_erro) echo "ERRO 35 -> Não existem dados correspondentes a essa comparação.<br>".$sql_str;
			return "ERRO 35";
		}
		
		$mensagem_de_erro=$sql_str;		
		$row = $var_query->fetch_row();

		return $row[0];
	}
	
	function devolve_query($ligacao,$tabela,$campos="*",$comparacao="",$escrever_erro=true,&$mensagem_de_erro=NULL)
	{
		$tabela=trim($tabela);
		$campos=trim($campos);
		$comparacao=trim($comparacao);
		
		if ($tabela=="")
		{
			if ($escrever_erro) echo "ERRO 41 -> Tem de especificar uma tabela.";
			return 41;
		}
		
		if ($campos=="")
		{
			$campos="*";
		}
		
		if ($comparacao!="") 
		{
			$comparacao=" WHERE ".$comparacao;
		}
		
		$sql_str="SELECT $campos FROM $tabela".$comparacao;
		$var_query=$ligacao->query($sql_str);
			
		if (!$var_query)
		{
			if ($escrever_erro) echo "ERRO 44 -> Erro no select à base de dados.<br>".$sql_str."<br>".$ligacao->error;
			return 44;
		}
		
		return $var_query;
	}
	
	function elimina_registo($ligacao,$tabela,$comparacao="",$escrever_erro=true,&$mensagem_de_erro=NULL)
	{
		$tabela=trim($tabela);
		$comparacao=trim($comparacao);
		
		if ($tabela=="")
		{
			if ($escrever_erro) echo "ERRO 51 -> Tem de especificar uma tabela.";
			return 51;
		}
		
		if ($comparacao=="") 
		{
			if ($escrever_erro) echo "ERRO 53 -> Tem de especificar uma comparação.";
			return 53;
		}
		else
		{
			$comparacao=" WHERE ".$comparacao;
		}
		
		$sql_str="Delete FROM $tabela $comparacao".$comparacao;
		$var_query=$ligacao->query($sql_str);
			
		if (!$var_query)
		{
			if ($escrever_erro) echo "ERRO 54 -> Erro no select à base de dados.<br>".$sql_str."<br>".$ligacao->error;
			return 54;
		}
		
		$num_registos=$ligacao->affected_rows;

		return $num_registos;
	}
	?>
$(function(){	

	function alterarDados()
	{
		nome_cliente=$(this).closest("tr").children("td:nth-child(2)").html();
		email=$(this).closest("tr").children("td:nth-child(3)").html();
		sexo=$(this).closest("tr").children("td:nth-child(4)").html();
		data_nascimento=$(this).closest("tr").children("td:nth-child(5)").html();
		
		$('input[name=nome]').val(nome_cliente);
		$('input[name=sexo]').val(sexo);
		$('input[name=email]').val(email);
		$('input[name=data_nascimento]').val(data_nascimento);
		

	}

	$('.alterar').click(alterarDados);
})



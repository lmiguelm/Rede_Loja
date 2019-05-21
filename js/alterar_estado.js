$(function(){	

	function alterarDados()
	{
		nome_estado=$(this).closest("tr").children("td:nth-child(2)").html();
		sigla=$(this).closest("tr").children("td:nth-child(3)").html();
		
		$('input[name=nome]').val(nome_estado);
		$('input[name=sigla]').val(sigla);

	}

	$('.alterar').click(alterarDados);
})



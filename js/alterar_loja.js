$(function(){	

	function alterarDados()
	{
		razao_social=$(this).closest("tr").children("td:nth-child(2)").html();
		nome_fantasia=$(this).closest("tr").children("td:nth-child(3)").html();
		email=$(this).closest("tr").children("td:nth-child(4)").html();
		cod_cidade=$(this).closest("tr").children("td:nth-child(5)").html();
		
		$('input[name=razao_social]').val(razao_social);
		$('input[name=nome_fantasia]').val(nome_fantasia);
		$('input[name=email]').val(email);
		$('select[name=cod_cidade] option').each(function()
			{
				this.selected=$(this).html()==cod_cidade;
			});

	}

	$('.alterar').click(alterarDados);
})



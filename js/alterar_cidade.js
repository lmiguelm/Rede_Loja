$(function(){	

	function alterarDados()
	{
		nome_cidade=$(this).closest("tr").children("td:nth-child(2)").html();
		cod_estado=$(this).closest("tr").children("td:nth-child(3)").html();
		
		$('input[name=nome]').val(nome_cidade);
		$('select[name=cod_estado] option').each(function()
			{
				this.selected=$(this).html()==cod_estado;
			});

	}

	$('.alterar').click(alterarDados);
})



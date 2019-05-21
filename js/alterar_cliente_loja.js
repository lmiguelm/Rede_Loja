$(function(){	

	function alterarDados()
	{
		cod_cliente=$(this).closest("tr").children("td:nth-child(2)").html();
		cod_loja=$(this).closest("tr").children("td:nth-child(3)").html();
		
		$('select[name=cod_cliente] option').each(function()
			{
				this.selected=$(this).html()==cod_cliente;
			});

		$('select[name=cod_loja] option').each(function()
			{
				this.selected=$(this).html()==cod_loja;
			});

	}

	$('.alterar').click(alterarDados);
})



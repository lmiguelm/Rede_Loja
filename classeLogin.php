<?php

	class Login implements Exibicao{
		
		private $logo;
		private $form;		
		private $erro;		
		
		public function __construct($parametros, Form $f){			
			$this->logo = $parametros["logo"];
			$this->form = $f;

			if(isset($parametros["erro"]))
			{
				$this->erro=$parametros["erro"];
			}
		}

		
		public function exibe(){
			
			echo "	<br/><br/><br/><br/><br/><br/>
					<div class='col-xs-10 offset-xs-1 
					col-sm-6 offset-sm-3 
					col-md-4 offset-md-4'>
						<header>
						<img class='img-fluid' src='img/redes_de_lojas.jpg'/>
						<p class='text-center'>Entre com seu <b>E-mail</b> e <b>Senha</b></p>
					</header>";
						
			$this->form->exibe_form_login();
		
				echo '<div class="float-left">
                <button class="btn btn-default btn-secondary" data-toggle="modal" data-target="#NovoUsuario">Criar uma conta</button>

				<div class="modal" tabindex="-1" role="dialog" id="NovoUsuario">
			          <div class="modal-dialog" role="document">
			            <div class="modal-content">
			              <div class="modal-header">
			                <h5 class="modal-title">Novo Usuario</h5>
			                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                  <span aria-hidden="true">&times;</span>
			                </button>
			              </div>

			                <form action="insere.php?tabela=usuario" method="post">
			                  <div class="modal-body" >

			                    <div class="row">
			                        <div class="form-group col-sm-12 col-xs-12">
			                            <input type="text" name="nome" required="required" class="form-control" placeholder="Nome" />
			                        </div>
			                    </div>

			                    <div class="row">
			                        <div class="form-group col-sm-12 col-xs-12">
			                            <input type="date" name="data_nascimento" required="required" class="form-control"/>
			                        </div>
			                    </div>

			                    <div class="row">
			                        <div class="form-group col-sm-12 col-xs-12">
			                        	<label>Sexo:</label>
			                            <input type="radio" name="sexo" value="Masc" required="required"/>
			                            <label>Masc</label>
			                            <input type="radio" name="sexo" value="Fem"required="required"/>
			                            <label>Fem</label>
			                        </div>
			                    </div>

			                    <div class="row">
			                        <div class="form-group col-sm-12 col-xs-12">            
			                            <input type="email" name="email" required="required" class="form-control" placeholder="E-mail" />
			                        </div>
			                    </div>

			                    <div class="row">
			                       <div class="form-group col-sm-6 col-xs-12">
			                            <input type="password" name="senha" required="required" class="form-control password" placeholder="Senha" data-cript="sha1"/>
			                        </div>
			                   
			                        <div class="form-group col-sm-6 col-xs-12">
			                            <input type="password" name="senha"required="required" placeholder="Digite novamente" class="form-control password" data-cript="sha1"/>
			                        </div>
			                    </div>

			                    <input type="hidden" name="permissao" value="0"/>

			                  </div>
			                  <div class="modal-footer">
			                    <button type="reset" class="btn btn-secondary">Limpar</button>
			                    <button type="submit" class="btn btn-primary">Salvar</button>
			                  </div>
			                </form>

			            </div>
			          </div>
       			 </div>
				';
		}
		
		
	}


?>
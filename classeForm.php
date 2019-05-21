<?php
		
	include("classeInputOpcoes.php");
	include("classeSelect.php");
	include("classeButton.php");
	include("classeTextarea.php");
	
	class Form implements Exibicao{
		
		private $action;
		private $method;		
		public $entradas;
		
		public function __construct($parametros){
			
			$this->action = $parametros["action"];
			$this->method = $parametros["method"];
			
		}

		public function add_button($parametros){
			$this->entradas[] = new Button($parametros);
		}
		
		public function add_input($parametros){
			$this->entradas[] = new Input($parametros);
		}
		
		public function add_inputOpcoes($parametros){
			$this->entradas[] = new InputOpcoes($parametros);
		}		
		
		public function add_select($name,$options,$valor){
			$this->entradas[] = new Select($name,$options,$valor);
		}

		public function add_textarea($parametros){
			$this->entradas[] = new Textarea($parametros);
		}
		
		
		public function exibe(){
			
			
			echo "<div class='col-xs-10 offset-xs-1 
							col-sm-6 offset-sm-3 
					col-md-4 offset-md-4'>";
			echo "<form method='$this->method' action='$this->action'>";
						
			
			foreach($this->entradas as $i=>$e){				
				echo "<div class='form-group-sm'>";
				$e->exibe();
				echo "</div>";
			}
				echo "</form>";
			echo "</div>";
		}

		public function exibe_form_login()
		{
			echo "<form method='$this->method' action='$this->action'>";
						
			
			foreach($this->entradas as $i=>$e){				
				echo "<div class='form-group'>";
				$e->exibe();
				echo "</div>";
			}
			echo "<footer>
					<div class='float-right'>
						<button type='submit'
						class='btn btn-primary'>Entrar</button>
					</div>
				</footer>";
			echo "</form>";
		}
		
		
	}


?>
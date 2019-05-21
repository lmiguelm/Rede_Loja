<?php

	class Button implements Exibicao{
		
		private $label;
		
		public function __construct($label){
			$this->label = $label;
		}
		
		public function exibe(){
			echo 
			'	<br/>
				<div class="text-center">
                       <button type="submit" class="btn btn-success">Enviar</button>
                </div>
			';	
		}
		
	}


?>
<?php

	class Textarea implements Exibicao{
		
		private $name;
		private $placeholder;
		private $class;
		private $required;
			
		public function __construct($parametros){
			$this->name = $parametros["name"];
					
			if(isset($parametros["placeholder"])){
				$this->placeholder = $parametros["placeholder"];
			}
			if(isset($parametros["class"])){
				$this->class = $parametros["class"];
			}			
			if(isset($parametros["required"])){
				$this->required = $parametros["required"];
			}
		}
		
		public function exibe(){
			
			echo "<textarea name='$this->name'";
						
			if($this->placeholder!=null){
				echo " placeholder='$this->placeholder' ";
			}
			if($this->class!=null){
				echo " class='$this->class'";
			}
			if($this->required!=null){
				echo " required='$this->required' ";
			}
			echo "></textarea>";
		}
		
	}

?>
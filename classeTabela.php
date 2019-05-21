<?php

	class Tabela implements Exibicao{
		
		private $matriz;
		private $alterar;
		private $remover;
		private $tabela;
		
		public function __construct($matriz,$tabela,$alterar,$remover){			
				$this->matriz = $matriz;
				$this->alterar = $alterar;
				$this->remover = $remover;
				$this->tabela = $tabela;
		}
		
		
		public function exibe(){
			
			echo "<div class='col-xs-12
					col-sm-10 offset-sm-1
					col-md-8 offset-md-2'><table class='table table-sm table-hover table-dark text-center'border='1'>";	
			
					if($this->matriz!=null){
					foreach($this->matriz as $i=>$linha){		
						
						if($i==0){
							
							echo "
							<thead>
							<tr>";
							foreach($linha as $j=>$valor){					
								if(!is_numeric($j)){
									echo "<th>$j</th>";
								}
							}
							
							if($this->remover!=null || $this->alterar!=null){
								echo "<th>Ação</th>";
							}
							
							echo "</tr>
								  </thead>
								  <tbody>";
						}
						
						echo "<tr>";
						foreach($linha as $j=>$valor){					
							if(!is_numeric($j)){
								echo "<td class='$j'>$valor</td>";
							}
						}
						if($this->remover!=null || $this->alterar!=null){
							echo "<th>";
								if($this->alterar!=null){
									echo "<button type='button' class='alterar btn btn-secondary'>Alterar</button> ";
								}
								if($this->remover!=null){
									echo " <a  class='btn btn-danger'href='remover.php?tabela=$this->tabela&id=$linha[0]'>Remover</a>";
								}
							echo "</th>";							
						}
						echo "</tr>";					
					}
					}
					else{
						echo "<center>Nenhum dado inserido!</center>";
					}
			
			
			echo "</tbody></table></div>";
		}
		
		
	}


?>

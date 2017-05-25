<?php	
include "services.php";
				
	if($_SERVER['REQUEST_METHOD'] === 'GET' && 
	   isset($_GET["sID"]) && 
	   $_GET["sID"] != "")
	{ 
		echo RedirectToServices($_GET);		
	}
	else if($_SERVER['REQUEST_METHOD'] === 'POST' && 
	        isset($_POST["sID"]) && 
			$_POST["sID"] != "")
	{		
		echo RedirectToServices($_POST); 
	}	
	else 
	{
		echo "<h1>Método/Serviço requerido desconhecido!!</h1>";		
	}
	
	
	function RedirectToServices($methodRequest)
	{
		$GetHighScore = 0;
		$SetHighscore = 1;
				
		$services = Services::GetInstance();
		$errorMessage = "<h1>Problemas com os parametros do request!!</h1>";
		
		switch ($methodRequest["sID"])
		{
			case $GetHighScore: 
			
				return $services->GetHighscore(); 
				break;
				
			case $SetHighscore:
			
				if(isset($methodRequest["value"]) && 
					$methodRequest["value"] != "") 
				{
					return $services->SetHighscore($methodRequest["value"]);
				}
				else
				{
					return $errorMessage; 
				}
				
				break;
				
			default: return $errorMessage;
		}
	}
?>









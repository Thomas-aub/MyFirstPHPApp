<?php
function connectDB() {
			$host = 'localhost';
			$user = 'root';
			$db = 'compte';
			$pwd = '';
			try {
				$bdd = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $user,$pwd);
				   return $bdd;
						}catch (Exception $e) {
				exit('Erreur : '.$e->getMessage());
						}
		}
				
				
		$bdd = connectDb();
?>	
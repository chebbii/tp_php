<?php
	declare(strict_types = 1);
	function connexionDB() 
	{
		try 
		{
			$pdo = new PDO('mysql:host=database; dbname=ma_db','mon_user', 'secret!');
		} catch (Exception $e) {
			echo 'abc ',  $e->getMessage(), "\n";
		}
		return $pdo;
	}
	function connexionUserDB(object $pdo, string $username, string $password)
	{
		$query = 'SELECT * FROM user';
		$statement = $pdo->prepare($query);
		$statement->execute();
        while($matable = $statement->fetch(PDO::FETCH_ASSOC)) {
            if($username == $matable["username"] && password_verify($password, $matable["password"])) {
                $_SESSION["connexion"] = $matable["username"];
                $_SESSION["id"] = $matable["id"];
                return $_SESSION["connexion"];
            }
        }
        return false;
	}
	function addUser(object $pdo, string $username, string $password) : bool
	{
		$password = password_hash($password, PASSWORD_BCRYPT);
		$query = 'SELECT * FROM user';
		$statement = $pdo->prepare($query);
		$statement->execute();
        while($matable = $statement->fetch(PDO::FETCH_ASSOC)) {
            if(strcasecmp($username, $matable["username"]) == 0) {
                return false;
            }
        }
		$query = 'INSERT INTO user (username, password) VALUES (:username, :password)';
		$statement = $pdo->prepare($query); 
		$statement->execute([':username' => $username, ':password' => $password]);
		$data = $statement->fetch(PDO::FETCH_ASSOC);
		return true;
	}
	function addAx(object $pdo, string $title, string $content, int $author) : bool
	{
		$query = 'SELECT * FROM article';
		$statement = $pdo->prepare($query);
		$statement->execute();
        while($matable = $statement->fetch(PDO::FETCH_ASSOC)) {
            if($title == $matable["title"] || $content == $matable["content"]) {
                return false;
            }
        }
		$query = 'INSERT INTO article (title, content, author) VALUES (:title, :content, :author)';
		$statement = $pdo->prepare($query); 
		$statement->execute([':title' => $title, ':content' => $content, ':author' => $author]);
		$data = $statement->fetch(PDO::FETCH_ASSOC);
		return true;
	}
	function viewAx(object $pdo, int $id)
	{
		$query = 'SELECT * FROM article WHERE id = :id';
		$statement = $pdo->prepare($query);
		$statement->execute([':id' => $id]);
        $matable = $statement->fetch(PDO::FETCH_ASSOC);   
        if(empty($matable)) {
        	return false;
        }    
        return $matable;
	}
	function viewAllAU(object $pdo, int $user) 
	{
		$count = 0;
		$query = 'SELECT * FROM article WHERE author = :author';
		$statement = $pdo->prepare($query);
		$statement->execute([':author' => $user]);
        while($matable = $statement->fetch(PDO::FETCH_ASSOC)) {
            $myArrayAdvert[$count] = $matable;
            $count++;
        }  
        if($count == 0) {
        	return false;
        }     
        return $myArrayAdvert;
	}
	function suppAx(object $pdo, int $id) 
	{
		$query = 'DELETE FROM commentaire WHERE article = :id';
		$statement = $pdo->prepare($query);
		$statement->execute([':id' => $id]);
        $matable = $statement->fetch(PDO::FETCH_ASSOC); 
		$query = 'DELETE FROM article WHERE id = :id';
		$statement = $pdo->prepare($query);
		$statement->execute([':id' => $id]);
        $matable = $statement->fetch(PDO::FETCH_ASSOC);     
        return true;
	}
	function editAx(object $pdo, string $title, string $content, int $id) 
	{
		$query = 'UPDATE article SET title = :title, content = :content WHERE id = :id';
		$statement = $pdo->prepare($query);
		$statement->execute([':title' => $title, ':content' => $content, ':id' => $id]);
        $matable = $statement->fetch(PDO::FETCH_ASSOC);     
        return true;
	}
	function addComment(object $pdo, string $username, string $content, int $id)
	{
		$query = 'SELECT * FROM commentaire';
		$statement = $pdo->prepare($query);
		$statement->execute();
        while($matable = $statement->fetch(PDO::FETCH_ASSOC)) {
            if($username == $matable["username"] || $content == $matable["content"] || $id == $matable["article"]) {
                return false;
            }
        }
		$query = 'INSERT INTO commentaire (username, content, article) VALUES (:username, :content, :article)';
		$statement = $pdo->prepare($query); 
		$statement->execute([':username' => $username, ':content' => $content, ':article' => $id]);
		$data = $statement->fetch(PDO::FETCH_ASSOC);
		return true;
	}

	function showAx(object $pdo, int $firstEntry, int $advertByPage)
	{
		$count=0;
		$query = 'SELECT * FROM article ORDER BY id DESC LIMIT '.$firstEntry.', '.$advertByPage.'';
		$statement = $pdo->prepare($query);
		$statement->execute();
		while($row = $statement->fetch(PDO::FETCH_ASSOC)) 
		{
	     	$myArrayAdvert[$count] = $row;
	     	$count++;
		}
		
		if($count == 0)
		{
			return false;
		}
		return $myArrayAx;
	}
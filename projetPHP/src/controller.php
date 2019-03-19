<?php
	require('function.php');
	require_once('form.php');
	
	
	$PDO = connexionDB();
	
	if(isset($_POST["loginBDD"])) {
		$userName = connexionUserDB($PDO, $_POST["uname"], $_POST["psw"]);
	} else if(isset($_POST["logoutBDD"])) {
		session_unset();
	} else if(isset($_POST["signupBDD"])) {
		$alert = addUser($PDO, $_POST["unamesignup"], $_POST["pswsignup"]); 
	}
	if (isset($_SESSION["connexion"]))
	{
		
		if(isset($_POST["axPost"])) {
			addAdvert($PDO, $_POST["titleAx"], $_POST["contentAx"], $_SESSION["id"]);
		}
		
		if(isset($_POST["axComment"])) {
			addComment($PDO, $_POST["axCommentU"], $_POST["axCommentContent"], $_POST["id"]);
			$myArrayComment = viewAllCommentByArticle($PDO, $_POST["id"]);
		}
		
		if($_GET["article"] == "editOne" || $_GET["article"] == "showOne" && isset($_GET["id"]) && !empty($_GET["id"])) {
			$myadvert = viewAx($PDO, $_GET["id"]);
	
		} else if($_GET["article"] == "showAll" && isset($_GET['page'])) {
			$ax=5; 
			$pages=ceil(countAx($PDO)/$axP);
	     	$actualPage=intval($_GET['page']);
		 
		    if($actualPage>$pages) 
		    {
		          $actualPage=$pages;
		    }
			$pagePosition=($actualPage-1)*$axP;
			$ax= showAxP($PDO, $pagePosition, $axP);
		
		} else if ($_GET["article"] == "deleteOne" && isset($_GET["id"]) && !empty($_GET["id"])) {
			suppAx($PDO, $_GET["id"]);
		
		} else if ($_GET["axsupp"] == "true") {
			editAdvert($PDO, $_GET["axsupp"], $_GET["contentAxSupp"], $_GET["id"]);
		}
	}
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
		
		if(isset($_POST["ax"])) {
			addAdvert($PDO, $_POST["titleAx"], $_POST["contentAx"], $_SESSION["id"]);
		}
		// New Comment
		if(isset($_POST["axComment"])) {
			addComment($PDO, $_POST["axU"], $_POST["axCommentContent"], $_POST["id"]);
			$axComment = viewAllCommentByArticle($PDO, $_POST["id"]);
		}
		// View Advert
		if($_GET["article"] == "supptOne" || $_GET["article"] == "showOne" && isset($_GET["id"]) && !empty($_GET["id"])) {
			$AX = viewAX($PDO, $_GET["id"]);
		// View all Advert
		} else if($_GET["article"] == "showAll" && isset($_GET['page'])) {
			$axP=5; 
			$pages=ceil(countAx($PDO)/$axP);
	     	$actualPage=intval($_GET['page']);
		 
		    if($actualPage>$pages) 
		    {
		          $actualPage=$pages;
		    }
			$pageP=($actualPage-1)*$ax1;
			$ax = showAdvertByPage($PDO, $pageP, $ax1);
		
		} else if ($_GET["article"] == "suppOne" && isset($_GET["id"]) && !empty($_GET["id"])) {
			deleteAdvert($PDO, $_GET["id"]);
		
		} else if ($_GET["axModif"] == "true") {
			editAdvert($PDO, $_GET["titleAxModif"], $_GET["contentAxModif"], $_GET["id"]);
		}
	}
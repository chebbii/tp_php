<?php   if($_GET["article"] == "editOne" && $myadvert != false){ ?>
            <div class="article">
                <form method="GET">
                    <input type="text" name="id" value="<?= $myadvert['id']; ?>" hidden>
                    <div class="title articlepart">                        
                        <h1 style="text-align: center;">Edit advert</h1>
                        <label for="titleAdvertEdit"><b>Titre</b></label>
                        <input type="text" placeholder="<?= $myadvert['title']; ?>" name="titleAdvertEdit" class="formConnexion">
                    </div>
                    <div class="content articlepart">
                        <label for="contentAdvertEdit"><b>Content</b></label>
                        <input type="text" placeholder="<?= $myadvert['content']; ?>" name="contentAdvertEdit" class="formConnexion">
                    </div>
                    <div class="container1" style="background-color:#f1f1f1">
                        <button type="submit" name="advertEdit" class="cancelbtn" value="true">Edit</button>
                    </div>
                </form>
            </div>
<?php   }else if($_GET["article"] == "showAll" && $myArrayAdvert != false) { ?>
<?php       foreach ($myArrayAdvert as $advert): ?>     
                <div class="article">
                    <div class="title articlepart">
                        <h3><?= $advert['title']; ?></h3>
                        <a href="index.php?article=showOne&id=<?= $advert['id']; ?>">See advert</a>
                        <a href="index.php?article=editOne&id=<?= $advert['id']; ?>" style="margin-left:4%;">Edit</a>
                        <a href="index.php?article=deleteOne&id=<?= $advert['id']; ?>" style="margin-left:4%;">Delete</a>
                    </div>

                    <div class="content articlepart">
                        <?= $advert['content']; ?>
                    </div> 
                </div>
<?php       endforeach; ?>
        <ul> 
<?php       for($i=1; $i<=$pages; $i++) 
            {
                if($i==$actualPage) 
                {
?>
                    <li class="current"><?= $i; ?></li>
<?php           }  
                else 
                {
?>
                    <li><a class="page" href="index.php?article=showAll&page=<?= $i; ?>"><?= $i; ?></a></li>
<?php           }
            }
?>      </ul>
<?php   } else if(isset($_GET["id"]) && isset($_GET["titleAdvertEdit"]) && isset($_GET["contentAdvertEdit"]) && isset($_GET["advertEdit"])) { ?>

            <div class="article">
                <div class="title articlepart">
                    <a href="index.php?article=showAll&page=1" style="margin-left:4%;">Back</a>
                    <h3 style='color:red; text-align: center; margin-top:5%; width:70%; margin-left:15%;'>Your advert has been updated !</h3>
                </div>
            </div>
<?php   } else if($_GET["article"] == "deleteOne" && isset($_GET["id"])) { ?>

            <div class="article">
                <div class="title articlepart">
                    <a href="index.php?article=showAll&page=1" style="margin-left:4%;">Back</a>
                    <h3 style='color:red; text-align: center; margin-top:5%; width:70%; margin-left:15%;'>Your advert has been deleted !</h3>
                </div>
            </div>

<?php   } else if($_GET["article"] == "showOne" && isset($_GET["id"])) { ?>    
                <div class="article">
                    <div class="title articlepart">
                        <h3><?= $myadvert['title']; ?></h3>
                    </div>

                    <div class="content articlepart" style="position:relative">
                        <?= $myadvert['content']; ?>
                        <?= "<div style=\"font-size:10px;float:right; position:absolute;bottom:0;right:5px;\">Character count : ".strlen($myadvert['content'])."</div>"; ?>
                    </div> 

<?php               if ($myArrayComment != false) { ?>
                        <div class="container1" style="background-color:#ebebe0">
                            <h3>Comment</h3>
<?php                       foreach ($myArrayComment as $comment): ?>  
                                <div class="title articlepart">
                                    <h5>De : <?= $comment['username']; ?></h5>
                                </div>
                                <div class="content articlepart">
                                    <?= $comment['content']; ?>
                                    <?= "<div style=\"font-size:10px;float:right; bottom:0;\">Character count : ".strlen($comment['content'])."</div>"; ?>
                                </div>
                                <hr/>
<?php                   endforeach; ?>
                        </div>
<?php                    } ?> 
            
                    <div class="container1" style="background-color:#f1f1f1">
                        <form method="POST">
                            <div class="title articlepart">                        
                                <h3>Add Comment</h3>
                                <input type="text" name="id" value="<?= $myadvert['id']; ?>" hidden>
                                <label for="advertCommentUser"><b>Username</b></label>
                                <input type="text" name="advertCommentUser" class="formConnexion">
                                <label for="advertCommentContent"><b>Content</b></label>
                                <input type="text" name="advertCommentContent" class="formConnexion">
                                <button type="submit" name="advertComment" class="cancelbtn" value="true">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
        <?php } else if (!empty($_GET["article"])) { ?>

            <div class="article">
                <div class="title articlepart">
                    <h3 style='color:red; text-align: center;'>No Advert</h3>
                </div>
            </div>
<?php   } ?>
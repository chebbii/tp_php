<?php   if($_GET["article"] == "modif" && $myadvert != false){ ?>
            <div class="article">
                <form method="GET">
                    <input type="text" name="id" value="<?= $ax['id']; ?>" hidden>
                    <div class="title articlepart">                        
                        <h1 style="text-align: center;">modif ax</h1>
                        <label for="titleAx"><b>Titre</b></label>
                        <input type="text" placeholder="<?= $ax['title']; ?>" name="titleAx" class="formConnexion">
                    </div>
                    <div class="atrticlepr">
                        <label for="contentAxModif"><b>Content</b></label>
                        <input type="text" placeholder="<?= $ax['content']; ?>" name="contentAxModif" class="k">
                    </div>
                    <div class="k1">
                        <button type="submit" name="axModif" class="supp" value="true">modif</button>
                    </div>
                </form>
                        </div>
<?php   }else if($_GET["article"] == "showAll" && $KAx != false) { ?>
<?php       foreach ($KAx as $c): ?>     
                <div class="article">
                    <div class="titrear">
                        <h3><?= $c['title']; ?></h3>
                    </div>

                    <div class="article">
                        <?= $advert['content']; ?>
                    </div> 
                </div>
<?php       endforeach; ?>
        <ul> 
<?php       for($i=1; $i<=$p1; $i++) 
            {
                if($i==$p0) 
                {
?>
                    <li class="alea"><?= $i; ?></li>
<?php           }  
                else 
                {
?>
                    <li><a class="page" href="index.php?article=showAll&page=<?= $i; ?>"><?= $i; ?></a></li>
<?php           }
            }
?>      </ul>
<?php   } else if(isset($_GET["id"]) && isset($_GET["titleAxModif"]) && isset($_GET["contentAxModif"]) && isset($_GET["AModif"])) { ?>

            <div class="article">
                <div class="titrear">
                    <a href="index.php?article=showAll&page=1" style="margin-left:4%;">return</a>
                    <h3 style='color:red; text-align: center; margin-top:5%; width:70%; margin-left:15%;'>Your advert has been updated !</h3>
                </div>
            </div>
<?php   } else if($_GET["article"] == "deleteOne" && isset($_GET["id"])) { ?>

            <div class="article">
                <div class="titrear">
                    <a href="index.php?article=showAll&page=1" style="margin-left:4%;">Back</a>
                    <h3 style='color:red; text-align: center; margin-top:5%; width:70%; margin-left:15%;'>deja supp !</h3>
                </div>
            </div>

<?php   } else if($_GET["article"] == "showOne" && isset($_GET["id"])) { ?>    
                <div class="article">
                    <div class="titrear">
                        <h3><?= $['title']; ?></h3>
                    </div>

                    <div class="articlepr" style="position:relative">
                        <?= $ax['content']; ?>
                       
                    </div> 

<?php               if ($KAx != false) { ?>
                        <div class="container1" style="background-color:#ebebe0">
                            <h3>Comment</h3>
<?php                       foreach ($KAx as $comment): ?>  
                                <div class="articlepr">
                                    <h5>De : <?= $comment['username']; ?></h5>
                                </div>
                                <div class="articlepr">
                                    <?= $comment['content']; ?>
                                    
                                </div>
                                <hr/>
<?php                   endforeach; ?>
                        </div>
<?php                    } ?> 
            
                    <div class="k1" style="background-color:#f1f1f1">
                        <form method="POST">
                            <div class="articlepr">                        
                                <h3>Add Comment</h3>
                                <input type="text" name="id" value="<?= $ax['id']; ?>" hidden>
                                <label for="axU"><b>Username</b></label>
                                <input type="text" name="axU" class="k1">
                                <label for="ax"><b>Content</b></label>
                                <input type="text" name="ax" class="k">
                                <button type="submit" name="ax" class="supp" value="true">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
        <?php } else if (!empty($_GET["article"])) { ?>

            <div class="article">
                <div class="ax">
                  
                </div>
            </div>
<?php   } ?>
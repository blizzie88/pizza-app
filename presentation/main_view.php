<section id="background">
  <div class="container">
    <h1>Ons Pizzamenu</h1>
      <?php
      foreach ($tab as $product) {
        ?>
          <div class="col-sm-3">
            <div class="thumbnail">
              <img src="<?php print($product->getImage());?>">
              <div class="caption">
                <h3><?php print($product->getProductnaam());?></h3>
                <p><?php print($product->getOmschrijving());?></p>
                <p><?php print($product->getPrijs());?> euro</p>
                <form name="form" action="main.php?action=addtocart&id=<?php print ($product->getProductid());?>" method="post">
                  <input type="submit" class="btn btn-success" value="Bestel">
                </form>
              </div>
            </div>
          </div>
        <?php
      }
      ?>

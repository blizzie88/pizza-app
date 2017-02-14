<div class="right">
  <h1> Uw winkelkarretje </h1>
  <table class="table table-hover">
    <ul>
      <tr>
        <th>Foto</th>
        <th>Aantal</th>
        <th>Pizza</th>
        <th>Prijs</th>
        <th>Verwijder</th>
      </tr>
      <?php
      if(isset($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $key => $value) { ?>
          <tr>
            <td>
              <img src="<?php print($value->getImage());?>">
            </td>
            <td>
              <?php print($value->getAantal()); ?>
            </td>
            <td>
              <li>
                <?php print($value->getProductnaam()); ?>
              </td>
              <td>
                <?php
                $total = $value->getPrijs()*$value->getAantal();
                print($total);
                $som += $total;
                ?> euro
              </li>
            </td>
            <td>
              <a href="main.php?action=delete&id=<?php print($key);?>">
                <button type="button" class="btn btn-danger">verwijder</button>
              </a>
            </td>
            <?php
          }
        }
        ?>
      </tr>
    </ul>
  </table>
  <p> Totaal:
    <?php
    print($som);
    ?> euro
  </p>
  <br>
  <?php
  if (empty($_SESSION["cart"])) {
    print("Uw winkelkar is leeg");
  }
  ?>
  <br><br>
  <a href="redirect.php" class="btn btn-primary">Afrekenen</a>
  <br><br>
</div>
</div>
</section>

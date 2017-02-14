<section id="background">
  <div class="container">
    <div class="overzicht">
      <h1> Overzicht van uw bestelling </h1>
    </div>
    <div class = "content">
      <div class="left">
        <h1>Uw gegevens</h1>
        <form class="form-horizontal" action='invoice.php?action=edit' method="POST">
          <div class="form-group">
            <label class="col-sm-4 control-label">Naam</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="naam" value="<?php print($_SESSION["user"][0]->getNaam()); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Voornaam</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="voornaam" value="<?php print($_SESSION["user"][0]->getVoornaam()); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Straat en nummer</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="straatnummer" value="<?php print($_SESSION["user"][0]->getStraatnummer()); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Postcode</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="postcode" value="<?php print($_SESSION["user"][0]->getPostcode()); ?>">
            </div>
            <?php if ($levering == false) {
              print("Opgelet! Er zijn geen leveringen mogelijk op postcode ". $_POST["postcode"]);
            } ?>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Gemeente</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="gemeente" value="<?php print($_SESSION["user"][0]->getGemeente()); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">telefoon</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="telefoon" value="<?php print($_SESSION["user"][0]->getTelefoon()); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Email</label>
            <div class="col-sm-8">
              <input type="email" class="form-control" name="email" value="<?php print($_SESSION["user"][0]->getEmail()); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-4 control-label">Opmerkingen</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="opmerking" value="<?php print($_SESSION["user"][0]->getOpmerking()); ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-4"></div>
            <div class="col-sm-1">
              <input type="submit" class="btn btn-primary" value="Pas aan">
            </div>
          </div>
        </form>
      </div>

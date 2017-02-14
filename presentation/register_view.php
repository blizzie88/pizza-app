<section id="background">
  <div class="container"><br><br>
    <form class="form-horizontal" action='register.php?action=account' method="POST">
      <div class="form-group">
        <label class="col-sm-4 control-label">Naam</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="naam" placeholder="Naam">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">Voornaam</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="voornaam" placeholder="Voornaam">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">Straat en nummer</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="straatnummer" placeholder="Straat en nummer">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">Postcode</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="postcode" placeholder="Postcode">
        </div>
        <?php if ($levering == false) {
          ?><p>Geen leveringen mogelijk op deze postcode</p> <?php
        } ?>
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">Gemeente</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="gemeente" placeholder="Gemeente">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">Telefoon</label>
        <div class="col-sm-6">
          <input type="telefoon" class="form-control" name="telefoon" placeholder="Telefoon">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">Email</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">Wachtwoord</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="wachtwoord" placeholder="Wachtwoord">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-4 control-label">Opmerkingen</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="opmerking" placeholder="Opmerkingen">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-4"></div>
        <div class="col-sm-6">
          <input type="submit" class="btn btn-primary" value="Maak aan">
        </div>
      </div>

    </form>
  </div>
</section>

<section id="background">
  <div class="container"><br><br>
    <?php if (isset($made)) {
      ?><div class="text"><p> Uw account is aangemaakt </p></div><?php
    } ?>
    <form class="form-horizontal" action='login.php?action=login' method="POST">
      <div class="form-group">
        <label for="inputEmail" class="col-sm-4 control-label">Email</label>
        <div class="col-sm-6">
          <input type="email" class="form-control" name="loginemail" placeholder="Email">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-sm-4 control-label">Password</label>
        <div class="col-sm-6">
          <input type="password" class="form-control" name="loginpassword" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-4"></div>
        <div class="col-sm-6">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </div>
    </form>
  </div>
</section>

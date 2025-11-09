<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginModalLabel">Login to G-discuss</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/forumsapplication/partials/_handleLogin.php" method="POST">
        <div class="modal-body">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control is-invalid" placeholder="Username" id="lusername" name="lusername" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="loginPass" name="loginPass">
            <label for="floatingInput" class="form-label" id="floatingInput">Password</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="signupModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="signupModalLabel">Create an G-discuss account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/forumsapplication/partials/_handleSignup.php" method="post">
        <div class="modal-body">
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="Username" id="susername" name="susername" aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="signupPass" name="signupPass">
            <label for="floatingInput" class="form-label" id="floatingInput">Password</label>
          </div>
          <div class="form-floating">
            <select class="form-select" id="profession" name="profession" aria-label="Floating label select example">
              <option selected>Geeks</option>
              <option value="Student">Student</option>
              <option value="Developer">Developer</option>
            </select>
            <label for="floatingSelect">Select your profession</label>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Signup</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php $this->layout(config('view.layout')); ?>
<?php $this->start("page"); ?>
<br>
<h2 class="text-uppercase text-center mb-5">Create an account</h2>
<div class="register_form">
  <?php if(!empty($errors)) : ?>
    <div class="alert alert-danger">
      <ul>
          <?php foreach($errors as $err){echo "<li style=\"list-style: none;\">$err</li>";}?>
      </ul>
    </div>
    <?php endif; ?>
  <form action="/register" method="POST">
    <div class="form-outline mb-4">
      <input type="text" id="form3Example3cg" class="form-control form-control-lg" placeholder="Full name" name="full_name" />
    </div>
    <div class="form-outline mb-4">
      <input type="text" id="form3Example3cg" class="form-control form-control-lg" placeholder="Phone number" name="phone_number"/>
    </div>
    <div class="form-outline mb-4">
      <input type="text" id="form3Example3cg" class="form-control form-control-lg" placeholder="Address" name="address" />
    </div>
    <div class="form-outline mb-4">
      <input type="text" id="form3Example3cg" class="form-control form-control-lg" placeholder="Email" name="email" />
    </div>
    <div class="form-outline mb-4">
      <input type="text" id="form3Example1cg" class="form-control form-control-lg" placeholder="Username" name="username" />
    </div>
    <div class="form-outline mb-4">
      <input type="password" id="form3Example4cg" class="form-control form-control-lg" placeholder="Password" name="password"/>
    </div>
    <div class="form-outline mb-4">
      <input type="password" id="form3Example4cdg" class="form-control form-control-lg" placeholder="Repeat your password" name="repeted_password"/>
    </div>
    <div class="form-check d-flex justify-content-center mb-5">
      <input class="form-check-input me-2" name="terms" type="checkbox" value="" id="form2Example3cg" />
      I agree all statements in <a href="#!"  class="text-body"><u>Terms of service</u></a>
      <!-- <label class="form-check-label" for="form2Example3g">
      </label> -->
    </div>
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-secondary btn-lg">Register</button>
    </div>
    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!" class="fw-bold text-body"><u>Login here</u></a></p>

  </form>
</div>
<?php $this->stop(); ?>
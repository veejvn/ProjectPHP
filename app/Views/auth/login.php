<?php $this->layout(config('view.layout')); ?>
<?php $this->start("page"); ?>
<style>
    .login_form{
    width: 400px;
    margin: 50px auto;
    color: grey;
    }   
</style>
<div class="login_form">
        <form>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="text" id="" class="form-control" placeholder="Username"/>
            </div>
          
            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="" class="form-control" placeholder="Password"/>
            </div>
          
            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="" checked />
                  <label class="form-check-label" for="form2Example34"> Remember me </label>
                </div>
              </div>
          
              <div class="col">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
              </div>
            </div>
          
            <!-- Submit button -->
            
          
            <!-- Register buttons -->
            <div class="text-center">
            <button type="submit" class="btn btn-secondary btn-block mb-4">Sign in</button>
              <p>Not a member? <a href="/register">Register Here</a></p>
              <p>or sign up with:</p>
              <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
              </button>
          
              <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-google"></i>
              </button>
          
              <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-twitter"></i>
              </button>
          
              <button type="button" class="btn btn-secondary btn-floating mx-1">
                <i class="fab fa-github"></i>
              </button>
            </div>
          </form>
    </div>
<?php $this->stop(); ?>


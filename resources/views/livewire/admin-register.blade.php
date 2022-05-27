<div>
    <div class="register-box">
        <div class="register-logo">
          <b>Admin</b>&nbsp;&nbsp;Register
        </div>
      
        <div class="card">
          <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>
      
            <form wire:submit.prevent="insert">
              <div class="input-group mb-3">
                <input wire:model.defer="name" type="text" class="form-control" placeholder="Full name">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="input-group mb-3">
                <input wire:model.defer="email" type="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="input-group mb-3">
                <input wire:model.defer="password" type="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="input-group mb-3">
                <input wire:model.defer="confirmPassword" type="password" class="form-control" placeholder="Retype password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                @error('confirmPassword')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                    <label for="agreeTerms">
                     I agree to the <a href="#">terms</a>
                    </label>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
            <a href="{{ route('admin.login') }}" class="text-center">I already have a membership</a>
          </div>
          <!-- /.form-box -->
        </div><!-- /.card -->
      </div>
      <!-- /.register-box -->
    @push('script')
        <script type="text/javascript">
            $(document).ready(function () {
                toastr.options = {
                    "progressBar" : true,
                    "positionClass" : "toast-top-right"
                };
            });
            window.addEventListener('register-success', event => {
                toastr.success(event.detail.message);
            });
        </script>
    @endpush
</div>

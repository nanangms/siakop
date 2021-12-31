<x-login_page title="Reset Password | SIAKOP">
  <div class="form-body">
    
    <div class="row">
      <div class="img-holder">
          <div class="bg"></div>
          <div class="info-holder">

          </div>
      </div>
      <div class="form-holder">
          <div class="form-content">
              <div class="form-items">
                <img class="" src="{{asset('images')}}/logo_kota_jambi.png" alt="" width="100px">
                  <h3>SIAKOP (Sistem Informasi Akuntansi Koperasi)</h3>
                  <p>Masukan Password Baru Anda.</p>
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul style="margin-bottom:0px;list-style-type: none;margin:0px;padding:0px;">
                          @foreach ($errors->all() as $error)
                              <li><i class="fa fa-exclamation"></i> {{ $error }}</li>
                          @endforeach
                      </ul>
                    </div>
                  @endif
                  <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="E-mail Address">
                    
                      @error('email')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                      @enderror
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="New Password">
                      @error('password')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                      @enderror
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm New Password">
                      @error('password_confirmation')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                      @enderror
                      <div class="form-button">
                        <button type="submit" class="ibtn">{{ __('Reset Password') }}</button>
                      </div>
                  </form>
                  <div class="other-links">
                      <span>©2021 SIAKOP | Support by : <a href="https://diskominfo.jambikota.go.id/" target="_blank">Diskominfo Kota Jambi</a></span>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</x-login_page>
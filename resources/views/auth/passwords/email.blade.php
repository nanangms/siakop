<x-login_page title="Permintaan Reset Password | SIAKOP">
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
                  <h3>Password Reset</h3>
                  <p>Untuk Reset Password, Masukan Email yang terdaftar</p>
                  @if (session('status'))
                    <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                    </div>
                  @endif
                  <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                      <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required>
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                        {{ $message }}
                        </span>
                      @enderror
                      <div class="form-button full-width">
                          <button type="submit" class="ibtn">{{ __('Kirim Permintaan Reset Password') }}</button>
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
















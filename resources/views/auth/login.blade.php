<x-login_page title="Login | SIAKOP">
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
                  <img class="" src="{{asset('images')}}/logo_koperasi.png" alt="" width="100px">
                  <h3>SIAKOP (Sistem Informasi Akuntansi Koperasi)</h3>
                  <p>Selamat Datang, Silahkan Login.</p>
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul style="margin-bottom:0px;list-style-type: none;margin:0px;padding:0px;">
                          @foreach ($errors->all() as $error)
                              <li><i class="fa fa-exclamation"></i> {{ $error }}</li>
                          @endforeach
                      </ul>
                    </div>
                  @endif
                  <form action="{{ route('login') }}" method="POST">
                    @csrf
                      <input class="form-control" type="text" name="email" placeholder="E-mail Address" value="{{ old('email') }}" required>
                      @error('email')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                      @enderror
                      <input class="form-control" type="password" name="password" placeholder="Password" required>
                      @error('password')
                        <span class="text-danger" role="alert">
                            {{ $message }}
                        </span>
                      @enderror
                      <!-- <input type="checkbox" id="chk1"><label for="chk1">Remmeber me</label> -->
                      <div class="form-button">
                          <button id="submit" type="submit" class="ibtn">Login</button> <a href="{{ route('password.request') }}">Forget password?</a>
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
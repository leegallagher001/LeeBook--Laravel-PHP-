<x-layout> {{-- brings the layout.blade.php into the page - anything between the x-layout tags is treated as the '$slot' content --}}
    <div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-7 py-3 py-md-5">
          <h1 class="display-3">Welcome to LeeBook</h1>
          <p class="lead text-muted">Social media, back to basics. Simple, no gimmicks, just like the good old days. Explore the world of LeeBook.</p>
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="/register" method="POST" id="registration-form">
            @csrf
            <div class="form-group">
              <label for="username-register" class="text-muted mb-1"><small>Username</small></label>
              <input value="{{old('username')}}" name="username" id="username-register" class="form-control" type="text" placeholder="Pick a username" autocomplete="off" />
              @error('username') {{-- the next three lines are to facilitate an error message if the fields have been left blank or entered incorrectly --}}
              <p class="m-0 small alert alert-danger shadow sm">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="email-register" class="text-muted mb-1"><small>Email</small></label>
              <input value="{{old('email')}}"name="email" id="email-register" class="form-control" type="text" placeholder="you@example.com" autocomplete="off" />
              @error('email')
              <p class="m-0 small alert alert-danger shadow sm">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="password-register" class="text-muted mb-1"><small>Password</small></label>
              <input name="password" id="password-register" class="form-control" type="password" placeholder="Create a password" />
              @error('password')
              <p class="m-0 small alert alert-danger shadow sm">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="password-register-confirm" class="text-muted mb-1"><small>Confirm Password</small></label>
              <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirm password" /> {{-- password_confirmation is a method that allows Laravel to confirm that the same password is entered in the second field from the first --}}
              @error('password_confirmation')
              <p class="m-0 small alert alert-danger shadow sm">{{$message}}</p>
              @enderror
            </div>

            <button type="submit" class="py-3 mt-4 btn btn-lg btn-success btn-block">Sign up for LeeBook</button>
          </form>
        </div>
      </div>
    </div>
</x-layout>

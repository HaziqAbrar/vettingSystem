<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>

    .pakstail {
      border-top-style: hidden;
      border-right-style: hidden;
      border-left-style: hidden;
      border-bottom-style: hidden;
      background:none;

    }

    .single {
      font-weight: 500;
      font-size: 1.1rem;

    }

    .no-outline:focus {
      outline: none;
    }
    select option {
      color: black;
    }
    </style>
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ asset('css/style0.css') }}" />
    <title>Welcome Developers!</title>
  </head>
  <body>
    @if (Route::has('login'))
        <!-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> -->
            @auth
                <a href="/dashboard" class="text-sm text-gray-700 underline">Dashboard</a>
            @else
                <!-- <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a> -->

                <x-jet-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                        Go to Welcome Page to <a href="/">Login</a>
                    </div>
                @endif
                <div class="container">
                  <div class="forms-container">
                    <div class="signin-signup">

                      <form class="sign-in-form" method="POST" action="{{ route('login') }}"  >
                        <h2 class="title">Sign in</h2>
                        @csrf

                        <div class="input-field">
                          <i class="fas fa-user"></i>
                          <!-- <x-jet-label for="email" value="{{ __('Email') }}" /> -->
                          <input id="email" type="email" name="email" :value="old('email')" placeholder="Email" equired autofocus />
                        </div>

                        <div class="input-field">
                          <i class="fas fa-lock"></i>
                          <!-- <x-jet-label for="password" value="{{ __('Password') }}" /> -->
                          <input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password" />
                        </div>

                        <!-- <div class="block mt-4">
                          <label for="remember_me" class="flex items-center">
                            <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                          </label>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                          @if (Route::has('password.request'))
                          <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                          </a>
                          @endif -->

                          <x-jet-button class="btn solid" >
                            {{ __('Login') }}
                          </x-jet-button>
                      </form>

                    <form class="sign-up-form" method="POST" action="{{ route('register') }}">
                      <h2 class="title">Sign up</h2>
                        @csrf

                        <div class="input-field">
                            <!-- <x-jet-label for="name" value="{{ __('Name') }}" /> -->
                            <i class="fas fa-user"></i>
                            <input id="name" type="text" name="name" :value="old('name')" placeholder="Full Name" required autofocus autocomplete="name" />
                        </div>

                        <div class="input-field">
                            <!-- <x-jet-label for="email" value="{{ __('Email') }}" /> -->
                            <i class="fas fa-envelope"></i>
                            <x-jet-input id="email"  type="email" name="email" :value="old('email')" placeholder="Email" required />
                        </div>

                        <div class="input-field">
                            <!-- <x-jet-label for="role" value="{{ __('Status') }}" /> -->
                            <i class="fas fa-user-plus"></i>
                            <select id="role" class="form-select no-outline pakstail single " type="role" name="role"  required >
                                <option value="">Select status</option>
                                <option value="supervisor" style="color:black;">Supervisor</option>
                                <option value="coordinator">Coordinator</option>
                                <option value="panel">Panel</option>
                                <option value="student">Student</option>
                                <!-- <option value="fiat">Fiat</option>
                                <option value="audi">Audi</option> -->
                            </select>
                        </div>

                        <div class="input-field">
                            <!-- <x-jet-label for="department" value="{{ __('Department') }}" /> -->
                            <i class="fas fa-building"></i>
                            <select id="department" class="form-select no-outline pakstail single" type="department" name="department"  required >
                                <option value="">Select Department</option>
                                <option value="SE">Software Engineering</option>
                                <option value="IS">Information System</option>
                                <option value="AI">Artificial Intelligence</option>
                                <option value="MM">Multimedia</option>
                                <option value="STK">Computer System and Network</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <!-- <x-jet-label for="level" value="{{ __('Level') }}" /> -->
                            <i class="fas fa-scroll"></i>
                            <select id="level" class="form-select no-outline pakstail single" type="level" name="level"  required >
                                <option value="">Select Level</option>
                                <option value="Postgraduate">Postgraduate</option>
                                <option value="Undergraduate">Undergraduate</option>

                            </select>
                        </div>

                        <div class="input-field">
                            <!-- <x-jet-label for="password" value="{{ __('Password') }}" /> -->
                            <i class="fas fa-lock-open"></i>
                            <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
                        </div>

                        <div class="input-field">
                            <!-- <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" /> -->
                            <i class="fas fa-lock"></i>
                            <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a> -->

                            <x-jet-button class="btn">
                                {{ __('Register') }}
                            </x-jet-button>
                        </div>
                    </form>




                    <!-- @endif -->
                  </div>
                </div>
            @endif
        <!-- </div> -->

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Welcome to FSKTM UM DIssertation</h3>
            <p>
              Are you new here? Sign up by filling in these few information and you are good to go!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="{{ asset('images/log.svg') }}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already registered ?</h3>
            <p>
              Login and start your dissertation project now!
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="{{ asset('images/register.svg') }}" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Connexion </title>
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url('{{asset('images/icons/login5.avif')}}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            /* color:white; */
        }
        .login-card {
            border: 1px solid rgba(0, 123, 255, 0.5); /* Bordure légère bleue */
            background-color: rgba(0, 123, 255, 0.2); /* Fond légèrement bleu et transparent */
        }
        .form-control {
            background-color: #d3d3d3; /* Couleur de fond grise pour les inputs */
        }
    </style>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <br>
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5 login-card">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4" style="color: white;">
                                        <img src="{{asset('images/icons/connect3.webp')}}" alt="" width="40px">
                                          Se Connecter</h3>
                                </div>
                                <div class="card-body">
                                    <x-auth-session-status class="mb-4" :status="session('status')" />
                                    
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <!-- Email Address -->
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" class="alert alert-danger text-center" />
                                        <div class="form-floating mb-3">
                                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="name@example.com" />
                                            <label for="email">{{ __('Email address') }}</label>
                                        </div>

                                        <!-- Password -->
                                        <div class="form-floating mb-3">
                                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                                            <label for="password">{{ __('Password') }}</label>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="form-check mb-3">
                                            <input id="remember_me" type="checkbox" class="form-check-input" name="remember" />
                                            <label class="form-check-label" for="remember_me">{{ __(' Se souvenir de moi') }}</label>
                                        </div>

                                        <!-- Login and Forgot Password Links -->
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            @if (Route::has('password.request'))
                                                <a class="small" href="{{ route('password.request') }}">
                                                    {{-- {{ __('Forgot your password?') }} --}}
                                                </a>
                                            @endif
                                            <x-primary-button class="btn btn-primary">
                                                {{ __('Connexion') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="{{ route('register') }}">Besoin d'un compte ? Inscrivez-vous !</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Nadia HADJI {{date('Y')}}</div>
                        {{-- <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms & Conditions</a>
                        </div> --}}
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
</body>
</html>

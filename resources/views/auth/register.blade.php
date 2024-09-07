<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inscription</title>
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url('{{ asset('images/icons/login5.avif') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .register-card {
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
                            <div class="card shadow-lg border-0 rounded-lg mt-5 register-card">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4" style="color: white;">
                                        <img src="{{ asset('images/icons/connect3.webp') }}" alt="" width="40px">
                                          Inscription</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <!-- Nom -->
                                        <div class="form-floating mb-3">
                                            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Nom" />
                                            <label for="name">{{ __('Nom') }}</label>
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>

                                        <!-- Adresse Email -->
                                        <div class="form-floating mb-3">
                                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Adresse Email" />
                                            <label for="email">{{ __('Adresse Email') }}</label>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Mot de Passe -->
                                        <div class="form-floating mb-3">
                                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Mot de Passe" />
                                            <label for="password">{{ __('Mot de Passe') }}</label>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Confirmer Mot de Passe -->
                                        <div class="form-floating mb-3">
                                            <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmer Mot de Passe" />
                                            <label for="password_confirmation">{{ __('Confirmer Mot de Passe') }}</label>
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="{{ route('login') }}">
                                                {{ __('Déjà inscrit ?') }}
                                            </a>
                                            <x-primary-button class="btn btn-primary">
                                                {{ __('S\'inscrire') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
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
                        <div class="text-muted">Copyright &copy; Nadia HADJI {{ date('Y') }}</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
</body>
</html>

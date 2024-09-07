<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succès de l'inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('images/icons/login6.avif') }}');
            background-size: cover; /* S'assure que l'image couvre toute la fenêtre */
            background-position: center; /* Centre l'image */
            background-repeat: no-repeat; /* Évite les répétitions de l'image */
            background-attachment: fixed; /* Fixe l'image en arrière-plan */
            display: flex; /* Utilisation de Flexbox pour centrer le contenu */
            justify-content: center; /* Centre horizontalement */
            align-items: center; /* Centre verticalement */
            height: 100vh; /* Prend toute la hauteur de la vue */
            margin: 0; /* Supprime les marges par défaut */
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #28a745;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .card-body {
            padding: 2rem;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="card text-center">
        <div class="card-header">
            Succès de l'inscription
        </div>
        <div class="card-body">
            <h5 class="card-title">Votre compte a été créé avec succès !</h5>
            <p class="card-text">Veuillez contacter l'administrateur pour l'activer.</p>
            <a href="/" class="btn btn-primary">Retour à la page d'accueil</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

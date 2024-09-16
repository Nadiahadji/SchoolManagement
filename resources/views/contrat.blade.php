<!-- resources/views/contrat.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrat de {{ $eleve->nom }}</title>
    <style>
        /* Styles pour l'impression */
        @media print {
            .no-print { display: none; }
        }
        /* Autres styles */
    </style>
</head>
<body>
    <h1>Contrat de {{ $eleve->nom }}</h1>
    <p>Informations du contrat...</p>
    <!-- Contenu du contrat -->
</body>
</html>

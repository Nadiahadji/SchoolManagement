<!-- resources/views/paiements/show.blade.php -->
<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item">
            <a href="{{ route('paiements.index') }}" class="text-decoration-none">Liste des paiements</a>
        </li>
        <li class="breadcrumb-item active text-muted">Détails du paiement</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-credit-card me-2"></i>
                    Détails du paiement
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Candidat:</strong> {{ $paiement->condidat->nom }} {{ $paiement->condidat->prenom }}
                    </div>
                    <div class="mb-3">
                        <strong>Formation:</strong> {{ $paiement->formation->nom }}
                    </div>
                    <div class="mb-3">
                        <strong>Montant:</strong> {{ $paiement->montant }} €
                    </div>
                    <div class="mb-3">
                        <strong>Date de paiement:</strong> {{ $paiement->date_paiement }}
                    </div>
                    <div class="mb-3">
                        <strong>Méthode de paiement:</strong> {{ $paiement->methode_paiement }}
                    </div>

                    <a href="{{ route('paiements.edit', $paiement->id) }}" class="btn btn-warning">
                        Modifier
                    </a>
                    <a href="{{ route('paiements.index') }}" class="btn btn-secondary">
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

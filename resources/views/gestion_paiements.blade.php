<x-admin-dash>
    <!-- Breadcrumb navigation -->
    <nav aria-label="breadcrumb" class="mb-4 mt-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('eleves.show', $eleve->id) }}">Détails de l'élève</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Gestion des paiements</li>
        </ol>
    </nav>

    <!-- Main content -->
    <div class="container">
        <div class="card shadow-lg rounded-3 mb-4">
            <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                <i class="fas fa-dollar-sign me-2"></i>
                <h5 class="mb-0">Gestion des paiements pour {{ $eleve->nom }} {{ $eleve->prenom }}</h5>
            </div>
            <div class="card-body">
                <!-- Payment form -->
                <form action="{{ route('eleves.versements', $eleve->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <h5 class="fw-bold">Ajouter un versement</h5>
                    </div>
                    <div class="mb-3">
                        <label for="versement_montant" class="form-label">Montant</label>
                        <input type="number" class="form-control form-control-lg rounded-3 border border-secondary bg-light" id="versement_montant" name="montant" placeholder="Entrez le montant" required>
                    </div>
                    <div class="mb-3">
                        <label for="versement_date" class="form-label">Date du versement</label>
                        <input type="date" class="form-control form-control-lg rounded-3 border border-secondary bg-light" id="versement_date" name="date_versement" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 me-2">Ajouter</button>
                        <a href="{{ route('eleves.show', $eleve->id) }}" class="btn btn-secondary rounded-pill px-4 py-2">Retour</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-dash>

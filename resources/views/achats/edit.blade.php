<x-admin-dash>
    <title>Modifier un achat</title>
    <!-- Breadcrumb -->
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item text-primary">
            <a href="{{ route('achats.index') }}" class="text-decoration-none">Liste des achats</a>
        </li>
        <li class="breadcrumb-item active text-muted">Modifier un achat</li>
    </ol>

    <!-- Card Container -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-edit me-2"></i>
                    Modifier un achat
                </div>
                <div class="card-body p-4">
                    <!-- Formulaire de modification -->
                    <form action="{{ route('achats.update', $achat->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Champ Nom -->
                        <div class="mb-4">
                            <label for="nom" class="form-label fw-semibold">Nom</label>
                            <input 
                                type="text" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="nom" 
                                name="nom" 
                                value="{{ $achat->nom }}" 
                                required
                                placeholder="Entrez le nom de l'achat"
                            >
                        </div>
                        <!-- Champ Montant -->
                        <div class="mb-4">
                            <label for="montant" class="form-label fw-semibold">Montant</label>
                            <input 
                                type="number" 
                                step="0.01" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="montant" 
                                name="montant" 
                                value="{{ $achat->montant }}" 
                                required
                                placeholder="Entrez le montant de l'achat"
                            >
                        </div>
                        <!-- Champ Date d'achat -->
                        <div class="mb-4">
                            <label for="date_achat" class="form-label fw-semibold">Date d'achat</label>
                            <input 
                                type="date" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="date_achat" 
                                name="date_achat" 
                                value="{{ $achat->date_achat }}" 
                                required
                            >
                        </div>
                        <!-- Champ Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="description" 
                                name="description" 
                                rows="3"
                                placeholder="Entrez une description de l'achat"
                            >{{ $achat->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('achats.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

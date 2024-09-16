<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item text-primary">
            <a href="{{ route('condidats.index') }}" class="text-decoration-none">Liste des candidats</a>
        </li>
        <li class="breadcrumb-item active text-muted">Ajouter un candidat</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-plus me-2"></i>
                    Ajouter un candidat
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('condidats.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nom" class="form-label fw-semibold">Nom</label>
                            <input 
                                type="text" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="nom" 
                                name="nom" 
                                required
                                placeholder="Entrez le nom du candidat"
                            >
                        </div>
                        <div class="mb-4">
                            <label for="prenom" class="form-label fw-semibold">Prénom</label>
                            <input 
                                type="text" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="prenom" 
                                name="prenom" 
                                required
                                placeholder="Entrez le prénom du candidat"
                            >
                        </div>
                        <div class="mb-4">
                            <label for="date_inscription" class="form-label fw-semibold">Date d'inscription</label>
                            <input 
                                type="date" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="date_inscription" 
                                name="date_inscription" 
                                required
                            >
                        </div>
                        <div class="mb-4">
                            <label for="tel" class="form-label fw-semibold">Téléphone</label>
                            <input 
                                type="text" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="tel" 
                                name="tel" 
                                required
                                placeholder="Entrez le numéro de téléphone du candidat"
                            >
                        </div>
                        <div class="mb-4">
                            <label for="niv" class="form-label fw-semibold">Niveau</label>
                            <input 
                                type="text" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="niv" 
                                name="niv" 
                                required
                                placeholder="Entrez le niveau du candidat"
                            >
                        </div>
                        <div class="mb-4">
                            <label for="adresse" class="form-label fw-semibold">Adresse</label>
                            <input 
                                type="text" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="adresse" 
                                name="adresse" 
                                required
                                placeholder="Entrez l'adresse du candidat"
                            >
                        </div>
                        <div class="mb-4">
                            <label for="date_naissance" class="form-label fw-semibold">Date de naissance</label>
                            <input 
                                type="date" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="date_naissance" 
                                name="date_naissance" 
                                required
                            >
                        </div>
                        <button 
                            type="submit" 
                            class="btn btn-primary rounded-3 shadow-lg"
                        >
                            Ajouter
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

<!-- resources/views/eleves/create.blade.php -->
<x-admin-dash>
    <!-- Breadcrumb -->
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item text-primary">
            <a href="{{ route('eleves.index') }}" class="text-decoration-none">Liste des élèves</a>
        </li>
        <li class="breadcrumb-item active text-muted">Ajouter un élève</li>
    </ol>

    <!-- Card Container -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-plus me-2"></i>
                    Ajouter un élève
                </div>
                <div class="card-body p-4">
                    <!-- Formulaire d'ajout -->
                    <form action="{{ route('eleves.store') }}" method="POST">
                        @csrf
                        <!-- Champ Nom -->
                        <div class="mb-4">
                            <label for="nom" class="form-label fw-semibold">Nom</label>
                            <input 
                                type="text" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="nom" 
                                name="nom" 
                                required
                                placeholder="Entrez le nom de l'élève"
                            >
                        </div>
                        <!-- Champ Prénom -->
                        <div class="mb-4">
                            <label for="prenom" class="form-label fw-semibold">Prénom</label>
                            <input 
                                type="text" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="prenom" 
                                name="prenom" 
                                required
                                placeholder="Entrez le prénom de l'élève"
                            >
                        </div>
                        <!-- Champ Date d'inscription -->
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
                        <!-- Champ Téléphone du parent -->
                        <div class="mb-4">
                            <label for="tel_parent" class="form-label fw-semibold">Téléphone du parent</label>
                            <input 
                                type="text" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="tel_parent" 
                                name="tel_parent" 
                                required
                                placeholder="Entrez le numéro de téléphone du parent"
                            >
                        </div>
                        <!-- Champ Niveau -->
                        <div class="mb-4">
                            <label for="niv" class="form-label fw-semibold">Niveau</label>
                            <input 
                                type="text" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="niv" 
                                name="niv" 
                                required
                                placeholder="Entrez le niveau de l'élève"
                            >
                        </div>
                        <!-- Champ Adresse -->
                        <div class="mb-4">
                            <label for="adresse" class="form-label fw-semibold">Adresse</label>
                            <input 
                                type="text" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="adresse" 
                                name="adresse" 
                                required
                                placeholder="Entrez l'adresse de l'élève"
                            >
                        </div>
                        <!-- Champ Date de naissance -->
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
                        <!-- Champ Offre -->
                        <div class="mb-4">
                            <label for="offre" class="form-label fw-semibold">Offre</label>
                            <input 
                                type="number" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="offre" 
                                name="offre" 
                                required
                                placeholder="Entrez l'offre"
                            >
                        </div>
                        <!-- Bouton de soumission -->
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

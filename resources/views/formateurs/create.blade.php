<x-admin-dash>
    <!-- Breadcrumb -->
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active text-muted">Ajouter un formateur</li>
    </ol>

    <!-- Card Container -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-user-plus me-2"></i>
                    Ajouter un formateur
                </div>
                <div class="card-body p-4">
                    <!-- Formulaire d'ajout -->
                    <form action="{{ route('formateurs.store') }}" method="POST">
                        @csrf
                        <!-- Champ Nom -->
                        <div class="mb-4">
                            <label for="nom" class="form-label fw-semibold">Nom</label>
                            <input 
                                type="text" 
                                class="form-control border-0 rounded-3 bg-light shadow-sm" 
                                id="nom" 
                                name="nom" 
                                required
                                placeholder="Entrez le nom du formateur"
                            >
                        </div>

                        <!-- Champ Prénom -->
                        <div class="mb-4">
                            <label for="prenom" class="form-label fw-semibold">Prénom</label>
                            <input 
                                type="text" 
                                class="form-control border-0 rounded-3 bg-light shadow-sm" 
                                id="prenom" 
                                name="prenom" 
                                required
                                placeholder="Entrez le prénom du formateur"
                            >
                        </div>

                        <!-- Champ Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input 
                                type="email" 
                                class="form-control border-0 rounded-3 bg-light shadow-sm" 
                                id="email" 
                                name="email" 
                                required
                                placeholder="Entrez l'email du formateur"
                            >
                        </div>

                        <!-- Champ Téléphone -->
                        <div class="mb-4">
                            <label for="tel" class="form-label fw-semibold">Téléphone</label>
                            <input 
                                type="text" 
                                class="form-control border-0 rounded-3 bg-light shadow-sm" 
                                id="tel" 
                                name="tel" 
                                required
                                placeholder="Entrez le numéro de téléphone"
                            >
                        </div>

                        <!-- Champ Adresse -->
                        <div class="mb-4">
                            <label for="address" class="form-label fw-semibold">Adresse</label>
                            <input 
                                type="text" 
                                class="form-control border-0 rounded-3 bg-light shadow-sm" 
                                id="address" 
                                name="address" 
                                required
                                placeholder="Entrez l'adresse du formateur"
                            >
                        </div>

                        <!-- Champ Spécialités -->
                        <div class="mb-4">
                            <label for="specialties" class="form-label fw-semibold">Spécialités</label>
                            <textarea 
                                class="form-control border-0 rounded-3 bg-light shadow-sm" 
                                id="specialties" 
                                name="specialties" 
                                required
                                placeholder="Décrivez les spécialités du formateur"
                            ></textarea>
                        </div>

                        <!-- Champ Qualifications -->
                        <div class="mb-4">
                            <label for="qualifications" class="form-label fw-semibold">Qualifications</label>
                            <textarea 
                                class="form-control border-0 rounded-3 bg-light shadow-sm" 
                                id="qualifications" 
                                name="qualifications" 
                                required
                                placeholder="Décrivez les qualifications du formateur"
                            ></textarea>
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

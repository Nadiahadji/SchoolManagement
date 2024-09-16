<x-admin-dash>
    <!-- Breadcrumb -->
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active text-primary">Ajouter une formation</li>
    </ol>

    <!-- Card Container -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-plus me-2"></i>
                    Ajouter une formation
                </div>
                <div class="card-body p-4">
                    <!-- Formulaire d'ajout -->
                    <form action="{{ route('formations.store') }}" method="POST">
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
                                placeholder="Entrez le nom de la formation"
                            >
                        </div>
                        <!-- Champ Description -->
                        <div class="mb-4">
                            <label for="description" class="form-label fw-semibold">Description</label>
                            <textarea 
                                class="form-control border-0 rounded-3 bg-light shadow-sm" 
                                id="description" 
                                name="description" 
                                required
                                placeholder="Entrez une description de la formation"
                            ></textarea>
                        </div>
                        <!-- Champ Durée -->
                        <div class="mb-4">
                            <label for="duree" class="form-label fw-semibold">Durée (en heures)</label>
                            <input 
                                type="number" 
                                class="form-control border-0 rounded-3 bg-light shadow-sm" 
                                id="duree" 
                                name="duree" 
                                required
                                placeholder="Entrez la durée en heures"
                            >
                        </div>
                        <!-- Champ Niveau -->
                        <div class="mb-4">
                            <label for="niveau" class="form-label fw-semibold">Niveau</label>
                            <input 
                                type="text" 
                                class="form-control border-0 rounded-3 bg-light shadow-sm" 
                                id="niveau" 
                                name="niveau" 
                                required
                                placeholder="Entrez le niveau de la formation"
                            >
                        </div>
                        <!-- Champ Coût -->
                        <div class="mb-4">
                            <label for="cout" class="form-label fw-semibold">Coût</label>
                            <input 
                                type="number" 
                                step="0.01" 
                                class="form-control border-0 rounded-3 bg-light shadow-sm" 
                                id="cout" 
                                name="cout" 
                                required
                                placeholder="Entrez le coût de la formation"
                            >
                        </div>
                        <!-- Champ Formateur -->
                        <div class="mb-4">
                            <label for="formateur_id" class="form-label fw-semibold">Formateur</label>
                            <select 
                                class="form-select border-0 rounded-3 bg-light shadow-sm" 
                                id="formateur_id" 
                                name="formateur_id" 
                                required
                            >
                                @foreach($formateurs as $formateur)
                                    <option value="{{ $formateur->id }}">{{ $formateur->nom }} {{ $formateur->prenom }}</option>
                                @endforeach
                            </select>
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

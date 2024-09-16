<x-admin-dash>
    <!-- Breadcrumb -->
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item">
            <a href="{{ route('formations.index') }}" class="text-decoration-none text-primary">Liste des formations</a>
        </li>
        <li class="breadcrumb-item active text-muted">Modifier la formation</li>
    </ol>

    <!-- Card Container -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-edit me-2"></i>
                    Modifier la formation
                </div>
                <div class="card-body p-4">
                    <!-- Formulaire de modification -->
                    <form action="{{ route('formations.update', $formation->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Champ Nom -->
                        <div class="mb-4">
                            <label for="nom" class="form-label fw-semibold">Nom</label>
                            <input 
                                type="text" 
                                class="form-control border-0 rounded-3 bg-light shadow-sm" 
                                id="nom" 
                                name="nom" 
                                value="{{ $formation->nom }}" 
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
                            >{{ $formation->description }}</textarea>
                        </div>

                        <!-- Champ Durée -->
                        <div class="mb-4">
                            <label for="duree" class="form-label fw-semibold">Durée (en heures)</label>
                            <input 
                                type="number" 
                                class="form-control border-0 rounded-3 bg-light shadow-sm" 
                                id="duree" 
                                name="duree" 
                                value="{{ $formation->duree }}" 
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
                                value="{{ $formation->niveau }}" 
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
                                value="{{ $formation->cout }}" 
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
                                    <option value="{{ $formateur->id }}" {{ $formation->formateur_id == $formateur->id ? 'selected' : '' }}>
                                        {{ $formateur->nom }} {{ $formateur->prenom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Bouton de soumission -->
                        <button 
                            type="submit" 
                            class="btn btn-primary rounded-3 shadow-lg"
                        >
                            Modifier
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

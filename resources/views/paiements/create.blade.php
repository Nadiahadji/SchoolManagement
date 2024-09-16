{{-- <x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item text-primary">
            <a href="{{ route('paiements.index') }}" class="text-decoration-none">Liste des paiements</a>
        </li>
        <li class="breadcrumb-item active text-muted">Ajouter un paiement</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-plus me-2"></i>
                    Ajouter un paiement
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('paiements.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="condidat_id" class="form-label fw-semibold">Condidat</label>
                            <select 
                                id="condidat_id" 
                                name="condidat_id" 
                                class="form-select bg-light border-0 rounded-3 shadow-sm"
                                required
                            >
                                @foreach($condidats as $condidat)
                                    <option value="{{ $condidat->id }}">{{ $condidat->nom }} {{ $condidat->prenom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="formation_id" class="form-label fw-semibold">Formation</label>
                            <select 
                                id="formation_id" 
                                name="formation_id" 
                                class="form-select bg-light border-0 rounded-3 shadow-sm"
                                required
                            >
                                @foreach($formations as $formation)
                                    <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="montant" class="form-label fw-semibold">Montant</label>
                            <input 
                                type="number" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="montant" 
                                name="montant" 
                                required
                                placeholder="Entrez le montant du paiement"
                            >
                        </div>
                        <div class="mb-4">
                            <label for="date_paiement" class="form-label fw-semibold">Date de paiement</label>
                            <input 
                                type="date" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="date_paiement" 
                                name="date_paiement" 
                                required
                            >
                        </div>
                        <div class="mb-4">
                            <label for="methode_paiement" class="form-label fw-semibold">Méthode de paiement</label>
                            <input 
                                type="text" 
                                class="form-control bg-light border-0 rounded-3 shadow-sm" 
                                id="methode_paiement" 
                                name="methode_paiement" 
                                required
                                placeholder="Entrez la méthode de paiement"
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
</x-admin-dash> --}}
<!-- resources/views/paiements/create.blade.php -->
<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item">
            <a href="{{ route('paiements.index') }}" class="text-decoration-none">Liste des paiements</a>
        </li>
        <li class="breadcrumb-item active text-muted">Ajouter un paiement</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-credit-card me-2"></i>
                    Ajouter un paiement
                </div>
                <div class="card-body">
                    <form action="{{ route('paiements.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="condidat_id" class="form-label">Candidat</label>
                            <select id="condidat_id" name="condidat_id" class="form-select" required>
                                <option value="">Choisissez un candidat</option>
                                @foreach($condidats as $condidat)
                                    <option value="{{ $condidat->id }}">{{ $condidat->nom }} {{ $condidat->prenom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formation_id" class="form-label">Formation</label>
                            <select id="formation_id" name="formation_id" class="form-select" required>
                                <option value="">Choisissez une formation</option>
                                @foreach($formations as $formation)
                                    <option value="{{ $formation->id }}">{{ $formation->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="montant" class="form-label">Montant</label>
                            <input type="number" id="montant" name="montant" class="form-control" step="0.01" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_paiement" class="form-label">Date de paiement</label>
                            <input type="date" id="date_paiement" name="date_paiement" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="methode_paiement" class="form-label">Méthode de paiement</label>
                            <input type="text" id="methode_paiement" name="methode_paiement" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        <a href="{{ route('paiements.index') }}" class="btn btn-secondary mt-2">Retour</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

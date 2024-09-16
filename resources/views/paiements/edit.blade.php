<!-- resources/views/paiements/edit.blade.php -->
<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item">
            <a href="{{ route('paiements.index') }}" class="text-decoration-none">Liste des paiements</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('paiements.show', $paiement->id) }}" class="text-decoration-none">Détails du paiement</a>
        </li>
        <li class="breadcrumb-item active text-muted">Modifier le paiement</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-credit-card me-2"></i>
                    Modifier le paiement
                </div>
                <div class="card-body">
                    <form action="{{ route('paiements.update', $paiement->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="condidat_id" class="form-label">Candidat</label>
                            <select id="condidat_id" name="condidat_id" class="form-select" required>
                                @foreach($condidats as $condidat)
                                    <option value="{{ $condidat->id }}" {{ $condidat->id == $paiement->condidat_id ? 'selected' : '' }}>
                                        {{ $condidat->nom }} {{ $condidat->prenom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formation_id" class="form-label">Formation</label>
                            <select id="formation_id" name="formation_id" class="form-select" required>
                                @foreach($formations as $formation)
                                    <option value="{{ $formation->id }}" {{ $formation->id == $paiement->formation_id ? 'selected' : '' }}>
                                        {{ $formation->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="montant" class="form-label">Montant</label>
                            <input type="number" id="montant" name="montant" class="form-control" step="0.01" value="{{ $paiement->montant }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_paiement" class="form-label">Date de paiement</label>
                            <input type="date" id="date_paiement" name="date_paiement" class="form-control" value="{{ $paiement->date_paiement }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="methode_paiement" class="form-label">Méthode de paiement</label>
                            <input type="text" id="methode_paiement" name="methode_paiement" class="form-control" value="{{ $paiement->methode_paiement }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('paiements.show', $paiement->id) }}" class="btn btn-secondary mt-2">Retour</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

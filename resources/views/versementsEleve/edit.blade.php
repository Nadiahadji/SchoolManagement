<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">Modifier le versement</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-edit me-2"></i>
                    Modifier le versement
                </div>
                <div class="card-body">
                    <form action="{{ route('versements.updateVer', $versement->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="date_versement" class="form-label">Date de versement</label>
                            <input type="date" class="form-control" id="date_versement" name="date_versement" value="{{ $versement->date_versement }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="montant" class="form-label">Montant</label>
                            <input type="number" class="form-control" id="montant" name="montant" value="{{ $versement->montant }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        <a href="{{ route('eleves.show', $versement->eleve_id) }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

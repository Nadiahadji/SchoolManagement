<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item">
            <a href="{{ route('condidats.index') }}" class="text-decoration-none">Liste des candidats</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('condidats.show', $condidat->id) }}" class="text-decoration-none">Détails du candidat</a>
        </li>
        <li class="breadcrumb-item active text-muted">Inscrire dans une formation</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-user me-2"></i>
                    Inscription dans une formation
                </div>
                <div class="card-body">
                    <h5>Inscrire {{ $condidat->nom }} {{ $condidat->prenom }} dans une formation</h5>
                    
                    <form action="{{ route('condidats.inscrireFormation', $condidat->id) }}" method="POST">
                        @csrf
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
                            <label for="date_inscription" class="form-label">Date d'inscription</label>
                            <input type="date" id="date_inscription" name="date_inscription" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                        <a href="{{ route('condidats.show', $condidat->id) }}" class="btn btn-secondary mt-2">
                            Retour
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

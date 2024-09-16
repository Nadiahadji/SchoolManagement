<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="{{ route('formations.index') }}">Liste des formations</a></li>
        <li class="breadcrumb-item active">Détails de la formation</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-info-circle me-1"></i>
                    Détails de la formation
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nom</th>
                            <td>{{ $formation->nom }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $formation->description }}</td>
                        </tr>
                        <tr>
                            <th>Durée</th>
                            <td>{{ $formation->duree }}</td>
                        </tr>
                        <tr>
                            <th>Niveau</th>
                            <td>{{ $formation->niveau }}</td>
                        </tr>
                        <tr>
                            <th>Coût</th>
                            <td>{{ $formation->cout }}</td>
                        </tr>
                        <tr>
                            <th>Formateur</th>
                            <td>{{ $formation->formateur->nom }} {{ $formation->formateur->prenom }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('formations.index') }}" class="btn btn-secondary">Retour à la liste</a>
                    <a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-warning">Modifier</a>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

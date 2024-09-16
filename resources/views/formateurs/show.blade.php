<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="{{ route('formateurs.index') }}">Liste des formateurs</a></li>
        <li class="breadcrumb-item active">Détails du formateur</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-user me-1"></i>
                    Détails du formateur
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nom</th>
                            <td>{{ $formateur->nom }}</td>
                        </tr>
                        <tr>
                            <th>Prénom</th>
                            <td>{{ $formateur->prenom }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $formateur->email }}</td>
                        </tr>
                        <tr>
                            <th>Téléphone</th>
                            <td>{{ $formateur->tel }}</td>
                        </tr>
                        <tr>
                            <th>Adresse</th>
                            <td>{{ $formateur->address }}</td>
                        </tr>
                        <tr>
                            <th>Spécialités</th>
                            <td>{{ $formateur->specialties }}</td>
                        </tr>
                        <tr>
                            <th>Qualifications</th>
                            <td>{{ $formateur->qualifications }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('formateurs.index') }}" class="btn btn-secondary">Retour à la liste</a>
                    <a href="{{ route('formateurs.edit', $formateur->id) }}" class="btn btn-warning">Modifier</a>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

<!-- resources/views/eleves/show.blade.php -->
<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">Détails de l'élève</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-user me-1"></i>
                    Détails de l'élève
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nom</th>
                            <td>{{ $eleve->nom }}</td>
                        </tr>
                        <tr>
                            <th>Prénom</th>
                            <td>{{ $eleve->prenom }}</td>
                        </tr>
                        <tr>
                            <th>Date d'inscription</th>
                            <td>{{ $eleve->date_inscription }}</td>
                        </tr>
                        <tr>
                            <th>Téléphone du parent</th>
                            <td>{{ $eleve->tel_parent }}</td>
                        </tr>
                        <tr>
                            <th>Niveau</th>
                            <td>{{ $eleve->niv }}</td>
                        </tr>
                        <tr>
                            <th>Date de naissance</th>
                            <td>{{ $eleve->date_naissance }}</td>
                        </tr>
                        <tr>
                            <th>Offre</th>
                            <td>{{ $eleve->offre }}</td>
                        </tr>
                        <tr>
                            <th>Versement</th>
                            <td>{{ $eleve->versement }}</td>
                        </tr>
                        <tr>
                            <th>Reste</th>
                            <td>{{ $eleve->reste }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('eleves.index') }}" class="btn btn-secondary">Retour à la liste</a>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

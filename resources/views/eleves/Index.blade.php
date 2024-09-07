<!-- resources/views/eleves/index.blade.php -->
<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">Liste des élèves</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                @if(session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif
            <a href="{{ route('eleves.create') }}" class="btn btn-primary mb-3">Ajouter un élève</a>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Élèves
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date d'inscription</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eleves as $eleve)
                                <tr>
                                    <td>{{ $eleve->nom }}</td>
                                    <td>{{ $eleve->prenom }}</td>
                                    <td>{{ $eleve->date_inscription }}</td>
                                    <td>
                                        <a href="{{ route('eleves.show', $eleve->id) }}" class="btn btn-info">Voir</a>
                                        <a href="{{ route('eleves.edit', $eleve->id) }}" class="btn btn-warning">Modifier</a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $eleve->id }}">
                                            Supprimer
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cet élève ? Cette action est irréversible.
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

<!-- JavaScript pour mettre à jour l'action du formulaire de suppression -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Le bouton qui a ouvert la modale
            var eleveId = button.getAttribute('data-id'); // Récupère l'id de l'élève à partir de l'attribut data-id
            var form = document.getElementById('deleteForm');
            form.action = '/eleves/' + eleveId; // Met à jour l'action du formulaire avec l'ID de l'élève
        });
    });
</script>

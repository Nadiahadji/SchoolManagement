<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">Liste des formateurs</li>
    </ol>
    <div class="row">
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
            <a href="{{ route('formateurs.create') }}" class="btn btn-primary mb-3">Ajouter un formateur</a>
            <form action="{{ route('formateur.search') }}" method="GET" class="mb-4">
                <div class="d-flex align-items-center">
                    <!-- Input de recherche avec fond gris -->
                    <div class="position-relative flex-grow-1">
                        <input 
                            type="text" 
                            name="search" 
                            class="form-control form-control-lg bg-light border-secondary rounded-pill shadow-sm" 
                            placeholder="Rechercher un utilisateur" 
                            value="{{ request('search') }}"
                            aria-label="Rechercher un utilisateur"
                        >
                        <span class="position-absolute top-50 end-0 translate-middle-y me-3">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                    </div>
                    <!-- Bouton de recherche -->
                    <button 
                        class="btn btn-primary btn-lg ms-2 rounded-pill shadow" 
                        type="submit"
                    >
                        Rechercher
                    </button>
                </div>
            </form>
            <div class="card mb-4">
                
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Formateurs
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Adresse</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($formateurs as $formateur)
                                <tr>
                                    <td>{{ $formateur->nom }}</td>
                                    <td>{{ $formateur->prenom }}</td>
                                    <td>{{ $formateur->email }}</td>
                                    <td>{{ $formateur->tel }}</td>
                                    <td>{{ $formateur->address }}</td>
                                    <td>
                                        <a href="{{ route('formateurs.show', $formateur->id) }}" class="btn btn-info btn-sm">Voir</a>
                                        <a href="{{ route('formateurs.edit', $formateur->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $formateur->id }}">
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
                    Êtes-vous sûr de vouloir supprimer ce formateur ? Cette action est irréversible.
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
    document.addEventListener('DOMContentLoaded', function () {
        var deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var form = document.getElementById('deleteForm');
            form.action = '/formateurs/' + id;
        });
    });
</script>

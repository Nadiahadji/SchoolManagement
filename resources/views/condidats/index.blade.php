<!-- resources/views/condidats/index.blade.php -->
<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">Liste des candidats</li>
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
            <a href="{{ route('condidats.create') }}" class="btn btn-primary mb-3">Ajouter un candidat</a>
            <form action="{{ route('condidat.search') }}" method="GET" class="mb-4">
                <div class="d-flex align-items-center">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control form-control-lg bg-light border-secondary rounded-pill shadow-sm" 
                        placeholder="Rechercher un candidat" 
                        value="{{ request('search') }}"
                        aria-label="Rechercher un candidat"
                    >
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
                    Candidats
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date d'inscription</th>
                                <th>Formation</th>
                                <th>Montant Versé</th>
                                <th>Montant Restant</th>
                                <th>Statut de Paiement</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($condidats as $condidat)
                                @php
                                    $formationsGrouped = $condidat->formationsGrouped();
                                    $hasFormations = $formationsGrouped->isNotEmpty();
                                @endphp
                                @if($hasFormations)
                                    @foreach($formationsGrouped as $formationId => $formations)
                                        @php
                                            $formation = $formations->first();
                                            $montantVerse = $condidat->montantVerseParFormation($formationId);
                                            $montantTotal = $formation->cout;
                                            $pourcentageVerse = ($montantVerse / $montantTotal) * 100;
                                            $statusText = '';
                                            $statusClass = '';

                                            if ($montantVerse >= $montantTotal) {
                                                $statusText = 'Complète';
                                                $statusClass = 'badge bg-success'; // Vert
                                            } elseif ($pourcentageVerse >= 50) {
                                                $statusText = 'Partielle';
                                                $statusClass = 'badge bg-warning text-dark'; // Orange
                                            } else {
                                                $statusText = 'Incomplète';
                                                $statusClass = 'badge bg-danger'; // Rouge
                                            }
                                        @endphp
                                        <tr>
                                            @if($loop->first)
                                                <td rowspan="{{ $formationsGrouped->count() }}">{{ $condidat->nom }}</td>
                                                <td rowspan="{{ $formationsGrouped->count() }}">{{ $condidat->prenom }}</td>
                                                <td rowspan="{{ $formationsGrouped->count() }}">{{ $condidat->date_inscription }}</td>
                                            @endif
                                            <td>{{ $formation->nom }}</td>
                                            <td>{{ $montantVerse ? $montantVerse . ' DA' : 'N/A' }}</td>
                                            <td>{{ $condidat->montantRestant($formationId) ? $condidat->montantRestant($formationId) . ' DA' : 'N/A' }}</td>
                                            <td>
                                                <span class="{{ $statusClass }}">{{ $statusText ?: 'N/A' }}</span>
                                            </td>
                                            @if($loop->first)
                                                <td rowspan="{{ $formationsGrouped->count() }}">
                                                    <a href="{{ route('condidats.show', $condidat->id) }}" class="btn btn-info btn-sm">Voir</a>
                                                    <a href="{{ route('condidats.edit', $condidat->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $condidat->id }}">
                                                        Supprimer
                                                    </button>
                                                    {{-- <a href="{{ route('condidats.imprimerContrat', $condidat->id) }}" class="btn btn-success btn-sm">Contrat</a> --}}

                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td>{{ $condidat->nom }}</td>
                                        <td>{{ $condidat->prenom }}</td>
                                        <td>{{ $condidat->date_inscription }}</td>
                                        <td colspan="4" class="text-center">Aucune formation</td>
                                        <td>
                                            <a href="{{ route('condidats.show', $condidat->id) }}" class="btn btn-info btn-sm">Voir</a>
                                            <a href="{{ route('condidats.edit', $condidat->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $condidat->id }}">
                                                Supprimer
                                            </button>

                                            {{-- <a href="{{ route('condidats.imprimerContrat', $condidat->id) }}" class="btn btn-success btn-sm">Contrat</a> --}}

                                        </td>

                                    </tr>
                                @endif
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
                    Êtes-vous sûr de vouloir supprimer ce candidat ? Cette action est irréversible.
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
            var button = event.relatedTarget;
            var condidatId = button.getAttribute('data-id');
            var form = document.getElementById('deleteForm');
            form.action = '/condidats/' + condidatId;
        });
    });
</script>

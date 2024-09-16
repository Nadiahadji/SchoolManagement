<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active text-muted">Liste des paiements</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-credit-card me-2"></i>
                    Liste des paiements
                </div>
                <div class="card-body">
                    <a href="{{ route('paiements.create') }}" class="btn btn-success mb-3">
                        Ajouter un paiement
                    </a>

                    <form action="{{ route('paiement.search') }}" method="GET" class="mb-4">
                        <div class="d-flex align-items-center">
                            <input 
                                type="text" 
                                name="search" 
                                class="form-control form-control-lg bg-light border-secondary rounded-pill shadow-sm" 
                                placeholder="Rechercher un paiement" 
                                value="{{ request('search') }}"
                                aria-label="Rechercher un paiement"
                            >
                            <button 
                                class="btn btn-primary btn-lg ms-2 rounded-pill shadow" 
                                type="submit"
                            >
                                Rechercher
                            </button>
                        </div>
                    </form>

                    @if($paiements->isEmpty())
                        <p>Aucun paiement trouvé.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Candidat</th>
                                    <th>Formation</th>
                                    <th>Montant</th>
                                    <th>Date de paiement</th>
                                    <th>Méthode de paiement</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($paiements as $paiement)
                                    <tr>
                                        <td>{{ $paiement->id }}</td>
                                        <td>{{ $paiement->condidat->nom }} {{ $paiement->condidat->prenom }}</td>
                                        <td>{{ $paiement->formation->nom }}</td>
                                        <td>{{ $paiement->montant }} DA</td>
                                        <td>{{ $paiement->date_paiement }}</td>
                                        <td>{{ $paiement->methode_paiement }}</td>
                                        <td>
                                            <a href="{{ route('paiements.show', $paiement->id) }}" class="btn btn-info btn-sm">Voir</a>
                                            <a href="{{ route('paiements.edit', $paiement->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                            <form action="{{ route('paiements.destroy', $paiement->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

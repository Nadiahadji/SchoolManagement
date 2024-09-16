<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">Détails de l'élève</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-user me-2"></i>
                    Détails de l'élève
                </div>
                <div class="card-body">
                    <table class="table table-hover">
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
                            <th>Reste</th>
                            <td>{{ $eleve->reste }}</td>
                        </tr>
                        <tr>
                            <th>Contrat</th>
                            <td>
                                <a href="{{ route('eleves.imprimerContrat', $eleve->id) }}" class="btn btn-info">Imprimer Contrat</a>
                            </td>
                        </tr>
                    </table>
                    
                    <!-- Table des paiements -->
                    <h5 class="mt-4">Liste des paiements</h5>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Montant</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($eleve->versements as $versement)
                                <tr>
                                    <td>{{ $versement->date_versement }}</td>
                                    <td>{{ $versement->montant }} DA</td>
                                    <td>
                                        <a href="{{ route('versements.edit', $versement->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('versements.destroy', $versement->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Aucun paiement enregistré</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

               
                    
                    <a href="{{ route('eleves.index') }}" class="btn btn-secondary">Retour à la liste</a>
                    <a href="{{ route('eleves.payments', $eleve->id) }}" class="btn btn-success mt-3 float-end">Ajouter un versement</a>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

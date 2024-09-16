<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item">
            <a href="{{ route('condidats.index') }}" class="text-decoration-none text-primary">Liste des candidats</a>
        </li>
        <li class="breadcrumb-item active text-muted">Détails du candidat</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-user me-2"></i>
                    Détails du candidat
                </div>
                <div class="card-body">
                    <!-- Informations du Candidat -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="fw-bold me-2">Nom:</div>
                                <div>{{ $condidat->nom }}</div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="fw-bold me-2">Prénom:</div>
                                <div>{{ $condidat->prenom }}</div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="fw-bold me-2">Date d'inscription:</div>
                                <div>{{ $condidat->date_inscription }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="fw-bold me-2">Téléphone:</div>
                                <div>{{ $condidat->tel }}</div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="fw-bold me-2">Niveau:</div>
                                <div>{{ $condidat->niv }}</div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="fw-bold me-2">Adresse:</div>
                                <div>{{ $condidat->adresse }}</div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="fw-bold me-2">Date de naissance:</div>
                                <div>{{ $condidat->date_naissance }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Formations et Paiements -->
                    <h5 class="mt-4 mb-3">Formations et Paiements</h5>
                    @if($condidat->formations->isEmpty())
                        <p class="text-muted">Aucune formation inscrite.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Formation</th>
                                        <th>Montant Versé</th>
                                        <th>Montant Restant</th>
                                        <th>Statut de Paiement</th>
                                        <th>Imprimer Contrat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($condidat->formations->unique('id') as $formation)
                                        @php
                                            $montantVerse = $condidat->montantVerseParFormation($formation->id);
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
                                            <td>{{ $formation->nom }}</td>
                                            <td>{{ $montantVerse ? number_format($montantVerse, 2, ',', ' ') . ' DA' : 'N/A' }}</td>
                                            <td>{{ $condidat->montantRestant($formation->id) ? number_format($condidat->montantRestant($formation->id), 2, ',', ' ') . ' DA' : 'N/A' }}</td>
                                            <td>
                                                <span class="{{ $statusClass }}">{{ $statusText ?: 'N/A' }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('condidats.imprimerContrat', ['id' => $condidat->id, 'formation_id' => $formation->id]) }}" class="btn btn-primary">Imprimer le contrat</a>
                                                {{-- <a href="{{ route('condidat.imprimerContrat', $condidat->id) }}" class="btn btn-info">Imprimer Contrat</a> --}}

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                    <!-- Actions -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('condidats.edit', $condidat->id) }}" class="btn btn-warning">
                            Modifier
                        </a>
                        <a href="{{ route('condidats.index') }}" class="btn btn-secondary">
                            Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

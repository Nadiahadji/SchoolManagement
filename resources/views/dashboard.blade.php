<x-admin-dash>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <!-- Cartes de résumé -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4" style="background-image: url({{ asset('images/students.webp') }}); background-position: right; background-repeat: no-repeat;">
                <div class="card-body">Total d’élèves inscrits <br><span style="text-align: center"> {{$nbrEleves}}</span> </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/eleves">Voir Détails</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4" style="background-image: url({{ asset('images/condidats.webp') }}); background-position: right; background-repeat: no-repeat;">
                <div class="card-body">Nombre total Condidats <br><span style="text-align: center"> {{$nbrcondidats}}</span> </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/condidats">Voir Détails</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4" style="background-image: url({{ asset('images/teacher.webp') }}); background-position: right; background-repeat: no-repeat;">
                <div class="card-body">Nombre total d’enseignants <br><span style="text-align: center"> {{$nbrformateurs}}</span> </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/formateurs">Voir Détails</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4" style="background-image: url({{ asset('images/formations.webp') }}); background-position: right; background-repeat: no-repeat;">
                <div class="card-body">Nombre total Formations <br><span style="text-align: center"> {{$nbrFormations}}</span> </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="/formations">Voir Détails</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-line me-1"></i>
                    Dépenses et Gains Mensuels
                </div>
                <div class="card-body">
                    <!-- Onglets pour les graphiques -->
                    <ul class="nav nav-tabs" id="chartTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="depenses-tab" data-bs-toggle="tab" href="#depenses" role="tab" aria-controls="depenses" aria-selected="true">Dépenses</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="gains-tab" data-bs-toggle="tab" href="#gains" role="tab" aria-controls="gains" aria-selected="false">Gains</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="chartTabContent">
                        <!-- Graphique des Dépenses -->
                        <div class="tab-pane fade show active" id="depenses" role="tabpanel" aria-labelledby="depenses-tab">
                            <canvas id="depensesChart" width="100%" height="40"></canvas>
                        </div>
                        <!-- Graphique des Gains -->
                        <div class="tab-pane fade" id="gains" role="tabpanel" aria-labelledby="gains-tab">
                            <canvas id="gainsChart" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Nombre d'Élèves et de Candidats Inscrits par Mois
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="inscriptionTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="eleves-tab" data-bs-toggle="tab" href="#eleves" role="tab" aria-controls="eleves" aria-selected="true">Élèves</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="candidats-tab" data-bs-toggle="tab" href="#candidats" role="tab" aria-controls="candidats" aria-selected="false">Candidats</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="inscriptionTabContent">
                        <!-- Graphique des Élèves -->
                        <div class="tab-pane fade show active" id="eleves" role="tabpanel" aria-labelledby="eleves-tab">
                            <canvas id="elevesChart" width="100%" height="40"></canvas>
                        </div>
                        <!-- Graphique des Candidats -->
                        <div class="tab-pane fade" id="candidats" role="tabpanel" aria-labelledby="candidats-tab">
                            <canvas id="candidatsChart" width="100%" height="40"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Liste des élèves inscrits aujourd'hui
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Date Naissance</th>
                        <th>Téléphone</th>
                        <th>Offre</th>
                    </tr>
                </thead>
                <tfoot>
                </tfoot>
                <tbody>
                    @foreach ($eleves as $eleve)
                    <tr>
                        <td>{{$eleve->nom}}</td>
                        <td>{{$eleve->prenom}}</td>
                        <td>{{$eleve->adresse}}</td>
                        <td>{{$eleve->date_naissance}}</td>
                        <td>{{$eleve->tel_parent}}</td>
                        <td><span class="badge bg-success text-white">{{$eleve->offre}}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-dash>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialisation du graphique des dépenses mensuelles
        var ctxDepenses = document.getElementById('depensesChart').getContext('2d');
        var depensesChart = new Chart(ctxDepenses, {
            type: 'bar',
            data: {
                labels: @json($mois), // Les mois
                datasets: [{
                    label: 'Dépenses',
                    data: @json($depensesTotaux), // Les totaux des dépenses
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Initialisation du graphique des gains mensuels
        var ctxGains = document.getElementById('gainsChart').getContext('2d');
        var gainsChart = new Chart(ctxGains, {
            type: 'bar',
            data: {
                labels: @json($mois), // Les mois
                datasets: [{
                    label: 'Gains',
                    data: @json($gainsTotaux), // Les totaux des gains
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Initialisation du graphique des élèves inscrits par mois
        var ctxEleves = document.getElementById('elevesChart').getContext('2d');
        var elevesChart = new Chart(ctxEleves, {
            type: 'bar',
            data: {
                labels: @json($mois), // Les mois
                datasets: [{
                    label: 'Élèves Inscrits',
                    data: @json($elevesCounts), // Nombres d'élèves inscrits
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Initialisation du graphique des candidats inscrits par mois
        var ctxCandidats = document.getElementById('candidatsChart').getContext('2d');
        var candidatsChart = new Chart(ctxCandidats, {
            type: 'bar',
            data: {
                labels: @json($mois), // Les mois
                datasets: [{
                    label: 'Candidats Inscrits',
                    data: @json($candidatsCounts), // Nombres de candidats inscrits
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

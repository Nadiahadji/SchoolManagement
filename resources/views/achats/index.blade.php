<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">Liste des achats</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-shopping-cart me-2"></i>
                    Liste des achats
                </div>
                <div class="card-body">
                    <a href="{{ route('achats.create') }}" class="btn btn-primary mb-3">Ajouter un achat</a>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Montant</th>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($achats as $achat)
                                <tr>
                                    <td>{{ $achat->nom }}</td>
                                    <td>{{ $achat->montant }}</td>
                                    <td>{{ $achat->date_achat }}</td>
                                    <td>{{ $achat->description }}</td>
                                    <td>
                                        <a href="{{ route('achats.show', $achat->id) }}" class="btn btn-info btn-sm">Voir</a>
                                        <a href="{{ route('achats.edit', $achat->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                        <form action="{{ route('achats.destroy', $achat->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

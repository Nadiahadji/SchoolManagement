<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">Détails de l'achat</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4 shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
                    <i class="fas fa-info-circle me-2"></i>
                    Détails de l'achat
                </div>
                <div class="card-body">
                    <h5 class="card-title">Nom : {{ $achat->nom }}</h5>
                    <p class="card-text">Montant : {{ $achat->montant }} €</p>
                    <p class="card-text">Date d'achat : {{ $achat->date_achat }}</p>
                    <p class="card-text">Description : {{ $achat->description }}</p>
                    <a href="{{ route('achats.index') }}" class="btn btn-secondary">Retour à la liste</a>
                    <a href="{{ route('achats.edit', $achat->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('achats.destroy', $achat->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

<x-admin-dash>
    <!-- Breadcrumb -->
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item">
            <a href="{{ route('users.index') }}" class="text-decoration-none text-primary">Liste des utilisateurs</a>
        </li>
        <li class="breadcrumb-item active text-muted">Ajouter un utilisateur</li>
    </ol>

    <!-- Card Container -->
    <div class="card mb-4 shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex align-items-center rounded-top">
            <i class="fas fa-plus me-2"></i>
            Ajouter un utilisateur
        </div>
        <div class="card-body bg-light p-4">
            <!-- Formulaire d'ajout -->
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <!-- Champ Nom -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nom</label>
                    <input 
                        type="text" 
                        class="form-control bg-white border-primary rounded-3 shadow-sm" 
                        id="name" 
                        name="name" 
                        required
                        placeholder="Entrez le nom de l'utilisateur"
                    >
                </div>
                <!-- Champ Email -->
                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email</label>
                    <input 
                        type="email" 
                        class="form-control bg-white border-primary rounded-3 shadow-sm" 
                        id="email" 
                        name="email" 
                        required
                        placeholder="Entrez l'email de l'utilisateur"
                    >
                </div>
                <!-- Champ Mot de passe -->
                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Mot de passe</label>
                    <input 
                        type="password" 
                        class="form-control bg-white border-primary rounded-3 shadow-sm" 
                        id="password" 
                        name="password" 
                        required
                        placeholder="Entrez un mot de passe"
                    >
                </div>
                <!-- Champ Confirmation mot de passe -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label fw-semibold">Confirmer le mot de passe</label>
                    <input 
                        type="password" 
                        class="form-control bg-white border-primary rounded-3 shadow-sm" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        required
                        placeholder="Confirmez le mot de passe"
                    >
                </div>
                <!-- Bouton de soumission -->
                <button 
                    type="submit" 
                    class="btn btn-primary rounded-3 shadow-sm"
                >
                    Ajouter
                </button>
            </form>
        </div>
    </div>
</x-admin-dash>

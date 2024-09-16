<x-admin-dash>
    <!-- Breadcrumb -->
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}" class="text-decoration-none text-primary">Liste des utilisateurs</a></li>
        <li class="breadcrumb-item active">Modifier un utilisateur</li>
    </ol>

    <!-- Card Container -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <i class="fas fa-edit me-1"></i>
            Modifier un utilisateur
        </div>
        <div class="card-body">
            <!-- Formulaire de modification -->
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Champ Nom -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input 
                        type="text" 
                        class="form-control rounded-pill border-secondary shadow-sm" 
                        id="name" 
                        name="name" 
                        value="{{ $user->name }}" 
                        required
                    >
                </div>
                <!-- Champ Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input 
                        type="email" 
                        class="form-control rounded-pill border-secondary shadow-sm" 
                        id="email" 
                        name="email" 
                        value="{{ $user->email }}" 
                        required
                    >
                </div>
                <!-- Champ Mot de passe -->
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe (laisser vide pour ne pas modifier)</label>
                    <input 
                        type="password" 
                        class="form-control rounded-pill border-secondary shadow-sm" 
                        id="password" 
                        name="password"
                    >
                </div>
                <!-- Champ Confirmation mot de passe -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input 
                        type="password" 
                        class="form-control rounded-pill border-secondary shadow-sm" 
                        id="password_confirmation" 
                        name="password_confirmation"
                    >
                </div>
                <!-- Bouton de soumission -->
                <button 
                    type="submit" 
                    class="btn btn-primary rounded-pill shadow-sm"
                >
                    Modifier
                </button>
            </form>
        </div>
    </div>
</x-admin-dash>

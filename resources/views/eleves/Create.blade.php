<!-- resources/views/eleves/create.blade.php -->
<x-admin-dash>
    <ol class="breadcrumb mb-4 mt-4">
        <li class="breadcrumb-item active">Ajouter un élève</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus me-1"></i>
                    Ajouter un élève
                </div>
                <div class="card-body">
                    <form action="{{ route('eleves.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_inscription" class="form-label">Date d'inscription</label>
                            <input type="date" class="form-control" id="date_inscription" name="date_inscription" required>
                        </div>
                        <div class="mb-3">
                            <label for="tel_parent" class="form-label">Téléphone du parent</label>
                            <input type="text" class="form-control" id="tel_parent" name="tel_parent" required>
                        </div>
                        <div class="mb-3">
                            <label for="niv" class="form-label">Niveau</label>
                            <input type="text" class="form-control" id="niv" name="niv" required>
                        </div>
                        <div class="mb-3">
                            <label for="date_naissance" class="form-label">Date de naissance</label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" required>
                        </div>
                        <div class="mb-3">
                            <label for="offre" class="form-label">Offre</label>
                            <input type="number" class="form-control" id="offre" name="offre" required>
                        </div>
                        <div class="mb-3">
                            <label for="versement" class="form-label">Versement</label>
                            <input type="number" class="form-control" id="versement" name="versement" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-dash>

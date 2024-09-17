<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="mb-4">Liste des Contacts</h2>
    <div class="d-flex justify-content-center align-items-center mb-3">
        <a href="/contact" class="btn btn-primary">Ajouter</a>
    </div>
    <table class="table table-bordered table-responsive">
        <thead class="table-light">
            <tr>
                <th>Nom</th>
                <th>Téléphone</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->nom }}</td>
                <td>{{ $item->telephone }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <a href="{{ url('modifier_contact' , $item->id ) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="{{ url('supprimer_contact' , $item->id ) }}" class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
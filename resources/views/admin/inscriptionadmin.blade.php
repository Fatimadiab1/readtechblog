<form action="{{ route('registerAdmin') }}" method="POST">
    @csrf
    <input type="text" name="nom" placeholder="Nom" required>
    <input type="text" name="prenom" placeholder="Prénom" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
    <input type="text" name="phone" placeholder="Téléphone">
    <input type="text" name="address" placeholder="Adresse">
    <button type="submit">Créer Administrateur</button>
</form>

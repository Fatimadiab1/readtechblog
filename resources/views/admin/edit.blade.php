<form action="{{ route('admin.update', $admin->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="nom">Nom :</label>
    <input type="text" name="nom" value="{{ old('nom', $admin->nom) }}" required>
    @error('nom')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <label for="prenom">Prénom :</label>
    <input type="text" name="prenom" value="{{ old('prenom', $admin->prenom) }}" required>
    @error('prenom')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <label for="email">Email :</label>
    <input type="email" name="email" value="{{ old('email', $admin->email) }}" required>
    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <label for="password">Mot de passe (laisser vide pour ne pas changer) :</label>
    <input type="password" name="password">
    @error('password')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <label for="password_confirmation">Confirmer le mot de passe :</label>
    <input type="password" name="password_confirmation">

    <label for="phone">Téléphone :</label>
    <input type="text" name="phone" value="{{ old('phone', $admin->phone) }}">
    @error('phone')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <label for="address">Adresse :</label>
    <input type="text" name="address" value="{{ old('address', $admin->address) }}">
    @error('address')
        <span class="text-danger">{{ $message }}</span>
    @enderror

    <button type="submit">Enregistrer</button>
</form>

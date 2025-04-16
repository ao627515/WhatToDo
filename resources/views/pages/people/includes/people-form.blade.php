<div class="form-group">
    <label for="lastname">Nom</label>
    <input type="text" name="lastname" id="lastname" placeholder="Nom de famille"
        value="{{ old('lastname', $person?->lastname ?? '') }}">
    @error('lastname')
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="firstname">Prénom(s)</label>
    <input type="text" name="firstname" id="firstname" placeholder="Jhon Doe"
        value="{{ old('firstname', $person?->firstname ?? '') }}">
    @error('firstname')
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" placeholder="example@gmail.com"
        value="{{ old('email', $person?->email ?? '') }}">
    @error('email')
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="gender">Genre</label>
    <select name="gender" id="gender">
        <option disabled {{ old('gender', $person?->gender->value ?? '') ? '' : 'selected' }}>Choisissez votre genre
        </option>
        @foreach ($genders as $key => $gender)
            <option value="{{ $key }}">{{ $gender }}</option>
        @endforeach
    </select>
    @error('gender')
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="birthdate">Date de naissance</label>
    <input type="date" name="birthdate" id="birthdate"
        value="{{ old('birthdate', $person?->birthdate->format('Y-m-d') ?? '') }}">
    @error('birthdate')
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="birthplace">Lieu de naissance</label>
    <input type="text" name="birthplace" id="birthplace" placeholder="Ville, Pays"
        value="{{ old('birthplace', $person?->birthplace ?? '') }}">
    @error('birthplace')
        <p class="error-message">{{ $message }}</p>
    @enderror
</div>

<div class="form-actions">
    <button type="button" class="btn-secondary" id="cancelBtn">Annuler</button>
    <button type="submit" class="btn-primary" id="saveBtn">Enregistrer</button>
</div>

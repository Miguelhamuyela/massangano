<div class="row">

    {{-- Utilizador --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Nome </label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
            placeholder="Digite o nome completo...">
    </div>

    {{-- E-mail --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
            placeholder="Digite o seu e-mail...">
    </div>

    {{-- Password --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" value="{{ old('password') }}"
            placeholder="Digite a password...">
    </div>
    {{-- Password Confirm --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Confirmar Password</label>
        <input type="password" name="password" class="form-control" value="{{ old('password') }}"
            placeholder="Digite a password...">
    </div>

    {{-- Image --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Foto de Perfil</label>
        <input type="file" name="image" class="form-control">
        <small class="text-muted">Formatos suportados: jpg, jpeg, png, gif</small>
    </div>

    {{-- Nivel de acesso --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Nivel de Acesso</label>
        <select name="access_level" id="access_level" class="form-control">
            <option value="" selected>--Selecion um nivel de acesso--</option>
            <option value="Assinate">Assinate</option>
            <option value="Jornalista">Jornalista</option>
            <option value="Editor">Editor</option>
            <option value="Admin">Admin</option>
        </select>
    </div>

    {{-- Biography --}}
    {{-- <div class="col-12 mb-4">
                                        <label class="form-label">Biográfia</label>
                                        <textarea name="biography" class="form-control" rows="4" placeholder="Escreve a sua biográfia...">{{ old('biography') }}</textarea>
                                    </div> --}}

    {{-- Botão de Enviar --}}
    <div class="col-12">
        <button type="submit" class="btn btn-danger"> Salvar
            <i class="feather-save ms-2"></i>
        </button>
    </div>
</div>

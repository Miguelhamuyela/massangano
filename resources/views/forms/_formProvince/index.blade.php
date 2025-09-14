<div class="row">
    {{-- Nome --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Nome da Província</label>
        <input type="text" name="name" class="form-control" value="{{ old('nome') }}" placeholder="Ex: Luanda...">
    </div>

    {{-- Botão de Enviar --}}
    <div class="col-12">
        <button type="submit" class="btn btn-danger"> Salvar
            <i class="feather-save ms-2"></i>
        </button>
    </div>
</div>

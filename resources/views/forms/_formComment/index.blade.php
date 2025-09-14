<div class="row">
    {{-- Nome --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Texto do Comentário</label>
        <input type="text" name="text_comment" class="form-control"
            value="{{ old('nome', $comment->text_comment ?? '') }}" placeholder="Ex: Será que é verdade...">
    </div>

    {{-- Slug --}}
    {{-- <div class="col-lg-4 mb-4">
                                        <label class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control"
                                            value="{{ old('slug', $category->slug) }}"
                                            placeholder="ex: politica, desporto...">
                                    </div> --}}

    {{-- Tipo --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Autor do Comentário</label>
        <input type="text" name="author_comment" class="form-control"
            value="{{ old('type', $comment->author_comment ?? '') }}" placeholder="Ex: Ana Maria...">
    </div>

    {{-- Status --}}
    {{-- <div class="col-lg-4 mb-4">
                                        <label class="form-label">Status</label>
                                        <select class="form-control" name="status" data-select2-selector="status">
                                            <option value="" disabled selected>Selecione o status</option>
                                            <option value="active" data-bg="bg-success"> Ativo</option>
                                            <option value="inactive" data-bg="bg-danger"> Inativo</option>
                                        </select>
                                    </div> --}}

    {{-- Date --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Data de Publicação</label>
        <input type="date" name="date" class="form-control"
            value="{{ old('date', $comment->date ?? date('Y-m-d')) }}">
    </div>

    {{-- Botão de Enviar --}}
    <div class="col-12">
        <button type="submit" class="btn btn-danger"> Salvar
            <i class="feather-save ms-2"></i>
        </button>
    </div>
</div>

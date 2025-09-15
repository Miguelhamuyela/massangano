<div class="row">
    <div class="col-lg-12">
        <div class="card stretch stretch-full">
            <div class="card-body lead-status">
                <div class="mb-5 d-flex align-items-center justify-content-between">
                    <h5 class="fw-bold mb-0 me-4">
                        <span class="d-block mb-2">Editar Finalista :</span>
                        <span class="fs-12 fw-normal text-muted text-truncate-1-line">
                            Insira as informações da sua nova Finalista aqui.
                        </span>
                    </h5>
                </div>
                <div class="row">
                    {{-- Selecione a Universidade --}}
                    <div class="col-lg-4 mb-4" id="escola-div">
                        <label class="form-label select">Selecione a Universidade</label>
                        <select class="form-control" id="schools_id" name="id_schools" required>
                            <option value="">Selecione a Escola</option>
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}">
                                    {{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Fim do Selecione a Escola --}}

                    {{-- Selecione o Curso --}}
                    <div class="col-lg-4 mb-4" id="curso-div">
                        <label class="form-label select">Selecione o Curso</label>
                        <select class="form-control" id="courses_id" name="id_courses" required>
                            <option value="">Selecione o Curso</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}">
                                    {{ $course->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- Fim do Selecione o Curso --}}

                    {{-- Div de Nomes dos nomes Finalistas --}}
                    <div class="col-lg-6 mb-4">
                        <label class="form-label">Nome do Finalista</label>
                        <input type="text" class="form-control" name="name"
                            value="{{ old('name', $finalist->name ?? '') }}" id="name"
                            placeholder="Insira o nome da Finalista...">
                    </div>
                    {{-- Fim da Div dos nomes Finalistas --}}

                    {{-- Div de E-mail dos Finalistas --}}
                    <div class="col-lg-6 mb-4">
                        <label class="form-label">E-mail</label>
                        <input type="email" class="form-control" name="email"
                            value="{{ old('email', $finalist->email ?? '') }}" id="email"
                            placeholder="Insira o e-mail da Finalista...">
                    </div>
                    {{-- Fim da Div do E-mail dos Finalistas --}}

                    {{-- Div de Telefone dos Finalistas --}}
                    <div class="col-lg-6 mb-4">
                        <label class="form-label">Telefone</label>
                        <input type="text" class="form-control" name="phone"
                            value="{{ old('phone', $finalist->phone ?? '') }}" id="phone"
                            placeholder="Insira o telefone da Finalista...">
                    </div>
                    {{-- Fim da Div do Telefone dos Finalistas --}}

                    {{-- Div de BI dos Finalistas --}}
                    <div class="col-lg-6 mb-4">
                        <label class="form-label">BI</label>
                        <input type="text" class="form-control" name="bi"
                            value="{{ old('bi', $finalist->bi ?? '') }}" id="bi"
                            placeholder="Insira o BI da Finalista...">
                    </div>
                    {{-- Fim da Div do BI dos Finalistas --}}

                    {{-- Div de upload de imagem dos Finalistas --}}
                    <div class="col-lg-6 mb-4">
                        <label for="coverImg" class="form-label">Imagem de Capa: </label>
                        <input type="file" class="form-control" name="cover" id="coverImg"
                            value="{{ old('cover', $finalist->cover ?? '') }}" placeholder="Carregue a imagem...">
                    </div>
                    {{-- Fim da Div de upload de imagem dos Finalistas --}}

                    {{-- Div de upload de arquivo dos Finalistas --}}
                    <div class="col-lg-6 mb-4">
                        <label for="arquivo" class="form-label">Arquivo: </label>
                        <input type="file" class="form-control" name="file" id="arquivo"
                            value="{{ old('file', $finalist->file ?? '') }}" placeholder="Carregue o arquivo...">
                    </div>
                    {{-- Fim da Div de upload de arquivo dos Finalistas --}}
                </div>
                <div class="col-lg-4 mb-4"> <button type="submit" class="btn btn-danger">
                        Salvar
                        <i class="feather-save ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

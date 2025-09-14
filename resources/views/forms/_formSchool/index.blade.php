<div class="row">
    {{-- Nome --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Nome da Universidade</label>
        <input type="text" name="name" class="form-control" value="{{ old('nome', $shool->name ?? '') }}"
            placeholder="Ex: Universidade...">
    </div>

    {{-- Numero da Universidade --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Nº da Universidade</label>
        <input type="text" name="nSchool" class="form-control" value="{{ old('nSchool', $school->nSchool ?? '') }}"
            placeholder="Ex: ID da Universidade..">
    </div>

    {{-- E-mail --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">E-Mail da Universidade</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $school->email ?? '') }}"
            placeholder="Ex: Endereço de Email..">
    </div>

    {{-- NIF --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">NIF da Universidade</label>
        <input type="text" name="nif" class="form-control" value="{{ old('nif', $school->nif ?? '') }}"
            placeholder="NIF da Universidade (Instituição)..">
    </div>

    {{-- Telefone --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Telefone da Universidade</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $school->phone ?? '') }}"
            placeholder="Ex: +244 923 000   000 / +244 923 000 000">
    </div>

    <div class="mb-5 d-flex align-items-center justify-content-between">
        <h5 class="fw-bold mb-0 me-4">
            <span class="d-block mb-2">Informações da Universidade :</span>
        </h5>
    </div>

    {{-- Type of Schools --}}
    <div class="col-lg-4
                                            mb-4">
        <label class="form-label">Tipo de Universidade</label>
        <select class="form-control select" id="schoolType" name="schoolType" required>
            <option value="{{ old('schoolType', $school->schoolType ?? '') }}">Seleciona o
                Tipo
                de
                Universidade
            </option>
            <option value="publica">Pública</option>
            <option value="privada">Privada</option>
        </select>
    </div>

    {{-- Quantidade de Salas --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Quantidade de Salas</label>
        <input type="text" name="nRoom" class="form-control" value="{{ old('nRoom', $school->nRoom ?? '') }}"
            placeholder="Insira o total de Salas de aulas">
    </div>

    {{-- Nivel de Universidade --}}
    <div class="col-lg-4 mb-4" id="nivel-div" style="display: none;">
        <label class="form-label select">Nivel de Universidade</label>
        <select class="form-control select" name="schoolLevel" id="schoolLevel" required>
            <option value="{{ old('schoolLevel', $school->schoolLeve ?? '') }}">Seleciona o
                Nivel
                de Universidade
            </option>
        </select>
    </div>

    {{-- Categoria de Universidade --}}
    <div class="col-lg-4 mb-4" id="categoria-div" style="display: none;">
        <label class="form-label select">Categoria de Universidade</label>
        <select class="form-control select" name="schoolCategory" id="schoolCategory">
            <option value="{{ old('schoolCategory', $school->schoolCategory ?? '') }}">Selecione
                a
                Categoria da Universidade
            </option>
        </select>
    </div>

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

    {{-- Selecione a Classe --}}
    {{-- <div class="col-lg-4 mb-4" id="classe-div" style="display: none;">
                                        <label class="form-label select">Selecione a Classe</label>
                                        <select class="form-control" name="class" id="class" required>
                                            <option value="">Selecione a Classe
                                            </option>
                                        </select>
                                    </div> --}}

    {{-- Selecione o Turno --}}
    <div class="col-lg-4 mb-4" id="turno-div" style="display: none;">
        <label class="form-label select">Selecione o Turno</label>
        <select class="form-control" name="bout" id="bout" required>
            <option value="{{ old('bout', $school->bout ?? '') }}">Selecione o Turno
            </option>
            </option>
        </select>
    </div>

    <div class="mb-5 d-flex align-items-center justify-content-between">
        <h5 class="fw-bold mb-0 me-4">
            <span class="d-block mb-2">Endereço da Universidade :</span>
        </h5>
    </div>

    {{-- Provincia --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Provincia</label>
        <select class="form-control" name="id_provinces" id="province_id" required>
            <option value="">Seleciona a Provincia
            </option>
            @foreach ($provinces as $province)
                <option value="{{ $province->id }}">
                    {{ $province->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Municipio --}}
    <div class="col-lg-4 mb-4">
        <label class="form-label">Município</label>
        <select class="form-control" name="id_counties" id="county_id" required>
            <option value="">Seleciona o Município
            </option>
            @foreach ($counties as $county)
                <option value="{{ $county->id }}">
                    {{ $county->name }}</option>
            @endforeach
        </select>
    </div>

    {{-- Descrição --}}
    <div class="col-12 mb-4">
        <label class="form-label">Descrição</label>
        <textarea name="description" class="form-control" rows="4" placeholder="Escreve uma descrição...">{{ old('description') }}</textarea>
    </div>

    {{-- Botão de Enviar --}}
    <div class="col-12">
        <button type="submit" class="btn btn-danger"> Salvar
            <i class="feather-save ms-2"></i>
        </button>
    </div>
</div>

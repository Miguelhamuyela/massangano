@extends('_admin.layout.main')
@section('title', 'Criar Finalista')
@section('content')

    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Finalista</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Criar</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <div class="dropdown filter-dropdown">
                            {{--  <a class="btn btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10"
                                data-bs-auto-close="outside">
                                <i class="feather-filter me-2"></i>
                                <span>Filter</span>
                            </a> --}}
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Role"
                                            checked="checked">
                                        <label class="custom-control-label c-pointer" for="Role">Role</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Team"
                                            checked="checked">
                                        <label class="custom-control-label c-pointer" for="Team">Team</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Email"
                                            checked="checked">
                                        <label class="custom-control-label c-pointer" for="Email">Email</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Member"
                                            checked="checked">
                                        <label class="custom-control-label c-pointer" for="Member">Member</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Recommendation"
                                            checked="checked">
                                        <label class="custom-control-label c-pointer"
                                            for="Recommendation">Recommendation</label>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-plus me-3"></i>
                                    <span>Create New</span>
                                </a>
                                {{--  <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-filter me-3"></i>
                                    <span>Manage Filter</span>
                                </a> --}}
                            </div>
                        </div>
                        <a href="{{ route('admin.finalist.listar') }}" class="btn btn-danger">
                            <i class="feather-chevron-left me-2"></i>
                            <span>Voltar</span>
                        </a>
                    </div>
                </div>
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- [ page-header ] end -->
        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <!-- __________________________________________________
                                                                                                  Criando Formulario finalist Create
                                                                                   _______________________________________________________________-->
                <!-- [ Main Content ] start -->
                <div class="main-content">
                    <form id="finalistForm" action="{{ route('admin.finalist.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card stretch stretch-full">
                                    <div class="card-body lead-status">
                                        <div class="mb-5 d-flex align-items-center justify-content-between">
                                            <h5 class="fw-bold mb-0 me-4">
                                                <span class="d-block mb-2">Criando Finalista :</span>
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
                                                    value="{{ old('name') }}" id="name"
                                                    placeholder="Insira o nome da Finalista...">
                                            </div>
                                            {{-- Fim da Div dos nomes Finalistas --}}

                                            {{-- Div de E-mail dos Finalistas --}}
                                            <div class="col-lg-6 mb-4">
                                                <label class="form-label">E-mail</label>
                                                <input type="email" class="form-control" name="email"
                                                    value="{{ old('email') }}" id="email"
                                                    placeholder="Insira o e-mail da Finalista...">
                                            </div>
                                            {{-- Fim da Div do E-mail dos Finalistas --}}

                                            {{-- Div de Telefone dos Finalistas --}}
                                            <div class="col-lg-6 mb-4">
                                                <label class="form-label">Telefone</label>
                                                <input type="text" class="form-control" name="phone"
                                                    value="{{ old('phone') }}" id="phone"
                                                    placeholder="Insira o telefone da Finalista...">
                                            </div>
                                            {{-- Fim da Div do Telefone dos Finalistas --}}

                                            {{-- Div de BI dos Finalistas --}}
                                            <div class="col-lg-6 mb-4">
                                                <label class="form-label">BI</label>
                                                <input type="text" class="form-control" name="bi"
                                                    value="{{ old('bi') }}" id="bi"
                                                    placeholder="Insira o BI da Finalista...">
                                            </div>
                                            {{-- Fim da Div do BI dos Finalistas --}}

                                            {{-- Div de upload de imagem dos Finalistas --}}
                                            <div class="col-lg-6 mb-4">
                                                <label for="coverImg" class="form-label">Imagem de Perfil: </label>
                                                <input type="file" class="form-control" name="cover" id="coverImg"
                                                    value="{{ old('cover') }}" placeholder="Carregue a imagem...">
                                            </div>
                                            {{-- Fim da Div de upload de imagem dos Finalistas --}}

                                            {{-- Div de upload de arquivo dos Finalistas --}}
                                            <div class="col-lg-6 mb-4">
                                                <label for="arquivo" class="form-label">Arquivo: </label>
                                                <input type="file" class="form-control" name="file" id="arquivo"
                                                    value="{{ old('file') }}" placeholder="Carregue o arquivo...">
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
                </div>

            </div>

            </form>

        </div>
        <!-- [ Main Content ] end -->
    </div>

    <!-- [ Main Content ] end -->
    </div>

@endsection

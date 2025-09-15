<<<<<<< HEAD:resources/views/_admin/provinces/provinceCreate/index.blade.php
@extends('_admin.layout.main')
@section('title', 'Sogecepa- Criar Universidade')
=======
@extends('layouts._admin.main')
@section('title', 'Assessorarte- Criar Universidade')
>>>>>>> a6152299be6b6e8a5113ed70b9eaf40a457d6cb0:resources/views/_admin/provinces/create/index.blade.php
@section('content')

    <!-- [ Craete Form ] -->
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Universidade</h5>
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
                        <a href="#" class="btn btn-danger">
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
                <div class="col-lg-12">
                    <div class="card stretch stretch-full">
                        <div class="card-body lead-status">
                            <div class="mb-5 d-flex align-items-center justify-content-between">
                                <h5 class="fw-bold mb-0 me-4">
                                    <span class="d-block mb-2">Criando Província :</span>
                                    <span class="fs-12 fw-normal text-muted text-truncate-1-line">Normalmente se refere a
                                        adicionar uma nova Província</span>
                                </h5>
                                <a href="#" class="btn btn-sm btn-light-brand">Listar
                                    Província</a>
                            </div>
                            <form action="{{ route('admin.province.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                @include('forms._formProvince.index')
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>

@endsection

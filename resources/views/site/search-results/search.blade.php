@extends('layouts._site.main')

@section('title', 'Resultados da Pesquisa')

@section('content')
    <div class="container py-4">
<<<<<<< HEAD
        <h3>Resultados encontrados das pesquisas: "{{ $query }}"</h3>

=======
        <h3>Resultados para: "{{ $query }}"</h3>
>>>>>>> 98a4f8a6a811aa559cb1c5b2233b5911cc2289fc
        <section class="space-top space-extra-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-9 col-lg-8">
                        <div class="mb-30">
                            {{-- Se for finalistas --}}
                            @if ($finalists->count())
                                <h4>Finalista encontrado</h4>
                                @foreach ($finalists as $finalist)
                                    <div class="border-blog2">
                                        <div class="blog-style4">
                                            <div class="blog-img img-big img-profile">
                                                <a href="{{ asset('img/finalist/' . $finalist->cover) }} " target="_blank">
                                                    <img src="{{ asset('img/finalist/' . $finalist->cover) }}"
                                                        alt="blog image">
                                                </a>
                                            </div>
                                            <div class="blog-content">
                                                @if ($finalist->course)
                                                    <h5>
                                                        Curso: <a data-theme-color="#6234AC" href="blog.html"
                                                            class="course hover-line">
                                                            {{ $finalist->course->name }}
                                                        </a>
                                                    </h5>
                                                @endif
                                                @if ($finalist->school)
                                                    <h5>
                                                        Universidade: <a data-theme-color="#6234AC" href="blog.html"
                                                            class="school hover-line">
                                                            {{ $finalist->school->name }}
                                                        </a>
                                                    </h5>
                                                @endif

                                                <h4>Nome do Finalista:<a class="hover-line" href="#">
                                                        {{ $finalist->name }}</h4>
                                                </a>


                                                @if ($finalist->file && file_exists(public_path('files/finalist/' . $finalist->file)))
                                                    <a href="{{ asset('files/finalist/' . $finalist->file) }}" download>
                                                        <i class="fas fa-file-pdf me-1"></i> Baixar PDF
                                                    </a>
                                                @else
                                                    <span class="text-muted">Nenhum arquivo PDF disponível</span>
                                                @endif
                                                {{-- <div class="blog-meta">
                                                    <a href="#">
                                                        <i class="fal fa-calendar-days"></i>
                                                        {{ $finalist->updated_at->format('d M, Y') }}
                                                    </a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                {{-- Se for notícias --}}
                            @elseif($news->count())
                                <h4>Notícias encontradas</h4>
                                @foreach ($news as $item)
                                    <div class="border-blog2">
                                        <div class="blog-style4">
                                            <div class="blog-img img-big img-allnews">
                                                <img src="{{ asset('img/news/' . $item->image) }}" alt="blog image">
                                            </div>
                                            <div class="blog-content">
                                                @if ($item->category)
                                                    <a data-theme-color="#6234AC" href="blog.html" class="category">
                                                        {{ $item->category->name }}
                                                    </a>
                                                @endif
                                                <h3 class="box-title-20">
                                                    <a class="hover-line"
                                                        href="{{ route('site.newsView', ['news' => $item]) }}">
                                                        {{ Str::limit($item->title, 50) }}
                                                    </a>
                                                </h3>
                                                <div class="blog-meta">
                                                    <a href="#">
                                                        <i class="fal fa-calendar-days"></i>
                                                        {{ $item->updated_at->format('d M, Y') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                {{-- Se não achou nada --}}
                            @elseif($schools->count())
                                <h4>Universidade encontrada</h4>
                                @foreach ($schools as $school)
                                    <div class="border-blog2">
                                        <div class="blog-style4">
                                            <div class="blog-img img-big img-profile">
                                                <img src="{{ asset('img/school/' . $school->image) }}" alt="blog image">
                                            </div>
                                            <div class="blog-content">
                                                <h3 {{-- class="box-title-20" --}}>
                                                    <a class="hover-line" href="#">
                                                        {{ $school->name }}
                                                    </a>
                                                </h3>
                                                <p>Dados da Intituição</p>
                                                <h5>
                                                    E-mail: <a class="hover-line" href="#">
                                                        {{ $school->email }}
                                                    </a>
                                                </h5>
                                                <h5>
                                                    Telefone: <a class="hover-line" href="#">
                                                        {{ $school->phone }}
                                                    </a>
                                                </h5>

                                                @if ($school->province)
                                                    <b>
                                                        <p class="hover-line">
                                                            Endereço: <a data-theme-color="#6234AC" href="blog.html"
                                                                class="course hover-line">
                                                                {{ $school->province->name }} /
                                                                {{ $school->county->name }}
                                                            </a>
                                                        </p>
                                                    </b>
                                                @endif

                                                {{--  <div class="blog-meta">
                                                    <a href="#">
                                                        <i class="fal fa-calendar-days"></i>
                                                        {{ $school->updated_at->format('d M, Y') }}
                                                    </a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                {{-- Se não achou nada --}}
                            @else
                                <p>Nenhum resultado encontrado.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection

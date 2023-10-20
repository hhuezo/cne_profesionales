@extends('template')

@section('contenido')
    <style>
        <?php echo $snippet->css_content; ?>
    </style>
    <?php echo $snippet->html_content; ?>


    <!-- ======= Services Section ======= -->




    @if ($documentos->count() > 0)
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    @foreach ($documentos as $obj)
                        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                            data-aos-delay="200">
                            <a href="{{ url('docs') }}/{{ $obj->Url }}" target="_blank">
                                <div class="icon-box col-12">
                                    <div class="icon"><i class="bx bx-file"></i></div>
                                    <h4><a href="">{{ $obj->Descripcion }}</a></h4>
                                    {{-- <p>tezt</p> --}}
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>

            </div>
        </section>
    @endif

    @if ($noticias->count() > 0)
        <style>
            .img-responsive {
                width: 100%;
            }
        </style>
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    @foreach ($noticias as $obj)
                        <div class="col-lg-6 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in"
                            data-aos-delay="200">
                            <a href="{{ url('docs') }}/{{ $obj->Url }}" target="_blank">
                                <div class="icon-box col-12">
                                    <h4><a href="">{{ $obj->Titulo }}</a></h4>
                                    <img src="{{ asset('docs') }}/{{ $obj->Url }}" class="img-responsive">
                                    
                                    <p style="text-align: justify;">{{ $obj->Descripcion }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach


                </div>

            </div>
        </section>
    @endif

    <!-- End Services Section -->
@endsection

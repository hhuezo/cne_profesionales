@extends('template')

@section('contenido')
    <style>
        <?php echo $snippet->css_content; ?>
    </style>
    <?php echo $snippet->html_content; ?>


    <!-- ======= Services Section ======= -->





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
    </section><!-- End Services Section -->
@endsection

<!-- Galeria -->
<section id="gallery" class="ls s-pt-90 s-pb-80 s-pt-xl-160 s-pb-xl-150 c-gutter-10">
    <div class="container">
        {{--
        <div class="row">
            <div class="col-lg-6">
                <div class="content-center">
                    <div class="divider-lg-25 divider-xl-50"></div>
                    <h3 class="text-center text-md-left mt-0 mb-2 special-heading color-darkgrey">
                        <span>
                            {{ __('website.galleries.one.title') }}
                        </span>
                    </h3>
                    <div class="divider-40 divider-lg-25 divider-xl-50"></div>
                    <p class="justify-text color-darkgrey fs-20 fw-500">
                        <span>
                            {{ __('website.galleries.one.description') }}
                        </span>
                    </p>
                    <div class="divider-40 divider-lg-25 divider-xl-50"></div>
                    <div class="post_format-post-format-video">
                        <div class="embed-responsive embed-responsive-3by2">
                            <video autoplay="" loop="" muted="" playsinline="" class="embed-responsive-item" style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; -o-object-fit: cover; object-fit: cover;">
                                <source src="img/portadas/6037330_Chef_Meat_Chiken_1280x720.mp4" type="video/mp4">
                            </video>
                        </div>
                    </div>
                    <div class="divider-10 divider-lg-0"></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row isotope-wrapper  c-mb-10">
                    <div class="col-lg-12">
                        <div class="vertical-item item-gallery content-absolute ds">
                            <div class="item-media">
                                <img src="img/galeria/comidas/27.jpg" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="vertical-item item-gallery content-absolute ds">
                            <div class="item-media">
                                <img src="img/galeria/comidas/17.jpg" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="vertical-item item-gallery content-absolute ds">
                            <div class="item-media">
                                <img src="img/galeria/comidas/28.jpg" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}

        <h3 class="text-center text-md-left mt-0 mb-2 special-heading color-darkgrey">
            <span>
                {{ __('website.galleries.one.title') }}
            </span>
        </h3>
        <div class="divider-40 divider-lg-25 divider-xl-50"></div>
        <p class="justify-text color-darkgrey fs-20 fw-500">
            <span>
                {{ __('website.galleries.one.description') }}
            </span>
        </p>
        <div class="divider-40 divider-lg-25 divider-xl-50"></div>

        <!-- Vamos a crear un carrusel con owl para mostrar las imágenes de la galería. -->
        <div class="owl-carousel" data-margin="60" data-responsive-xl="1" data-responsive-ml="1" data-responsive-lg="1" data-responsive-md="1" data-responsive-sm="1" data-responsive-xs="1" data-dots="true" data-loop="true" data-autoplay="true">
            
            <div>
                <img src="{{ asset('img/galeria/comidas/slides/slide1.jpg') }}" alt="Comidas para empleados">
            </div>

            <div>
                <img src="{{ asset('img/galeria/comidas/slides/slide2.jpg') }}" alt="Comidas para empleados">
            </div>

            <div>
                <img src="{{ asset('img/galeria/comidas/slides/slide3.jpg') }}" alt="Comidas para empleados">
            </div>

            <div>
                <img src="{{ asset('img/galeria/comidas/slides/slide4.jpg') }}" alt="Comidas para empleados">
            </div>

            <div>
                <img src="{{ asset('img/galeria/comidas/slides/slide5.jpg') }}" alt="Comidas para empleados">
            </div>

        </div>
    </div>
</section>
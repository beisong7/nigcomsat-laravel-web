<header>
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade mt-100" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url('{{ url('img/sliders/slider1.jpg') }}')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">

                    </h2>

                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ url('img/sliders/slider2.jpg') }}')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">

                    </h2>

                </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ url('img/sliders/slider3.jpg') }}')">
                <div class="carousel-caption d-none d-md-block">
                    <h2 class="display-4">

                    </h2>

                </div>
            </div>
            <div class="carousel-item bg-faded" style="">
                <div class="carousel-caption m-0 d-md-block">
                    <h2 class="display-4 text-center">
                        One Place for All Your TV and Movies
                    </h2>
                    <p class="text-center fs-20">
                        Watch Hundreds of shows and movies, with plans starting at NGN2,499/month.
                    </p>
                    <p class="text-center"><a href="{{ route('subscribe','free') }}">START YOUR FREE TRIAL</a></p>
                    <p class="text-center">
                        <small>Free trial available for new and eligible returning subscribers only</small>
                    </p>
                    <h5 class="text-center mt-2">
                        <a href="#trends" class=""><i class="fa fa-arrow-circle-down"></i></a>
                    </h5>

                </div>
            </div>


        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>
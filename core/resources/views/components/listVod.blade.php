<div class='mt-100' id="vids pad">
    <div class="container">
        <div class="row">
            @foreach($listVods->result->items as $vid)
                <div class="col-md-6 col-sm-12 mb-5 text-center smooth iframe-wrapper">
                    {!! $vid->playerCode !!}
                    <p class="text-gray">{!! $vid->description !!}</p>
                </div>
            @endforeach




        </div>
    </div>

    {{--<i class="fa fa-building"></i>--}}

</div>



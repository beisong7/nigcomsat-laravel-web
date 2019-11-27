<div class='mt-100' id="vids pad">
    <div class="container">
        <div class="row">
            @foreach($listVods->result->items as $vid)

                @guest('client')
                    {{--@if($vid->price===0)--}}
                        {{--<div class="col-md-6 col-sm-12 mb-5 text-center smooth iframe-wrapper">--}}
                            {{--{!! $vid->playerCode !!}--}}
                            {{--<p class="text-gray">{!! $vid->description !!}</p>--}}
                        {{--</div>--}}
                    {{--@endif--}}
                    <div class="col-md-6 col-sm-12 mb-5 text-center smooth iframe-wrapper">
                        {!! $vid->playerCode !!}
                        <p class="text-gray">{!! $vid->description !!}</p>
                    </div>
                @endguest

                @auth('client')
                    @if($client->hasAccess())
                        <div class="col-md-6 col-sm-12 mb-5 text-center smooth iframe-wrapper">
                            {!! $vid->playerCode !!}
                            <p class="text-gray">{!! $vid->description !!}</p>
                        </div>
                    @else
                        @if($vid->price===0)
                            <div class="col-md-6 col-sm-12 mb-5 text-center smooth iframe-wrapper">
                                {!! $vid->playerCode !!}
                                <p class="text-gray">{!! $vid->description !!}</p>
                            </div>
                        @endif
                    @endif
                @endauth


            @endforeach




        </div>
    </div>

    {{--<i class="fa fa-building"></i>--}}

</div>



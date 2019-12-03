@extends('layouts.mainapp')

@section('content')

    @include('components.planv2')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="pt-5 pb-5">
                        <form action="{{ route('pay') }}" method="post">
                            @csrf

                            <input type="hidden" name="tranId" value="{{ time() }}">
                            <input type="hidden" name="amount" value="100000"> {{-- required in kobo --}}
                            <input class="form-control" type="email" name="email" value="" required placeholder="Email"> {{-- required --}}
                            <input type="hidden" name="reference" value="{{ \Unicodeveloper\Paystack\Facades\Paystack::genTranxRef() }}"> {{-- required --}}
                            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                            <br>
                            <button type="submit" class="btn btn-outline-info btn-block">Test Payment</button>
                        </form>
                    </div>
                </div>
                <div class="col-6">

                </div>
            </div>

        </div>
    </section>
    @include('components.footer')
@endsection

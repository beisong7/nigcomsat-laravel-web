<section>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="pt-5 pb-5">
                    @if(!empty(@$pay_success))
                        <input class="form-control" type="email" name="email" value="{{ @$email }}" disabled placeholder="Email"> {{-- required --}}
                    @else
                        <form action="{{ route('pay') }}" method="post">
                            @csrf
                            <input type="hidden" name="tranId" value="{{ time() }}">
                            <input type="hidden" name="amount" value="100000"> {{-- required in kobo --}}
                            <input class="form-control" type="email" name="email" value="{{  @$email }}" required placeholder="Email"> {{-- required --}}
                            <input type="hidden" name="reference" value="{{ \Unicodeveloper\Paystack\Facades\Paystack::genTranxRef() }}"> {{-- required --}}
                            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                            <br>
                            <button type="submit" class="btn btn-outline-info btn-block">Test Payment</button>
                        </form>
                    @endif

                </div>
            </div>
            <div class="col-6">
                <div class="pt-5 pb-5">
                    @if(!empty(@$msg))
                        <h3 class="text-muted">{{ @$msg }}</h3>
                    @endif
                </div>

            </div>
        </div>

    </div>
</section>
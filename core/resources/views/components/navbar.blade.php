<nav class="navbar navbar-expand-lg navbar-light bg-light loggedin-nav fixed-top shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <span class="strong">NIPTV</span>
            {{--<img src="{{ url('img/logo/nigcom-logo.png') }}" alt=""/>--}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="toggle navigation">
            <span class="btn navbar-toggler-icon "></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('channels') }}">Channels</a>
                </li>
                @guest('client')
                    @guest('web')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home')."#plan" }}">Plans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('subscribe', 'free') }}">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                    </li>
                    @endguest
                @endguest

                @auth('client')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('client.dashboard') }}"> <i class="fa fa-user-circle"></i> {{ $client->names }}</a>

                    </li>
                @endauth

                @auth('web')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}"> <i class="fa fa-user-circle"></i> {{ $admin->names() }}</a>
                </li>
                @endauth


            </ul>
        </div>
    </div>
</nav>
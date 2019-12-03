<aside class="col-2 px-0 fixed-top sidebar" id="left">

    <div class="list-group w-100 in-side-nav">
        <a href="#" class="list-group-item" style="height: 57px"></a>
        <a href="{{ route('client.dashboard') }}" class="list-group-item {{ @$navactive['latest'] }}"><i class="fa fa-fire mr-2"></i> Latest</a>
        <a href="{{ route('client.subscription') }}" class="list-group-item {{ @$navactive['subs'] }}"><i class="fa fa-play mr-2"></i> My Subscription</a>
        <a href="#" class="list-group-item {{ @$navactive['live'] }}"><i class="fa fa-video mr-2"></i> Live</a>
        <a href="#" class="list-group-item {{ @$navactive['favourite'] }}"><i class="fa fa-heart mr-2"></i> Favourites</a>
        <a href="#" class="list-group-item {{ @$navactive['settings'] }}"><i class="fa fa-cogs mr-2"></i> Settings</a>
        <a href="#" class="list-group-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off mr-2"></i> Logout
            <form id="logout-form" action="{{ route('logout', 'client') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </a>

    </div>

</aside>
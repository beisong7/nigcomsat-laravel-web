<aside class="col-2 px-0 fixed-top sidebar" id="left">

    <div class="list-group w-100 in-side-nav">
        <a href="#" class="list-group-item" style="height: 57px"></a>
        <a href="{{ route('admin.dashboard') }}" class="list-group-item {{ @$navactive['dashboard'] }}"><i class="fa fa-fire mr-2"></i> Dashboard</a>
        <a href="{{ route('clients.index') }}" class="list-group-item {{ @$navactive['clients'] }}"><i class="fa fa-users mr-2"></i>Clients</a>
        <a href="{{ route('sub.index') }}" class="list-group-item {{ @$navactive['subs'] }}"><i class="fa fa-play mr-2"></i>Subscription</a>
        <a href="{{ route('plan.index') }}" class="list-group-item {{ @$navactive['plans'] }}"><i class="fa fa-clipboard-list mr-2"></i>Plans</a>
        <a href="{{ route('payment.index') }}" class="list-group-item {{ @$navactive['pays'] }}"><i class="fa fa-dollar-sign mr-2"></i>Payments</a>
        <a href="#" class="list-group-item {{ @$navactive['live'] }}"><i class="fa fa-video mr-2"></i> Live</a>
        <a href="#" class="list-group-item {{ @$navactive['settings'] }}"><i class="fa fa-cogs mr-2"></i> Settings</a>
        <a href="#" class="list-group-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off mr-2"></i> Logout
            <form id="logout-form" action="{{ route('logout', 'admin') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </a>

    </div>

</aside>
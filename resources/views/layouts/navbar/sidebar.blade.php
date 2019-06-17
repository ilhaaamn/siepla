<div class="bg-primary navbar-dark border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>

    <div class="list-group" style="width: 100%">
        <a href="dashboard" class="list-group-item list-group-item-action  @if(\Illuminate\Support\Facades\Request::is('dashboard'))
                list-group-item-light @else bg-info text-white @endif" style="border: none">Dashboard</a>
        <a href="shipping" class="list-group-item list-group-item-action  @if(\Illuminate\Support\Facades\Request::is('shipping'))
                list-group-item-light @else bg-info text-white @endif" style="border: none">Shipping</a>
        <a href="retail" class="list-group-item list-group-item-action  @if(\Illuminate\Support\Facades\Request::is('retail'))
                list-group-item-light @else bg-info text-white @endif" style="border: none">Retail</a>
        <a href="dealer" class="list-group-item list-group-item-action  @if(\Illuminate\Support\Facades\Request::is('dealer'))
                list-group-item-light @else bg-info text-white @endif" style="border: none">Dealer</a>
        <a href="sreport" class="list-group-item list-group-item-action  @if(\Illuminate\Support\Facades\Request::is('sreport'))
                list-group-item-light @else bg-info text-white @endif" style="border: none">Sales Visit</a>
    </div>
</div>
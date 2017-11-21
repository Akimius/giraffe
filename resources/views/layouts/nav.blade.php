

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Home</a></li>

                @if(Auth::user())
                    <li class="active">
                        <a href="{{ url('/ads/create') }}">Create Ad</a>
                    </li>
                @endif

            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::user())
                <li>
                    <a href="{{ url('/login') }}"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}}</a>
                </li>
                    <li>
                        <a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
                    </li>
                @endif
                    @if(!Auth::user())
                        <li>
                            <a href="{{ url('/login') }}"><span class="glyphicon glyphicon-user"></span> Login/Register </a>
                        </li>
                    @endif
            </ul>
        </div>
    </div>
</nav>

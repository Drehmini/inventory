<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{ Html::style('css/bootstrap.min.css') }}
        {{ Html::style('css/dataTables.bootstrap.css') }}
        {{ Html::style('css/inven.css') }}
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data="collapse"
                            data-target="#bs-header-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {{ Html::linkRoute('inventory.index', 'Inventory', [], ['class' => 'navbar-brand']) }}
                </div>
                <div class="collapse navbar-collapse" id="bs-header-navbar-collapse-1">
                    @if(!Auth::guest())
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Inventory <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>{{ Html::linkRoute('inventory.index', 'View') }}</li>
                                <li>{{ Html::linkRoute('inventory.create', 'Add Item') }}</li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">People <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>{{ Html::linkroute('person.index', 'View') }}</li>
                                <li>{{ Html::linkroute('person.create', 'Add Person') }}</li>
                            </ul>
                        </li>
                        <li>{{ Html::linkRoute('inventory.transactions.index', 'Transactions') }}</li>
                    </ul>
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            @include('errors.list');
            @yield('content')
        </div>
    {{ Html::script('js/jquery-1.11.3.min.js') }}
    {{ Html::script('js/bootstrap.min.js') }}
    {{ Html::script('js/bootbox.min.js') }}
    {{ Html::script('js/jquery.dataTables.min.js') }}
    {{ Html::script('js/dataTables.bootstrap.js') }}
    {{ Html::script('js/inven.js') }}
    </body>
</html>
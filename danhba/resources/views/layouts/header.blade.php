<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{url('/')}}">Danhba</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{url('/')}}">Home</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Lọc<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    @foreach($cates as $cate)
                    <li><a href="{{route('locdanhba', $cate->id)}}">{{$cate->name_cat}}</a></li>
                    @endforeach
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="login.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="register.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>
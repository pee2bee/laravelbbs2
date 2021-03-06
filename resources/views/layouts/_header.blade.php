
<nav class="navbar navbar-expand-md navbar-dark  bg-dark mb-5">
  <a class="navbar-brand" href="/">{{ config('app.name') }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{active_class(if_route('home'))}}">
        <a class="nav-link" href="/">首页<span class="sr-only">(current)</span></a>
      </li>
      @foreach(\App\Models\Category::all() as $category)
      <li class="nav-item">
        <a class="nav-link {{ active_class(if_route('categories.show') && if_route_param('category',$category->id)) }}" href="{{ route('categories.show',$category->id) }}">{{ $category->name }}</a>
      </li>
      @endforeach

    </ul>

    <ul class="navbar-nav navbar-right">

      <!-- Authentication Links -->
      @if( !Auth::check())

        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
      @else
        <li class="nav-item"><a href="{{ route('notifications.index') }}" class="nav-link">未读信息 * {{ Auth::user()->unreadNotifications()->count() }}</a></li>
        <div class="dropdown ">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

            <a class="nav-link text-dark" href="{{ route('users.show',Auth::user()->id) }}" >个人中心</a>
            <a class="nav-link text-dark" href="{{ route('users.edit',Auth::user()->id) }}" >修改资料</a>
            @can('manage_contents')
            <a class="nav-link text-dark" href="{{ route('admin_dashboard') }}" >管理后台</a>
            @endcan
            <form action="{{ route('logout') }}" method="POST">
              {{ csrf_field() }}
              <button class="dropdown-item" type="submit" >注销</button>
            </form>

          </div>
        </div>
      @endif
    </ul>
  </div>
</nav>


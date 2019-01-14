
<div class="container" id="nav_container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">

      </div>
      <div class="col-4 text-center">
        <h1><a class="blog-header-logo text-light header-anchor" href="/">Friendsbook</a></h1>
      </div>

      <div class="col-4 d-flex justify-content-end align-items-center">

        {{--<a class="text-muted" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
        </a>
        <a class="btn btn-sm btn-outline-secondary" href="/register">Sign up</a>--}}
        @if(Auth::check())
          <a class="nav-link ml-auto auth-username" href="#">{{ Auth::user()->name }}</a>
        @endif

        @if(!Auth::check())
          <a class="btn btn-sm btn-outline-secondary" href="/register">Sign up</a>
          <a class="btn btn-sm btn-outline-secondary" href="/login">Log in</a>
        @else
          <a class="btn btn-sm btn-outline-secondary" href="/logout">Log Out</a>
        @endif
      </div>

    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      @if (Auth::check())
      <a class="p-2 text-light" href="photos/index">Photos</a>
      <a class="p-2 text-light" href="/findfriends">Find Friends</a>
      <a class="p-2 text-light" href="{{url('/requests')}}">Requests (
        {{App\Friendship::where('f_status', 0)->where('f_receiver', Auth::user()->id)->count() }}
        )</a>
      <a class="p-2 text-light" href="/friends">Friends</a>
      <a class="p-2 text-light" href="/profile">Profile</a>
      @endif
      <a class="p-2 text-light" href="#">Opinion</a>
      <a class="p-2 text-light" href="#">Science</a>
      <a class="p-2 text-light" href="#">Health</a>
      <a class="p-2 text-light" href="#">Style</a>
      <a class="p-2 text-light" href="#">Travel</a>
    </nav>

  </div>
</div>
@extends ('layouts.master')

@section ('content')

  <main role="main" class="container">


    <div class="row">
      <div class="col-md-8 blog-main">

      </div>
    </div>

    <div class="row">
      <div class="col-md-8 blog-main">
        <p class="addfriend-h">Your friends are:</p>
      </div><!-- /.blog-main -->
    </div><!-- /.row -->

    <div class="row">
      @if( session()->get('msg') )
        <p class="alert alert-success ">
          {{ session()->get('msg') }}
        </p>
      @endif

      @foreach($friends as $usersList)
        <div class="col-md-8 blog-main add-friend">
          <h4 class="addfriend-h">{{ $usersList->name }}  {{ $usersList->surname }}</h4>
          <p>

            <a href="{{url('/remove')}}/{{$usersList->id}}" class="btn btn-default addfriend-btn">Unfriend</a>
          </p>
        </div>
      @endforeach
    </div>

    <aside class="col-md-4 blog-sidebar">
      @include ('layouts.sidebar')
    </aside><!-- /.blog-sidebar -->
    </div>
  </main><!-- /.container -->

@endsection
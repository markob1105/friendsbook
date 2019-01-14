@extends ('layouts.master')

@section ('content')

<main role="main" class="container">


    <div class="row">
        <div class="col-md-8 blog-main">

        </div>
    </div>

    <div class="row">
        <div class="col-md-8 blog-main">

        </div><!-- /.blog-main -->
    </div><!-- /.row -->

    <div class="row">
      @foreach($allUsers as $usersList)
        <div class="col-md-8 blog-main add-friend">
            <h4 class="addfriend-h">{{ $usersList->name }}  {{ $usersList->surname }}</h4>
            <?php
            $check = DB::table('friendships')
            ->where('f_receiver', '=', $usersList->id)
            ->where('f_sender', '=', Auth::user()->id)
            ->where('f_status', '!==', 1)
            ->first();

            if($check ==' '){
            ?>
            <p><a href="{{ url('/') }}/addfriend/{{ $usersList->id }}" class="btn btn-info addfriend-btn">Add Friend</a></p>
            <?php } else {?>
            <p class="addfriend-btn client">Request Already Sent</p>
            <?php } ?>
        </div>
      @endforeach
    </div>

        <aside class="col-md-4 blog-sidebar">
            @include ('layouts.sidebar')
        </aside><!-- /.blog-sidebar -->
    </div>
</main><!-- /.container -->

@endsection
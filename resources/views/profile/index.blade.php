@extends ('layouts.master')

@section ('content')

  <main role="main" class="container">


    <div class="col-md-8 blog-main">
      <h4 class="addfriend-h"> Name: <h4 class="client"> {{ Auth::user()->name }} </h4></h4>
      <h4 class="addfriend-h"> Surname: <h4 class="client"> {{ Auth::user()->surname }}</h4></h4> <br>
       Email:  <p class="client">{{ Auth::user()->email }}</p>
       Birth date: <p class="client">{{ Auth::user()->birth_date }}</p>
    </div>




      {{--<img src="/upload/medium/1532686287bottomup-can-NEW-2.png" alt="">--}}


      <aside class="col-md-4 blog-sidebar">
        @include ('layouts.sidebar')
      </aside><!-- /.blog-sidebar -->



  </main><!-- /.container -->

@endsection


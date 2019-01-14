@extends ('layouts.master')

@section ('content')

  <main role="main" class="container">


    <div class="row">
      <div class="col-md-8 blog-main">

        <div class="col-sm-8 blog-main">

          {{--{{ $status->body }}--}}

            @include ('posts.post')

        </div>




      </div><!-- /.blog-main -->
<aside class="col-md-4 blog-sidebar">
  @include ('layouts.sidebar')
</aside><!-- /.blog-sidebar -->

</div><!-- /.row -->

</main><!-- /.container -->

@endsection

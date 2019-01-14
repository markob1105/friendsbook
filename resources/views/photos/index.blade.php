@extends ('layouts.master')

@section ('content')

  <main role="main" class="container">





        {{--<div class="col-sm-8 blog-main">
          @foreach ($posts as $status)
            @include ('posts.status')
          @endforeach--}}

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
          </nav>
        </div>

      </div><!-- /.blog-main -->
      <aside class="col-md-4 blog-sidebar">
        @include ('layouts.sidebar')
      </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

  </main><!-- /.container -->

@endsection


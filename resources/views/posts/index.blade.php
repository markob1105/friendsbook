@extends ('layouts.master')

@section ('content')

  <main role="main" class="container">


    <div class="row">
      <div class="col-md-8 blog-main">
        <form method="POST" action="/photos" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{--<div class="form-group">
            <label for="title"></label>
            <textarea id="title" name="title" class="form-control" placeholder="Write Yours Photography Title"></textarea>
          </div>--}}
          <div class="form-group">
            <label for="file">Post Image</label>
            <input class="choose-file" type="file" name="file"> </input>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <input type="description" class="form-control" id="description" name="description">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-timeline">Publish Image</button>
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 blog-main">
        <form method="POST" action="/posts">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="body"></label>
            <textarea id="body" name="body" placeholder="Publish Your Status"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-timeline">Publish</button>
          </div>
        </form>
      </div><!-- /.blog-main -->
    </div><!-- /.row -->

    <div class="row">
      {{--<img src="/upload/medium/1532686287bottomup-can-NEW-2.png" alt="">--}}
      <div class="col-md-8 blog-main">
        @foreach ($posts as $post)
          @include ('posts.post')
        @endforeach

        <nav class="blog-pagination">
          <a class="btn btn-outline-primary" href="#">Older</a>
          <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
        </nav>

      </div>

      <aside class="col-md-4 blog-sidebar">
        @include ('layouts.sidebar')
      </aside><!-- /.blog-sidebar -->
    </div>


  </main><!-- /.container -->

@endsection


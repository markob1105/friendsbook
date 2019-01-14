<div class="blog-post">
    <div href="/posts/{{ $post->id }}">

      <h4 id="user-name-and-surname"><a href="#">{{ $post->user->name }}  {{ $post->user->surname }}</a></h4>

      {{--{{ $post->status->body }}--}}
      @if($post->post_type_id == 1)
        <h3 class="blog-post-title blog-post-status">{{ $post->status->body }}</h3>
        <p class="blog-post-meta blog-post-time">on {{ $post->created_at->toRfc850String() }}</p>
      @else($post->post_type_id == 2)
        <div class="picture">
          <p class="blog-post-meta blog-post-time">on  {{ $post->created_at->toRfc850String() }}</p>
          <table>
            <tr>
              <td><h4 id="image-description">{{ $post->photo->description }}</h4></td>
            </tr>
            <tr>
              <td><img class="medium-image" src="{{ $post->photo->medium }}" alt=""h4 class="picture-description"></td>
            </tr>
          </table>
        </div>
      @endif

    </div>

  {{--<hr>--}}

  <div class="row like-icon">
    {{--<p class="pull-right"><a href=""><span class="glyphicon glyph-thumbs-up"></span> Like</a></p>--}}
    <div class="d-flex flex-wrap-reverse">
      <p><a class="like" href="#"><i class="fa fa-thumbs-up"></i> Like</a></p>
    </div>

  </div>

<hr>
      <div class="align-content-center">
        <p> Likes: 10 </p>
      </div>






    <!-- comments -->
  <div class="comments">
    <p class="blog-post-meta">Comments:</p>
    <ul Class="list-group">
      @foreach ($post->comments as $comment)
        <li class="list-group-item comment-item">
          <strong>{{ $comment->created_at->diffForHumans() }}: &nbsp; </strong>
          {{ $comment->body }} <br>
          by <a href="">{{ $comment->user->name }} {{ $comment->user->surname }}</a>
        </li>
      @endforeach
    </ul>

  </div>


  <div class="comments">
    <div class="">
      <form method="POST" action="/posts/{{ $post->id }}/comments">
        {{ csrf_field() }}
        <div class ="form-group">
            <textarea name="body" placeholder="Your comment here." class="form-control"></textarea>
        </div>
        {{--<div class ="form-group">--}}
          <button type="submit" class="btn btn-primary btn-timeline">Add Comment</button>
        {{--</div>--}}
      </form>
    </div>
  </div>
<hr>

  <script>

    $(document).ready(function(){
      $('.like').click(function(){
        console.log("IT WORKS")
      });
    });

  </script>

</div><!-- /.blog-post -->
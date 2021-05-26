<section class="section">
  <div class="card">
      <div class="card-body">
          <div style="text-align: right;" class="mb-4">
            <a href="{{ route('createPost') }}" class="btn btn-warning">Add Post</a>
          </div>
          <table class="table table-striped" id="posts_table">
              <thead>
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th></th>
                    </tr>
              </thead>
              <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td style="text-align: right">
                            <a href="{{ route('editPost', ['post_id' => $post->id]) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('deletePost', ['post_id' => $post->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
      </div>
  </div>

</section>

<script>

    let posts_table = document.querySelector('#posts_table');
    let dataTable = new simpleDatatables.DataTable(posts_table);

</script>
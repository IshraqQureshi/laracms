<section class="section">
  <div class="card">
      <div class="card-body">
          <div style="text-align: right;" class="mb-4">
            <a href="{{ route('createPage') }}" class="btn btn-warning">Add Page</a>
          </div>
          <table class="table table-striped" id="pages_table">
              <thead>
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th></th>
                    </tr>
              </thead>
              <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td style="text-align: right">
                            <a href="{{ route('editPage', ['page_id' => $page->id]) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('deletePage', ['page_id' => $page->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
      </div>
  </div>

</section>

<script>

    let pages_table = document.querySelector('#pages_table');
    let dataTable = new simpleDatatables.DataTable(pages_table);

</script>
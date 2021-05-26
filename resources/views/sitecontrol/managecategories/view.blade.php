<section class="section">
  <div class="card">
      <div class="card-body">
          <div style="text-align: right;" class="mb-4">
            <a href="{{ route('createCategory') }}" class="btn btn-warning">Add Category</a>
          </div>
          <table class="table table-striped" id="categories_table">
              <thead>
                    <tr>
                        <th>Name</th>
                        <th>Created At</th>
                        <th></th>
                    </tr>
              </thead>
              <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ date('d M, Y', strtotime($category->created_at)) }}</td>
                        <td style="text-align: right">
                            <a href="{{ route('editCategory', ['category_id' => $category->id]) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('deleteCategory', ['category_id' => $category->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
      </div>
  </div>

</section>

<script>

    let categories_table = document.querySelector('#categories_table');
    let dataTable = new simpleDatatables.DataTable(categories_table);

</script>
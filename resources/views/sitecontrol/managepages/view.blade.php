<section class="section">
  <div class="card">
      <div class="card-body">
          <table class="table table-striped" id="pages_table">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>City</th>
                      <th>Status</th>
                  </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Graiden</td>
                  <td>vehicula.aliquet@semconsequat.co.uk</td>
                  <td>076 4820 8838</td>
                  <td>Offenburg</td>
                  <td>
                      <span class="badge bg-success">Active</span>
                  </td>
              </tr>
              </tbody>
          </table>
      </div>
  </div>

</section>

<script>

    let pages_table = document.querySelector('#pages_table');
    let dataTable = new simpleDatatables.DataTable(pages_table);

</script>
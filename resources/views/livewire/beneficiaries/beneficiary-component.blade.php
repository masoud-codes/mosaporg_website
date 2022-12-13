
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
          <h5 class="card-header">Beneficiaries
              <a href="{{ route('beneficiary.create') }}" class=" btn btn-primary btn-sm bx-pull-right">Add Beneficiary</a>
          </h5>
          <div class="card-body">
            <div class="table-responsive text-nowrap">
              @if(Session::has('msg'))
              <p class="alert alert-info">{{ Session::get('msg') }}</p>
              @endif
              <table class="table" id="table">
                <thead class="table-light">
                  <tr>
                    <th>Name</th>
                    <th>Date created</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                  @if($beneficiaries)
                    @foreach ($beneficiaries as $items)
                    <tr>
                      <td>{{ $items['beneficiary_name'] }}</td>
                      <td>{{ \Carbon\Carbon::parse($items['created_at'])->format('d-m-Y') }}</td>
                      <td>
                        <button class="btn btn-sm btn-danger">Edit</button>
                        <button class="btn btn-sm btn-primary">Show</button>
                      </td>
                    </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

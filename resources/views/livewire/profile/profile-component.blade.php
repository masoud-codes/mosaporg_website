
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <h5 class="card-header">Profile information
            <a href="{{ route('profile.create') }}" class=" btn btn-primary btn-sm bx-pull-right">Feed info</a>
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
                  <th>Reg No.</th>
                  <th>Date established</th>
                  <th>Organisation Type</th>
                  <th>Motto</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @if($org_data)
                  @foreach ($org_data as $items)
                  <tr>
                    <td>{{ $items['org_name'] }}</td>
                    <td>{{ $items['registration_no'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($items['date_established'])->format('d-m-Y') }}</td>
                    <td>{{ $items['type'] }}</td>
                    <td>{{ $items['motto'] }}</td>
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

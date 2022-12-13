
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
      <div class="col-lg-12 mb-4 order-0">
        <div class="card">
          <h5 class="card-header">Beneficiary creation
          </h5>
          <div class="card-body">
            <form wire:submit.prevent='submit' method="POST">
                @csrf
                  <div class="row mb-3">
                      <div class="col-md-12 col-sm-12">
                          <label class="col-form-label" for="basic-default-name">Beneficiary Name</label>
                          <input wire:model.lazy='beneficiary_name' type="text" class="form-control @error('beneficiary_name') is-invalid

                          @enderror" id="basic-default-name" placeholder="Enter Beneficiary name" />

                          @error('beneficiary_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                  </div>

                <div class="row mb-3">

                  <div class="col-sm-12 col-md-12">

                    <label class="col-form-label" for="basic-default-message">Description</label>
                    <textarea wire:model.lazy='beneficiary_desc'
                      id="basic-default-message"
                      class="form-control @error('beneficiary_desc') is-invalid
                      @enderror" placeholder="Enter Beneficiary description"></textarea>

                    @error('beneficiary_desc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="row justify-content-end">
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
</div>

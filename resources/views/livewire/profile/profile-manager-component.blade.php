<div>
  <form wire:submit.prevent='submit' method="POST">
    @csrf
      <div class="row mb-3">
          <div class="col-md-6 col-sm-6">
              <label class="col-form-label" for="basic-default-name">Name</label>
              <input wire:model.lazy='org_name' type="text" class="form-control @error('org_name') is-invalid

              @enderror" id="basic-default-name" placeholder="Enter organisation name" />

              @error('org_name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>

          <div class="col-md-6 col-sm-6">
              <label class="col-form-label" for="basic-default-company">Registered date</label>

              <input wire:model.lazy='date_established' type="date" class="form-control @error('date_established') is-invalid

              @enderror" id="basic-default-company" placeholder="Date of registration"
              />
              @error('date_established')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
          </div>
      </div>

    <div class="row mb-3">
      <div class="col-md-6 col-sm-6">
          <label class="col-form-label">Organisation type</label>
          <select wire:model.lazy='org_type' class="form-control @error('org_type') is-invalid

          @enderror">
              <option value="" selected>Choose type</option>
              @foreach ($types_data as $items)
              <option value="{{ $items['id'] }}">{{ $items['name'] }}</option>
              @endforeach
          </select>

          @error('org_type')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      </div>

      <div class="col-md-6 col-sm-6">
          <label class="col-form-label">motto</label>

          <input wire:model.lazy='motto' type="text" class="form-control @error('motto') is-invalid

          @enderror" placeholder="Enter organisation motto">

          @error('motto')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
    </div>

    <div class="row mb-3">
      <div class="col-md-6 col-sm-6">
          <label class="col-form-label">Vission</label>
          <input wire:model.lazy='vission' type="text" class="form-control @error('vission') is-invalid

          @enderror" placeholder="Enter organisation Vission">

          @error('vission')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

      <div class="col-md-6 col-sm-6">
          <label class="col-form-label">Mission</label>
          <input wire:model.lazy='mission' type="text" class="form-control @error('mission') is-invalid

          @enderror" placeholder="Enter organisation Mission">

          @error('mission')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
    </div>

    <div class="row mb-3">

      <div class="col-md-6 col-sm-6">
        <label for="" class="col-form-label">Registration No.</label>

        <input wire:model.lazy='registration_no' type="text" class="form-control @error('registration_no') is-invalid

        @enderror" placeholder="Enter registration No.">

        @error('registration_no')
            <span class="invalid-feedback" role="alert">
              {{ $message }}
            </span>
        @enderror
      </div>

      <div class="col-sm-6 col-md-6">

        <label class="col-form-label" for="basic-default-message">Description</label>
        <textarea wire:model.lazy='org_desc'
          id="basic-default-message"
          class="form-control @error('org_desc') is-invalid
          @enderror" placeholder="Enter organisation description"></textarea>

        @error('org_desc')
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

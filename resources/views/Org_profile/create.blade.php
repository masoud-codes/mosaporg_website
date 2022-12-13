@extends('layouts.app')

@section('main')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <h5 class="card-header">Profile creation
            <a href="{{ route('profile.index') }}" class=" btn btn-danger btn-sm bx-pull-right">Go Back</a>
        </h5>

          <div class="card-body">

            <livewire:profile.profile-manager-component />

          </div>
      </div>
    </div>
  </div>
</div>
@endsection

@extends('layouts.app')
@section('content')  
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Customor</h2>
        <p class="dashboard-subtitle">
            Create New Customor
        </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12">
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          
          <form action="{{ route('customor-store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Role</label>
                      <input type="text" class="form-control" name="account_role" placeholder="account_role" value="customer" disabled required />
                    </div>
                  </div>

                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama depan</label>
                      <input type="text" class="form-control" name="first_name" required />
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama akhir</label>
                      <input type="text" class="form-control" name="last_name" required />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>email</label>
                      <input type="email" class="form-control" name="email" required />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>alamat</label>
                      <input type="text" class="form-control" name="alamat" required />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>pin</label>
                      <input type="number" class="form-control" name="pin" required />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>phone</label>
                      <input type="number" class="form-control" name="phone" required />
                    </div>
                  </div>
                  
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Foto</label>
                      <input type="file" class="form-control" name="photo" placeholder="Photo" required />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      Save Now
                    </button>
                    <a href="{{ route('home') }}"
                      type="submit"
                      class="btn btn-primary px-5"
                    >
                      kembali
                    </a>
                  </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('addon-script')
  <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor');
  </script>
@endpush
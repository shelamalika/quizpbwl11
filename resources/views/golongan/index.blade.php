@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">

    <style>
      body {
      
      background-color:#F5DEB3;
    }
    </style>

      <h5>Golongan</h5>
      <a href="{{ route('golongan.create') }}" class="btn btn-primary mb-3 float-end">Add Golongan</a>

      <table class="table table-hover table-striped table-bordered table-primary">
        <thead>
          <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col">Kode</th>
            <th scope="col">Nama</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; @endphp
          @foreach($golongans as $golongan)
          <tr>
            <th class="text-center">{{ $no++ }}</th>
            <td>{{ $golongan->kode }}</td>
            <td>{{ $golongan->nama }}</td>
            <td class="text-center">
              <a class="btn btn-warning btn-sm" href="{{ route('golongan.edit', $golongan->id) }}">Edit</a></td>
              <td class="text-center">
              <a class="btn btn-danger btn-sm" href="#" data-id="{{ $golongan->id }}" onclick="delete_(`{{ route('golongan.delete', $golongan->id) }}`)">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@push('js')
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
  function delete_(url) {
    if (confirm('Are you sure?')) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': `{{ csrf_token() }}`
        }
      });

      $.ajax({
        type: "DELETE",
        url: url,
        success: function(result) {
          if (!result) {
            alert('Gagal menghapus data')
          }

          location.reload()
        }
      })
    }
  }
</script>
@endpush
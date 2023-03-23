@extends('backend.layout.master')
@section('page_title', 'Tag')
@section('page_sub_title', 'List')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mb-0"> Create List</h4>
                        </div>
                        <div class="col md-4 text-end">
                            <a href="{{ route('tag.create') }}"><button class="btn btn-primary">Create More
                                    Tag</button></a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-{{ session('cls') }}">

                            <strong>{!! session('msg') !!}</strong>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Create At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($tags as $tag)
                            <tbody>
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td>{{ $tag->order_by }}</td>
                                    <td>{{ $tag->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $tag->created_at->toDateTimeString() }}</td>
                                    <td>{{ $tag->created_at != $tag->updated_at ? $tag->updated_at->toDateTimeString() : 'Not Updated' }}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('tag.show', $tag->id) }}"><button
                                                    class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button></a>
                                            <a href="{{ route('tag.edit', $tag->id) }}"><button
                                                    class="btn btn-warning btn-sm mx-1"><i
                                                        class="fa-solid fa-edit"></i></button></a>
                                           
                                        <form action="{{ route('tag.destroy', $tag->id) }}" method="POST" class="delete">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger delete"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        </div>
                                    </td>

                                </tr>
                            </tbody>
                        @endforeach

                        <tfoot>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Create At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @push('customjs')
        <script>
            $('.delete').on('click', function() {
                let id = $(this).attr('data-id')

                Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    $('#deleteForm-'+id).submit();
  }
})
                

            })
        </script>
    @endpush
@endsection

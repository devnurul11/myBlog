@extends('backend.layout.master')
@section('page_title', 'Category')
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
                            <a href="{{ route('post.create') }}"><button class="btn btn-primary">Create New
                                    Post</button></a>
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
                        @foreach ($post as $post)
                            <tbody>
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td>{{ $post->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $post->created_at->toDateTimeString() }}</td>
                                    <td>{{ $post->created_at != $post->updated_at ? $post->updated_at->toDateTimeString() : 'Not Updated' }}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('post.show', $post->id) }}"><button
                                                    class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button></a>
                                            <a href="{{ route('post.edit', $post->id) }}"><button
                                                    class="btn btn-warning btn-sm mx-1"><i
                                                        class="fa-solid fa-edit"></i></button></a>
                                            
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="delete">
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

@extends('backend.layout.master')
@section('page_title', 'Post')
@section('page_sub_title', 'List')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 m-2">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-10">
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
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Status</th>
                                <th>Is Aprrove</th>
                                <th>Author</th>
                                <th>Create At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @php
                            $sl = 1;
                        @endphp
                        @foreach ($posts as $post)
                            <tbody>
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td class="image_size img-thumbnail"><img data-src="{{ url('image/post/original/'.$post->photo) }}" src="{{ url('image/post/thumbnail/'.$post->photo) }}" alt="{{ $post->title }}"> </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category?->name }}</td>
                                    <td>{{ $post->sub_category?->name }}</td>
                                    <td>{{ $post->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>{{ $post->is_approved == 1 ? 'Approved' : 'Not Approved' }}</td>
                                    <td>{{ $post->user?->name }}</td>
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
                                <th>Thumbnail</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Status</th>
                                <th>Is Aprrove</th>
                                <th>Author</th>
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
                
            $('.image_size').on('click', function() {
                let img = $(this).attr('src');
                console.log(img)
            })

        </script>
    @endpush
@endsection

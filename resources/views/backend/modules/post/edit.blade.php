@extends('backend.layout.master')
@section('page_title', 'Edit Post')
@section('page_sub_title', 'edit')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header ">
                    <h4 class="mb-0"> Edit Post</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    {!! Form::model($post,  ['method' => 'put', 'route'=> ['post.update', $post->id]]) !!}
                    @include('backend.modules.post.form')

                    {!! Form::button('Update Now', ['type' => 'submit', 'class' => 'btn btn-primary mt-3']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @push('customjs')
        <script>
            $('#title').on('input', function() {
                let name = $(this).val();
                let slug = name.replaceAll(' ', '-')
                $('#slug').val(slug.toLowerCase());
            });
        </script>
    @endpush

@endsection

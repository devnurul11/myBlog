@extends('backend.layout.master')
@section('page_title', 'Tag')
@section('page_sub_title', 'Create')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header ">
                    <h4 class="mb-0"> Create Tag</h4>
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
                    {!! Form::open(['method' => 'post', 'route' => 'tag.store']) !!}
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter tag name']) !!}
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter slug name']) !!}
                    {!! Form::label('order_by', 'Tag Serial') !!}
                    {!! Form::number('order_by', null, ['class' => 'form-control', 'placeholder' => 'Enter Serial Number']) !!}
                    {!! Form::label('status', 'Tag Status') !!}
                    {!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, [
                        'class' => 'form-select',
                        'placeholder' => 'Enter slug name',
                    ]) !!}
                    {!! Form::button('Create Tag', ['type' => 'submit', 'class' => 'btn btn-primary mt-3']) !!}

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @push('customjs')
        <script>
            $('#name').on('input', function() {
                let name = $(this).val();
                let slug = name.replaceAll(' ', '-')
                $('#slug').val(slug.toLowerCase());
            });
        </script>
    @endpush

@endsection

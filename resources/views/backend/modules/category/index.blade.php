@extends('backend.layout.master')
@section('page_title', 'Category')
@section('page_sub_title', 'List')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mb-0"> Create List</h4>
                        </div>
                        <div class="col md-4">
                            <a href="{{ route('category.create') }}"><button class="btn btn-primary">Create More Category</button></a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover table-active">
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
                            $sl =1
                        @endphp
                        @foreach ($categories as $category)
                            
                        <tbody>
                           <tr>
                            <td>{{ $sl++ }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->order_by }}</td>
                            <td>{{ $category->status==1? 'Active':'Inactive'}}</td>
                            <td>{{ $category->created_at->toDateTimeString() }}</td>
                            <td>{{ $category->created_at != $category->updated_at ?$category->updated_at->toDateTimeString(): 'Not Updated'}}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('category.show' , $category->id) }}"><button class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></button></a>
                                    <a href="{{ route('category.edit' , $category->id) }}"><button class="btn btn-warning btn-sm mx-1"><i class="fa-solid fa-edit"></i></button></a>
                                    {!! Form::open(['method'=>'delete', 'route'=>['category.destroy', $category->id]]) !!}
                                    {!! Form::button('<i class="fa-solid fa-edit"></i>', ['class'=> 'btn btn-danger btn-sm', 'type' =>'submit']) !!}
                                    {!! Form::close() !!}
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
@endsection

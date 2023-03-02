@extends('backend.layout.master')
@section('page_title', 'Category Details')
@section('page_sub_title', '')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mb-0"> Category Details</h4>
                        </div>
                        <div class="col md-4 text-end">
                            <a href="{{ route('category.index') }}"><button class="btn btn-primary">Back ot Category</button></a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td>Category ID</td>
                                <td>{{ $category->id }}</td>
                            </tr>
                            <tr>
                                <td>Category Name</td>
                                <td>{{ $category->name }}</td>
                            </tr>
                            <tr>
                                <td>Category Slug</td>
                                <td>{{ $category->slug }}</td>
                            </tr>
                            <tr>
                                <td>Category Status</td>
                                <td>{{ $category->status==1? 'Active':'Inactive'}}</td>
                            </tr>
                            <tr>
                                <td>Category Order By</td>
                                <td>{{ $category->order_by }}</td>
                            </tr>
                            <tr>
                                <td>Category Created at</td>
                                <td>{{ $category->created_at->toDateTimeString() }}</td>
                            </tr>
                            <tr>
                                <td>Category Updated at</td>
                                <td>{{ $category->created_at != $category->updated_at ?$category->updated_at->toDateTimeString(): 'Not Updated'}}</td>
                            </tr>
                        </tbody>

                       
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

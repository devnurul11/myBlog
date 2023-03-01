@extends('backend.layout.master')
@section('page_title', 'Sub Category Details')
@section('page_sub_title', '')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mb-0"> Sub Category Details</h4>
                        </div>
                        <div class="col md-4 text-end">
                            <a href="{{ route('category.index') }}"><button class="btn btn-primary">Back ot Sub Category</button></a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td>Sub Category ID</td>
                                <td>{{ $subCategory->id }}</td>
                            </tr>
                            <tr>
                                <td>Sub Category Name</td>
                                <td>{{ $subCategory->name }}</td>
                            </tr>
                            <tr>
                                <td>Mother Category Name</td>
                                <td>{{ $subCategory->category->name }}</td>
                            </tr>
                            <tr>
                                <td>Sub Category Slug</td>
                                <td>{{ $subCategory->slug }}</td>
                            </tr>
                            <tr>
                                <td>Sub Category Status</td>
                                <td>{{ $subCategory->status==1? 'Active':'Inactive'}}</td>
                            </tr>
                            <tr>
                                <td>Sub Category Order By</td>
                                <td>{{ $subCategory->order_by }}</td>
                            </tr>
                            <tr>
                                <td>Sub Category Created at</td>
                                <td>{{ $subCategory->created_at->toDateTimeString() }}</td>
                            </tr>
                            <tr>
                                <td>Sub Category Updated at</td>
                                <td>{{ $subCategory->created_at != $subCategory->updated_at ?$subCategory->updated_at->toDateTimeString(): 'Not Updated'}}</td>
                            </tr>
                        </tbody>

                       
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

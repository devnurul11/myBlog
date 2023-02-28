@extends('backend.layout.master')
@section('page_title', 'Tag Details')
@section('page_sub_title', '')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mb-0"> Tag Details</h4>
                        </div>
                        <div class="col md-4 text-end">
                            <a href="{{ route('tag.index') }}"><button class="btn btn-primary">Back ot Tag</button></a>
                        </div>
                    </div>
                    
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td>Tag ID</td>
                                <td>{{ $tag->id }}</td>
                            </tr>
                            <tr>
                                <td>Tag Name</td>
                                <td>{{ $tag->name }}</td>
                            </tr>
                            <tr>
                                <td>Tag Slug</td>
                                <td>{{ $tag->slug }}</td>
                            </tr>
                            <tr>
                                <td>Tag Status</td>
                                <td>{{ $tag->status==1? 'Active':'Inactive'}}</td>
                            </tr>
                            <tr>
                                <td>Tag Order By</td>
                                <td>{{ $tag->order_by }}</td>
                            </tr>
                            <tr>
                                <td>Tag Created at</td>
                                <td>{{ $tag->created_at->toDateTimeString() }}</td>
                            </tr>
                            <tr>
                                <td>Tag Updated at</td>
                                <td>{{ $tag->created_at != $tag->updated_at ?$tag->updated_at->toDateTimeString(): 'Not Updated'}}</td>
                            </tr>
                        </tbody>

                       
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

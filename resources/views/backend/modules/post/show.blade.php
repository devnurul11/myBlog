@extends('backend.layout.master')
@section('page_title', 'Post Details')
@section('page_sub_title', '')

@section('content')
    <div class="row justify-content-center mx-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mb-0"> Post Details</h4>
                        </div>
                        <div class="col md-4 text-end">
                            <a href="{{ route('post.edit', $post->id) }}"><button class="btn btn-primary btn-sm"><i
                                class="fa-solid fa-edit"></i></button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Post ID</th>
                                <td>{{ $post->id }}</td>
                            </tr>
                            <tr>
                                <th>Post Name</th>
                                <td>{{ $post->title }}</td>
                            </tr>
                            <tr>
                                <th>Post Slug</th>
                                <td>{{ $post->slug }}</td>
                            </tr>
                            <tr>
                                <th>Post Status</th>
                                <td>{{ $post->status==1? 'Active':'Inactive'}}</td>
                            </tr>
                            <tr>
                                <th>Approved</th>
                                <td>{{ $post->is_approved==1? 'Yes':'No'}}</td>
                            </tr>
                            
                            
                            
                            <tr>
                                <th>Post Created at</th>
                                <td>{{ $post->created_at->toDateTimeString() }}</td>
                            </tr>
                            <tr>
                                <th>Post Updated at</th>
                                <td>{{ $post->created_at != $post->updated_at ?$post->updated_at->toDateTimeString(): 'Not Updated'}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>
                                    @php
                                       $longParagraph = $post->description; 
                                    @endphp
                                     
                                    <p>{!!Str::limit($longParagraph, 300) !!}</p>
                                    <button class="read-more-btn">Read More</button>

                                    </td>
                            </tr>
                            <tr>
                                <th>Thumbnail</th>
                                <td> <img class="overflow-hidden" src="{{ url('image/post/original/' . $post->photo) }}" alt="{{ $post->title }}"></td>
                            </tr>
                            <tr>
                               <th>Tags</th>
                                <td>
                                @php
                                        $colors = array('success', 'warning', 'danger', 'info')
                                        
                                @endphp

                                        
                                        @foreach ($post->tag as $tag)
                                            <button class="btn btn-sm btn-{{ ($colors[random_int(0, 3)]) }}">{{ $tag->name }}</button>
                                        @endforeach
                                </td> 
                            </tr>
                            
                            
                        </tbody>

                       
                    </table>
                </div>
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-8">
                            <h4 class="mb-0"> Category Details</h4>
                        </div>
                    </div> 
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $post->category->id }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $post->category->name }}</td>
                            </tr>
                            <tr>
                                <td>Slug</td>
                                <td>{{ $post->category->slug }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $post->category->status==1? 'Active':'Inactive'}}</td>
                            </tr>
                            <tr>
                                <td>Created at</td>
                                <td>{{ $post->category->created_at->toDateTimeString() }}</td>
                            </tr>
                            <tr>
                                <td>Updated at</td>
                                <td>{{ $post->category->created_at != $post->updated_at ?$post->updated_at->toDateTimeString(): 'Not Updated'}}</td>
                            </tr>
                        </tbody>

                       
                    </table>
                    <div class="col-md-12">
                        <a href="{{ route('category.show', $post->category->id) }}"><button class=" btn btn-info btn-sm m-1 ">Details</button></a>
                        
                    </div> 
                </div>
            </div>
             <div class="card mb-4">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-0"> Sub Category Details</h4>
                        </div>
                    </div> 
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $post->sub_category->id }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $post->sub_category->name }}</td>
                            </tr>
                            <tr>
                                <td> Slug</td>
                                <td>{{ $post->sub_category->slug }}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{ $post->sub_category->status==1? 'Active':'Inactive'}}</td>
                            </tr>
                            <tr>
                                <td>Created at</td>
                                <td>{{ $post->sub_category->created_at->toDateTimeString() }}</td>
                            </tr>
                            <tr>
                                <td>Updated at</td>
                                <td>{{ $post->sub_category->created_at != $post->sub_category->updated_at ?$post->sub_category->updated_at->toDateTimeString(): 'Not Updated'}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="col-md-12">
                        <a href="{{ route('sub-category.show', $post->sub_category->id) }}"><button class=" btn btn-info btn-sm m-1 ">Details</button></a>
                        
                    </div> 
                </div>
            </div>
             <div class="card">
                <div class="card-header ">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="mb-0"> User Details</h4>
                        </div>
                    </div> 
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $post->user->id }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $post->user->name }}</td>
                            </tr>
                            <tr>
                                <td> Slug</td>
                                <td>{{ $post->user->email }}</td>
                            </tr>
                            
                            <tr>
                                <td>Member Since</td>
                                <td>{{ $post->user->created_at->toDateTimeString() }}</td>
                            </tr>
                           
                        </tbody>

                       
                    </table>
                   <div class="col-md-12">
                    <a href="{#"><button class=" btn btn-info btn-sm m-1 ">Details</button></a>
                    
                </div> 
                </div>
                
            </div>
        </div>


    </div>

    @push('customjs')
    <script>
        const readMoreBtn = document.querySelector('.read-more-btn');
        const longParagraph = document.querySelector('.long-paragraph');
        const fullText = '{!! $longParagraph !!}';
      
        readMoreBtn.addEventListener('click', () => {
          longParagraph.textContent = fullText;
          readMoreBtn.style.display = 'none';
        });
      </script>
      
    @endpush


@endsection

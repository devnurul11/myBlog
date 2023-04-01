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
                    
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control ', 'placeholder' => 'Enter post title']) !!}
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['id' => 'slug', 'class' => 'form-control', 'placeholder' => 'Post Status']) !!}

                    {!! Form::label('status', 'Category Status') !!}
                    {!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, [
                        'class' => 'form-select',
                        'placeholder' => 'Enter slug name',
                    ]) !!}
                    <div class="row">
                        <div class="col-lg-6">
                            {!! Form::label('category_id', 'Select Paraent category') !!}
                            {!! Form::select('category_id', $categories, null, [
                                'id' => 'category_id',
                                'class' => 'form-select',
                                'placeholder' => 'Select Paraent category',
                            ]) !!}
                        </div>
                        <div class="col-lg-6">
                            {!! Form::label('sub_category_id', 'Select Sub Category') !!}
                            
                            {!! Form::select('sub_category_id', $sub_category, null, [
                                'id' => 'sub_category_id',
                                'class' => 'form-select',
                                'placeholder' => 'Select Paraent category',
                            ]) !!}
                        </div>
                    </div>
                    {!! Form::label('description', 'Write Description') !!}
                    {!! Form::textarea('description', null, [
                        'id' => 'description',
                        'class' => 'form-control',
                        'placeholder' => 'Description',
                    ]) !!}

                {!! Form::label('tag_id', 'Select tags',['class'=>'mt-2']) !!}
                    <div class="row">
                         @foreach ($tags as $tag)
                           <div class="col-md-3">
                            {!! Form::checkbox('tag_ids[]', $tag->id, true) !!}  <span>{{ $tag->name }}</span>
                           </div>
                                

                             @endforeach                       
                    </div> 
                    {!! Form::label('photo', 'Feature Image',['class'=>'mt-2']) !!}
                    {!! Form::file('photo', ['class'=>'form-control']) !!}
               
                  
                


                    @push('customCss')
                        <style>
                            .ck.ck-content {
                                min-height: 250px;
                            }
                        </style>
                    @endpush
                    
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.4/axios.min.js"
                        integrity="sha512-LUKzDoJKOLqnxGWWIBM4lzRBlxcva2ZTztO8bTcWPmDSpkErWx0bSP4pdsjNH8kiHAUPaT06UXcb+vOEZH+HpQ=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

                    @push('customjs')
                        <script>
                            ClassicEditor
                                .create(document.querySelector('#description'))
                                .catch(error => {
                                    console.error(error)
                                })




                            $('#category_id').on('change', function() {
                                
                                 let category_id = $('#category_id').val();
                                get_sub_category(category_id);
                             
                            })
                            const get_sub_category= (category_id)=>{
                                  
                               
                                let sub_categories_element = $('#sub_category_id');
                                sub_categories_element.empty()
                                sub_categories_element.append('<option selected="selected"> Select Sub Category</option>')


                                axios.get(window.location.origin + '/admin/get-subCategory/' + category_id).then(res => {
                                    sub_categories = res.data;

                                    sub_categories.map((sub_category, index) => (
                                        $('#sub_category_id').append(
                                            `<option value="${sub_category.id}" > ${sub_category.name} </option>`)
                                    ))
                                    console.log(sub_categories)
                                })
                            }

                        </script>
                    @endpush



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

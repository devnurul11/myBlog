                    
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['id'=>'title','class' => 'form-control', 'placeholder' => 'Enter post title']) !!}
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['id'=>'slug','class' => 'form-control', 'placeholder' => 'Post Status']) !!}
                   
                    {!! Form::label('status', 'Category Status') !!}
                    {!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, [
                        'class' => 'form-select',
                        'placeholder' => 'Enter slug name',
                    ]) !!}
                    <div class="row">
                     <div class="col-lg-6">
                        {!! Form::label('category_id', 'Select Paraent category') !!}
                        {!! Form::select('category_id', $categories, null, [
                        'class' => 'form-select',
                        'placeholder' => 'Select Paraent category',
                    ]) !!} 
                    </div>   
                     <div class="col-lg-6">
                        {!! Form::label('sub_category_id', 'Select Sub Category') !!}
                        {!! Form::select('sub_category_id', $sub_categories, null, [
                        'class' => 'form-select',
                        'placeholder' => 'Select Sub Category',
                    ]) !!} 
                    </div>   
                    </div>
                    
                   @push('customjs')
                       <script>
                            $('#category_id').on('change', function () {
                                let category_id = $(this).val();
                                console.log('category_id');
                            } )
                       </script>
                   @endpush
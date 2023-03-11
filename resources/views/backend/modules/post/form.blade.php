                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'placeholder' => 'Enter post title']) !!}
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
                            {{-- {!! Form::select('sub_category_id', $sub_categories, null, [
                                'class' => 'form-select',
                                'placeholder' => 'Select Sub Category',
                            ]) !!} --}}
                            <select name="sub_category_id" id="sub_category_id" class="list-group form-select">
                                <option selected="selected"> Select Sub Category</option>
                            </select>
                        </div>
                    </div>
                    {!! Form::label('editor', 'Write Description') !!}
                    {!! Form::textarea('editor', null, [
                        'id' => 'editor',
                        'class' => 'form-control',
                        'placeholder' => 'Description',
                    ]) !!}

                {!! Form::label('tag_id', 'Select tags',['class'=>'mt-2']) !!}
                    <div class="row">
                         @foreach ($tags as $tag)
                           <div class="col-md-3">
                            {!! Form::checkbox('tag_id', $tag->id, false) !!}  <span>{{ $tag->name }}</span>
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
                                .create(document.querySelector('#editor'))
                                .catch(error => {
                                    console.error(error)
                                })




                            $('#category_id').on('change', function() {
                                let category_id = $(this).val();
                                let sub_categories;
                                $('#sub_category_id').empty()
                                $('#sub_category_id').append('<option selected="selected"> Select Sub Category</option>')


                                axios.get(window.location.origin + '/admin/get-subCategory/' + category_id).then(res => {
                                    sub_categories = res.data;

                                    sub_categories.map((sub_category, index) => (
                                        $('#sub_category_id').append(
                                            `<option value="${sub_category.id}" > ${sub_category.name} </option>`)
                                    ))
                                    console.log(sub_categories)
                                })
                            })


                        </script>
                    @endpush

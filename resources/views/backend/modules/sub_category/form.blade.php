                    
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter sub category name']) !!}
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter slug name']) !!}

                    {!! Form::label('category_id', 'Select Paraent category') !!}
                    {!! Form::select('category_id', $categories, null, [
                        'class' => 'form-select',
                        'placeholder' => 'Select Paraent category',
                    ]) !!}

                    {!! Form::label('order_by', 'Sub category Serial') !!}
                    {!! Form::number('order_by', null, ['class' => 'form-control', 'placeholder' => 'Enter Serial Number']) !!}
                    {!! Form::label('status', 'Sub category Status') !!}
                    {!! Form::select('status', [1 => 'Active', 0 => 'Inactive'], null, [
                        'class' => 'form-select',
                        'placeholder' => 'Select Status',
                    ]) !!}
@extends('layouts.app')

@section('title')
   Update Category type
@endsection

@section('main')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<div class="container">
    <div class="justify-content-center">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <!-- <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul> -->
            </div>
        @endif
        <div class="card">
            <div class="card-header" style="margin-left:40%;">Edit category
                <span class="float-right">
                    <a class="btn btn-primary btn-radius" href="{{ route('category-type.index') }}">Product Category type</a>
                </span>
            </div>
            <div class="card-body">
                {!! Form::model($categories, ['route' => ['category-type.update', $categories->id],'method' => 'PATCH']) !!}

                    <div class="row">
                    
                        <div class="col-md-6">
                             <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                  @if($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                           @endif
                            </div>
                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group" >
                        <strong> Category:</strong>

                              <select class="form-control" name="category" style="margin-top: 0px!important;" >
                        <option value="">Select a Category</option>

                        @foreach ($cat as $category)
                            <option value="{{ $category->id }}" {{ $category->id === $categories->categoryid ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                           <!--  @if ($category->children)
                                @foreach ($category->children as $child)
                                    <option value="{{ $child->id }}" {{ $child->id === $categories->categoryid ? 'selected' : '' }}>&nbsp;&nbsp;{{ $child->name }}</option>
                                @endforeach
                            @endif -->
                        @endforeach
                    </select>
                      @if($errors->has('category'))
                                    <div class="error">{{ $errors->first('category') }}</div>
                                   @endif
                                    </div>
                            
                        </div>

                     </div>


                   
                    
                     
            <button type="submit" class="btn btn-primary" style="margin-left: 45%; margin-top: 25px;">Submit</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection
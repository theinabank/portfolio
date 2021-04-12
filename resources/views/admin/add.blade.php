@extends('layouts.adminTemplate')

@section('content')

<div class="error-container">
    @if ($errors->any())
    <div class="error-msgs alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>


<div class="sub-title">
    <div class="container d-flex">
        <h3>Add Project</h3>
        <a class="ml-auto button-back" href="{{ URL::previous() }}">Go Back</a>
    </div>
</div>

<div class="container">
<form action="{{ route('admin-store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" placeholder="Enter Title">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select type="file" name="category" class="form-control">
                        @foreach($categories as $key => $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="date" class="form-control" placeholder="Enter Title">
                </div>
            </div> -->
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <strong>Thumbnail:</strong>
                    <input type="file" name="thumbnail" class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Intro:</strong>
                    <textarea class="form-control" style="height:150px" name="intro" placeholder="Enter Intro"></textarea>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <strong>Gallery:</strong>
                    <input type="file" name="gallery[]" multiple class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" id="ckeditor-id" name="text"></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="button-submit btn btn-primary">Create</button>
                <input type="checkbox" id="status" name="status" value="Public">
                <label class="chbox-status" for="status">Make Public</label>
            </div>
        </div>
    </div>
   
</form>
</div>
<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'ckeditor-id' );
</script>

@endsection
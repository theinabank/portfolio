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
        <h3>Edit Project</h3>
        <a class="ml-auto button-back" href="{{ URL::previous() }}">Go Back</a>
    </div>
</div>

<div class="container">
<form action="{{ route('admin-update', $project->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
  
     <div class="row">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" class="form-control" value="{{ $project->title }}" placeholder="Enter Title">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <strong>Category:</strong>
                    <select type="file" name="category" class="form-control">
                    <option value="{{ $project->category->id }}">{{ $project->category->name }}</option>
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

        <div class="row pb-5">
            <div class="col-sm-3">
                <div class="form-group">
                    <strong>Thumbnail:</strong>
                    <input type="file" name="thumbnail" class="form-control">
                    <div class="image mt-3">
                        <img class="img-fluid" src="<?= asset($project->thumbnail); ?>" alt="{{ $project->title }}">
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Intro:</strong>
                    <textarea class="form-control" style="height:150px" name="intro" placeholder="Enter Intro">{{ $project->intro }}</textarea>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="form-group">
                    <strong>Gallery:</strong>
                    <a href="#" class="btn-view-gallery" data-toggle="modal" data-target="#galleryModal">View Gallery</a>
                    <input type="file" name="gallery[]" multiple class="form-control">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <textarea class="form-control" style="height:150px" id="ckeditor-id" name="text">{!! $project->text !!}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="button-submit btn btn-primary">Edit</button>
                <input type="checkbox" id="status" name="status" value="Public" @if ($project->status === 'public') {{ 'checked' }} @endif>
                <label class="chbox-status" for="status">Make Public</label>
            </div>
        </div>
    </div>
   
</form>
</div>

        <!-- Modal -->
        <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @foreach($images as $image)
                        <div class="modal-image">
                            <img class="img-fluid" src="<?= asset($image->url); ?>" alt="">
                        </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

<script src="//cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'ckeditor-id' );
</script>

@endsection
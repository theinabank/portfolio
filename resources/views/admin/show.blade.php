@extends('layouts.adminTemplate')

@section('content')

<div class="sub-title">
    <div class="container d-flex">
        <h3>Show project</h3>
        <a class="ml-auto button-back" href="{{ URL::previous() }}">Go Back</a>
    </div>
</div>

<div class="container">
    @include('project.show')
     
</div>

@endsection
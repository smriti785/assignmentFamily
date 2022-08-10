@extends('layout.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Create Family</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('family.update', $family->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{$family->name}}">
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Parent Id</label>
                                <input type="text" class="form-control" id="parent_id" name="parent_id" value="{{$family->parent_id}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

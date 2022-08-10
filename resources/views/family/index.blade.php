@extends('layout.app')
@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif
<a href="{{ route('family.create') }}" class="btn btn-primary">Create</a>
    <div class = "container">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Parent Id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($families->with('subCategories')->get() as $category)

                    @foreach($category->subCategories as $subCategory)
                    {{-- @dump($subCategory) --}}
                        <tr>
                            <td>{{$subCategory->id}}</td>
                            <td>{{$subCategory->name}}</td>
                            <td>{{$subCategory->parent_id}}</td>
                            <td>
                                <a href="{{ route('family.edit', $subCategory->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('family.show', $subCategory->id) }}" class="btn btn-primary">View</a>
                                <form action="{{ route('family.destroy', $subCategory->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>


                        @endforeach
                 @endforeach
            </tbody>
        </table>
    </div>
@endsection

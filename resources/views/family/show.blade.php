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
                     <table class="table">
                        @foreach($family as $subcategory)
                            <ul>
                                <a href="#">{{ $subcategory->name}} </a>
                                @if($subcategory->subcategories->count())
                                  <ul>
                                    @foreach($subcategory->subcategories as $subcategory)
                                         <li class=""><a href="#">{{$subcategory->name}}</a></li>
                                    @endforeach
                                  </ul>
                                @endif
                            </ul>
                        @endforeach
                     </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

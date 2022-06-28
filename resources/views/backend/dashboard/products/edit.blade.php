@extends('backend.dashboard.layouts.app', ['activePage' => 'products', 'title' => 'Edit Product', 'navName' => 'Table List', 'activeButton' => 'catalogue'])

@section('content')
<div class="page-header">
    <div class="row align-items-center">
        <div class="col-sm mb-2 mb-sm-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-no-gutter">
                    <li class="breadcrumb-item"><a class="breadcrumb-link" href="{{ route('backend.products.list') }}">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Product</li>
                </ol>
            </nav>

            <h1 class="page-header-title">Edit Product</h1>

            <div class="mt-2">
                <a class="text-body me-3" href="javascript:;">
                    <i class="bi-clipboard me-1"></i> Duplicate
                </a>
                <a class="text-body" href="#">
                    <i class="bi-eye me-1"></i> Preview
                </a>
            </div>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>




    <form action="{{route('backend.products.update', $product)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

                    @include('includes.validation-form')
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('backend.products.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="card col-md-12">
                                        <div class="card-body row">
                                            @include('includes.validation-form')
                                            <div class="col-md-12 mb-2">
                                                <label for="name">Name:</label>
                                                <input type="text" value='{{ $product->name }}' name="name" id="name" class="form-control">
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <label for="desc">Description:</label>
                                                <textarea name="desc" value='{{ $product->desc }}' id="desc" rows="3" class="form-control">
                                                    {{ $product->desc }}
                                                </textarea>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="price">Price:</label>
                                                <input type="text" value='{{ $product->price }}' name="price" id="price" class="form-control" placeholder="80.00...">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="qty">Quantity in Stock:</label>
                                                <input type="number" value='{{ $product->qty }}' name="qty" id="qty" class="form-control" min="0">
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="category">Category:</label>
                                                <div class="col-md-12">
                                                    <select style="width:100%" class="selectpicker" name="category" data-live-search="true">
                                                        @foreach ($categories as $categorie)
                                                            <option value="{{$categorie->id}}" data-tokens="{{$categorie->category_name}}">{{$categorie->category_name}}</option>
                                                        @endforeach
                                                        
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="name">Tags:</label>
                                                <select  name="tags[]" id="tags" value="" class="form-control select2"  multiple="multiple" style="width: 100%;">
                                                    @foreach ($tags as $tag)
                                                        <option @if ($product->tags->contains('id_tag', $tag->id)) selected @endif value='{{ $tag->id }}'> {{ $tag->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label
                                                    for="images">Images</label>
                                                <input type="file" name="images[]" id="images" class="form-control" multiple>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button type="submit"
                                                    class="btn btn-lg btn-outline-success">Update</button>
                                            </div>
                
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

    </form>


    @endsection
    @section('js_content')
    <script>
        $(document).ready(function() {
            $('.select2').select2({

                tags: true,
                maximumSelectionLength: 100,
                tokenSeparators: [','],
                placeholder: "Select or type keywords",
            })
        });
    </script>
@endsection

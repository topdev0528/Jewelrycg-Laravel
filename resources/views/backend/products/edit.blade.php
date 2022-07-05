@extends('backend.layouts.app', ['activePage' => 'products', 'title' => 'Edit Product', 'navName' => 'Table List', 'activeButton' => 'catalogue'])

@section('content')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col-sm mb-2 mb-sm-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-no-gutter">
                        <li class="breadcrumb-item"><a class="breadcrumb-link"
                                href="{{ route('backend.products.list') }}">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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




    <form action="{{ route('backend.products.update', $product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('includes.validation-form')
        <div class="row">
            <div class="col-lg-8 mb-3 mb-lg-0">
                <div class="row justify-content-center">
                    <div class="card col-md-12">
                        <div class="card-body row">
                            @include('includes.validation-form')
                            <div class="mb-4">
                                <label for="name">Name</label>
                                <input type="text" value='{{ $product->name }}' name="name" id="name"
                                    class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="name">Slug</label>
                                <input type="text" value='{{ $product->slug }}' name="slug" id="slug"
                                    class="form-control">
                            </div>
                            <div class="mb-4">
                                <label for="desc">Description</label>
                                <textarea name="desc" value='{{ $product->desc }}' id="desc" rows="3" class="form-control">{{ $product->desc }}</textarea>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="images">Images</label>
                                <label class="btn btn-primary" id="getFileManagerForProducts">
                                    Upload
                                    <input type="hidden" id="all_checks" value="{{ $product->product_images }}"
                                        name="product_images">
                                </label>
                            </div>


                        </div>
                    </div>
                    <div class="card mb-3 mb-lg-5 mt-3">
                        <!-- Header -->
                        <div class="card-header card-header-content-between">
                            <h4 class="card-header-title">Media</h4>

                            <!-- Dropdown -->
                            <div class="dropdown">
                                <button type="button" class="btn btn-ghost-secondary btn-sm" id="mediaDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Add media from URL <i class="bi-chevron-down"></i>
                                </button>

                                <div class="dropdown-menu dropdown-menu-end mt-1" style="">
                                    <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#addImageFromURLModal">
                                        <i class="bi-link dropdown-item-icon"></i> Add image from URL
                                    </a>
                                    <a class="dropdown-item" href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#embedVideoModal">
                                        <i class="bi-youtube dropdown-item-icon"></i> Embed video
                                    </a>
                                </div>
                            </div>
                            <!-- End Dropdown -->
                        </div>
                        <!-- End Header -->

                        <!-- Body -->
                        <div class="card-body">
                            <!-- Gallery -->
                            <div id="fancyboxGallery" class="js-fancybox row justify-content-sm-center gx-3">
                                @foreach ($uploads as $upload)
                                    <div id="fileappend-{{$upload->id}}" class="col-6 col-sm-4 col-md-3 mb-3 mb-lg-5">
                                        <div class="card card-sm"><img class="card-img-top"
                                                src="{{ url('uploads/all')}}/{{ $upload->file_name}}"
                                                alt="Image Description">
                                            <div class="card-body">
                                                <div class="row col-divider text-center">
                                                    <div class="col"><a class="text-body"
                                                            href="./assets/img/1920x1080/img3.jpg" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="" data-fslightbox="gallery"
                                                            data-bs-original-title="View"><i class="bi-eye"></i></a></div>
                                                    <div class="col"><a onclick="removepreviewappended({{$upload->id}})"
                                                            class="text-danger" href="javascript:;"><i class="bi-trash"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- End Gallery -->

                            <!-- Dropzone -->

                            <!-- End Dropzone -->
                        </div>
                        <!-- Body -->
                    </div>
                </div>

            </div>
            <div class="col-lg-4">

                <!-- Card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-header-title">Status</h3>
                        <small class="text-muted">Published: 2 days ago</small>
                    </div>
                    <div class="card-body">
                        {{ $product->created_at }}
                        <br />
                        <br />
                        Seller:
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Options</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <label class="row form-check form-switch mb-4" for="availabilitySwitch1">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Digital</span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" class="form-check-input" name="is_digital" value="1" @if($product->is_digital == 1) checked @endif id="availabilitySwitch1">
                            </span>
                        </label>
                        <label class="row form-check form-switch mb-4" for="availabilitySwitch1">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Virtual</span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" value="1" @if($product->is_virtual == 1) checked @endif class="form-check-input" id="availabilitySwitch1">
                            </span>
                        </label>
                        <label class="row form-check form-switch mb-4" for="availabilitySwitch1">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Status</span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" class="form-check-input" name="status" value="1" @if($product->status == 1) checked @endif id="availabilitySwitch1">
                            </span>
                        </label>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Pricing + Stock</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="priceNameLabel" class="form-label">Price</label>
                            <input type="text" value='{{ $product->price }}' name="price" id="price"
                                class="form-control" placeholder="80.00...">
                        </div>
                        <div class="mb-4">
                            <label for="qty">Quantity in Stock</label>
                            <input type="number" value='{{ $product->qty }}' name="qty" id="qty"
                                class="form-control" min="0">
                        </div>
                        <label class="row form-check form-switch mb-4" for="availabilitySwitch1">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Backorder</span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" name="is_backorder" value="1" @if($product->is_backorder == 1) checked @endif class="form-check-input" id="availabilitySwitch1">
                            </span>
                        </label>
                        <label class="row form-check form-switch mb-4" for="availabilitySwitch1">
                            <span class="col-8 col-sm-9 ms-0">
                                <span class="text-dark">Made to Order</span>
                            </span>
                            <span class="col-4 col-sm-3 text-end">
                                <input type="checkbox" name="is_madetoorder" value="1" @if($product->is_madetoorder == 1) checked @endif class="form-check-input" id="availabilitySwitch1">
                            </span>
                        </label>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Organization</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="category">Category</label>
                            <div class="col-md-12">
                                <select style="width:100%" class="selectpicker" name="category" data-live-search="true">
                                    <option disabled>Select category</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}"
                                            data-tokens="{{ $categorie->category_name }}">
                                            {{ $categorie->category_name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="name">Tags</label>
                            <select name="tags[]" id="tags" value="" class="form-control select2"
                                multiple="multiple" style="width: 100%;">
                                @foreach ($tags as $tag)
                                    <option @if ($product->tags->contains('id_tag', $tag->id)) selected @endif value='{{ $tag->id }}'>
                                        {{ $tag->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">3D Model</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <p>
                        @if ($product->product_3dpreview != null)
                            <span class="badge btn-success"> With 3d model</span>
                        @else
                            <span class="badge btn-danger"> Without 3d model </span>
                        @endif
                        </p>
                        <label class="btn btn-primary" id="getFileManagerModel">
                            Upload

                        </label>
                        <input type="hidden" id="fileManagerModelId" value="{{ $product->product_3dpreview }}" name="product_3dpreview">
                    </div>
                </div>
                <!-- Card -->
                <div class="card mb-3 mb-lg-5">
                    <!-- Header -->
                    <div class="card-header">
                        <h4 class="card-header-title">Thumbnail</h4>
                    </div>
                    <!-- End Header -->

                    <!-- Body -->
                    <div class="card-body">
                        <div class="imagePreview img-thumbnail h-400px">
                            <img id="fileManagerPreview"
                                src="{{ url('uploads/all') }}/{{ $product->uploads->file_name }}"
                                style="width: 100%">
                        </div>
                        <label class="btn btn-primary" id="getFileManager">
                            Upload

                        </label>
                        <input type="hidden" id="fileManagerId" value={{$product->product_thumbnail}} name="product_thumbnail">
                    </div>
                </div>
                <!-- End Card -->

            </div>
        </div>

        <div class="position-fixed start-50 bottom-0 translate-middle-x w-100 zi-99 mb-3" style="max-width: 40rem;">
            <!-- Card -->
            <div class="card card-sm bg-dark border-dark mx-2">
                <div class="card-body">
                    <div class="row justify-content-center justify-content-sm-between">
                        <div class="col">
                            <button type="button" class="btn btn-ghost-danger">Delete</button>
                        </div>
                        <!-- End Col -->

                        <div class="col-auto">
                            <div class="d-flex gap-3">
                                <button type="button" class="btn btn-ghost-light">Unpublish</button>
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
            </div>
            <!-- End Card -->
        </div>

    </form>

    <div id='ajaxCalls'>
    </div>
@endsection
@section('js_content')
    <script>
        var createChecks = $('#all_checks').val().split(",");

        function removepreviewappended(id) {
            createChecks = jQuery.grep(createChecks, function(value) {
                return value != id;
            });
            $('#fileappend-' + id).remove();
            $('#all_checks').val(createChecks);
        }

        function selectFileFromManagerMultiple(id, preview) {
            if ($('#file-' + id).hasClass('selected')) {
                $('#file-' + id).removeClass('selected')
                $('#file-' + id).find('.check-this').fadeOut()
                removepreviewappended(id);
            } else {
                $('#file-' + id).addClass('selected')
                $('#file-' + id).find('.check-this').fadeIn()
                createChecks.push(id)
                $('#fancyboxGallery').prepend(productImageDiv(id, preview))
            }
            $('#all_checks').val(createChecks);
        }
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

@extends('admin.body.adminlayout')

@section('admin')
    <div class="px-3 md:px-8 h-auto my-20">
        <div class="container mx-auto max-w-full">
            <div class="grid grid-cols-1 px-4 mb-16">
                <div class="w-8/12 mr-auto bg-white rounded-xl overflow-hdden shadow-md p-4 undefined">
                    <div
                        class="bg-indigo-400 -mt-10 mb-4 rounded-xl text-white flex items-center justify-between w-full h-24 py-4 px-8 shadow-lg-purple undefined">
                        <h2 class="text-white text-2xl">Product</h2>
                        <a href="{{ route('product.index') }}" class="px-4 py-1 text-base font-normal text-white">Back</a>
                    </div>
                    <div class="p-4 undefined">
                        <div class="overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>

                                    <tr>
                                        <div class="block p-6 rounded-lg shadow-lg bg-white w-full">
                                            <form
                                                action="{{ isset($product) ? route('product.update', $product->id) : route('product.store') }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf

                                                @isset($product)
                                                    @method('PUT')
                                                @endisset

                                                <div class="form-group mb-6">
                                                    <label for="unique_id"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Unique_id</label>

                                                    <input type="text" name="unique_id" placeholder="Enter Page Title"
                                                        value="{{ isset($product) ? $product->unique_id : old('unique_id') }}"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                                                    @error('unique_id')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-6">
                                                    <label for="brand_id"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Brand
                                                        Name</label>

                                                    <select name="brand_id"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100  focus:border-indigo-300 "
                                                        id="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Brand
                                                        </option>
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}"
                                                                @if (isset($product)) @if ($brand->id == $product->brand_id)  selected {{ $brand->name }} @endif
                                                                @endif > <span
                                                                    class="text-danger">{{ $brand->name }} </span>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>


                                                <div class="form-group mb-6">
                                                    <label for="category_id"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Category
                                                        Name</label>

                                                    <select name="category_id"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                                        id="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Category
                                                        </option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                @if (isset($product)) @if ($category->id == $product->category_id)  selected {{ $category->name }} @endif
                                                                @endif><span
                                                                    class="text-danger">{{ $category->name }}</span>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-6">
                                                    <label for="subcategory_id"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">SubCategory
                                                        Name</label>

                                                    <select name="subcategory_id"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                                        id="" class="form-control">
                                                        <option value="" selected="" disabled="">Select
                                                            SubCategory</option>
                                                        @foreach ($subcategories as $subcategory)
                                                            <option value="{{ $subcategory->id }}"
                                                                @if (isset($product)) @if ($subcategory->id == $product->subcategory_id)  selected {{ $subcategory->name }} @endif
                                                                @endif > <span
                                                                    class="text-danger">{{ $subcategory->name }} </span>
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('subcategory_id')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-6">
                                                    <label for="product_name"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Product
                                                        Name</label>

                                                    <input type="text" name="product_name"
                                                        placeholder="Enter Product Name"
                                                        value="{{ isset($product) ? $product->product_name : old('product_name') }}"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                                                    @error('product_name')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-6">
                                                    <label for="page_title"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Page
                                                        Title</label>

                                                    <input type="text" name="page_title" placeholder="Enter Page Title"
                                                        value="{{ isset($product) ? $product->page_title : old('page_title') }}"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                                                    @error('page_title')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="form-group mb-6">
                                                    <label for="meta_title"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Meta
                                                        Title</label>

                                                    <input type="text" name="meta_title" placeholder="Enter Meta Title"
                                                        value="{{ isset($product) ? $product->meta_title : old('meta_title') }}"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                                                    @error('meta_title')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-6">
                                                    <label for="page_description"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Page
                                                        Description</label>

                                                    <textarea name="page_description" placeholder="Enter Page Description" id="page_description"
                                                        class="w-full font-normal placeholder-gray-500 focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 border-gray-300 rounded-md text-base px-3 py-2"
                                                        cols="30" rows="5">{{ isset($product) ? $product->page_description : old('page_description') }}</textarea>
                                                    @error('page_description')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>


                                                <div class="form-group mb-6">
                                                    <label for="meta_description"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Meta
                                                        Description</label>

                                                    <textarea name="meta_description" placeholder="Enter Meta Description" id="meta_description"
                                                        class="w-full placeholder-gray-500 font-normal focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 border-gray-300 rounded-md text-base px-3 py-2"
                                                        cols="30" rows="5">{{ isset($product) ? $product->meta_description : old('meta_description') }}</textarea>
                                                    @error('meta_description')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>


                                                <div class="form-group mb-6">
                                                    <label for="product_description"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Product
                                                        Description</label>
                                                    <textarea name="product_description" id="product_description" class="ckeditor w-full font-normal text-base px-3 py-2"
                                                        cols="30" rows="10">{{ isset($product) ? $product->product_description : old('product_description') }}</textarea>

                                                    @error('product_description')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="grid  @isset($product) @if ($product->product_thambnail != null)grid-cols-2 @endif @endisset gap-8">
                                                <div class="form-group mb-6">
                                                    <label for="product_thambnail"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Product
                                                        Thambnail
                                                    </label>
                                                    <input type="file" name="product_thambnail"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />

                                                    @error('product_thambnail')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                @isset($product)
                                                @if ($product->product_thambnail != null)
                                                    <div class="form-group">
                                                        <label for=""
                                                            class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Current
                                                            Product Thambnail</label>
                                                        <img src="{{ asset($product->product_thambnail) }}"
                                                            class="object-contain h-12 object-left" alt="">
                                                    </div>
                                                @endif
                                            @endisset
                                                </div>



                                                <div class="form-group mb-6">
                                                    <label for="product_thambnail_alt"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Product
                                                        thambnail_alt</label>

                                                    <input type="text" name="product_thambnail_alt"
                                                        placeholder="Enter Product thambnail_alt"
                                                        value="{{ isset($product) ? $product->product_thambnail_alt : old('product_thambnail_alt') }}"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                                                    @error('product_thambnail_alt')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="form-group mb-6">
                                                    <label for="multipleimage"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Multiple
                                                        Image
                                                    </label>
                                                    <input type="file" name="multipleimage[]" multiple=""
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />

                                                    @error('multipleimage')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>




                                                <div class="form-group mb-6">
                                                    <label for="slug"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Slug</label>

                                                    <input type="text" name="slug" placeholder="Enter Slug"
                                                        value="{{ isset($product) ? $product->slug : old('slug') }}"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                                                    @error('slug')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <button type="submit"
                                                    class="
                                                    w-full
                                                px-6
                                                py-2.5
                                                my-3
                                                bg-indigo-600
                                                text-white
                                                font-normal
                                                text-base
                                                leading-tight
                                                uppercase
                                                rounded
                                                shadow-md
                                                hover:bg-indigo-700 hover:shadow-lg
                                                focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0
                                                active:bg-indigo-800 active:shadow-lg
                                                transition
                                                duration-150
                                                ease-in-out">Submit</button>
                                            </form>

                                        </div>

                                    </tr>
                                </thead>
                                <tbody>




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom_JS')
    <script src="https://cdn.ckeditor.com/4.14.1/standard-all/ckeditor.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>




    <script>
        const ckboxes = document.querySelectorAll('.ckeditor');

        ckboxes.forEach(box => {

            let id = box.getAttribute('id');

            CKEDITOR.replace(id, {

                height: 200,

            })


        });
    </script>
@endsection

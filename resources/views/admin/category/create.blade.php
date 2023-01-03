@extends('admin.body.adminlayout')

@section('admin')
    <div class="px-3 md:px-8 h-auto my-20">
        <div class="container mx-auto max-w-full">
            <div class="grid grid-cols-1 px-4 mb-16">
                <div class="w-8/12 mr-auto bg-white rounded-xl overflow-hdden shadow-md p-4 undefined">
                    <div
                        class="bg-indigo-400 -mt-10 mb-4 rounded-xl text-white flex items-center justify-between w-full h-24 py-4 px-8 shadow-lg-purple undefined">
                        <h2 class="text-white text-2xl">Category</h2>
                        <a href="{{ route('category.index') }}" class="px-4 py-1 text-base font-normal text-white">Back</a>
                    </div>
                    <div class="p-4 undefined">
                        <div class="overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>

                                    <tr>

                                        <div class="block p-6 rounded-lg shadow-lg bg-white w-full">
                                            <form
                                                action="{{ isset($category) ? route('category.update', $category->id) : route('category.store') }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf

                                                @isset($category)
                                                    @method('PUT')
                                                @endisset
                                                <div class="form-group mb-6">
                                                    <label for="name"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Category
                                                        Name</label>

                                                    <input type="text" name="name" placeholder="Enter category Name"
                                                        value="{{ isset($category) ? $category->name : old('name') }}"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                                                    @error('name')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div
                                                    class="grid  @isset($category) @if ($category->image != null)grid-cols-2 @endif @endisset gap-8">
                                                    <div class="form-group mb-6">
                                                        <label for="image"
                                                            class="form-label font-medium text-lg inline-block mb-2 text-gray-700">Category
                                                            Image</label>

                                                        <input type="file" name="image"npm  placeholder="category Image"
                                                            class="w-full px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none font-normal text-base focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                                                        @error('image')
                                                            <small
                                                                class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                        @enderror
                                                    </div>


                                                    @isset($category)
                                                        @if ($category->image != null)
                                                            <div class="form-group">
                                                                <label for=""
                                                                    class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Current
                                                                    Category Image</label>
                                                                <img src="{{ asset($category->image) }}"
                                                                    class="object-contain h-12 object-left" alt="">
                                                            </div>
                                                        @endif
                                                    @endisset
                                                </div>
                                                <div class="form-group mb-6">
                                                    <label for="slug"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Category
                                                        slug</label>

                                                    <input type="text" name="slug" placeholder="Enter category slug"
                                                        value="{{ isset($category) ? $category->slug : old('slug') }}"
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

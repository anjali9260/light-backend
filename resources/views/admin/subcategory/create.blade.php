@extends('admin.body.adminlayout')

@section('admin')
    <div class="px-3 md:px-8 h-auto my-20">
        <div class="container mx-auto max-w-full">
            <div class="grid grid-cols-1 px-4 mb-16">
                <div class="w-8/12 mr-auto bg-white rounded-xl overflow-hdden shadow-md p-4 undefined">
                    <div
                        class="bg-indigo-400 -mt-10 mb-4 rounded-xl text-white flex items-center justify-between w-full h-24 py-4 px-8 shadow-lg-purple undefined">
                        <h2 class="text-white text-2xl">Subcategory</h2>
                        <a href="{{ route('subcategory.index') }}" class="px-4 py-1 text-base font-normal text-white">Back</a>
                    </div>
                    <div class="p-4 undefined">
                        <div class="overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>

                                    <tr>
                                        <div class="block p-6 rounded-lg shadow-lg bg-white w-full">
                                            <form
                                                action="{{ isset($subcategory) ? route('subcategory.update', $subcategory->id) : route('subcategory.store') }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf

                                                @isset($subcategory)
                                                    @method('PUT')
                                                @endisset
                                                <div class="form-group mb-6">
                                                    <label for="name"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Subcategory
                                                        Name</label>

                                                    <input type="text" name="name" placeholder="Enter Subcategory Name"
                                                        value="{{ isset($subcategory) ? $subcategory->name : old('name') }}"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                                                    @error('name')
                                                        <small class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>



                                                <div class="form-group mb-6">
                                                    <label for="category_id"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Category
                                                        Name</label>
                                                        <select name="category_id" class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" id="" class="form-control">
                                                            <option value="" selected="" disabled="">Select Category</option>
                                                            @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                              @if(isset($subcategory)) @if ($category->id == $subcategory->category_id)  selected {{  $category->name }} @endif @endif > <span class="text-danger">{{ $category->name }} </span>  </option>
                                                            @endforeach
                                                        </select>
                                                    @error('category_id')
                                                        <small class="text-red-700 font-normal text-base">{{ $message }}</small>
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



@extends('admin.body.adminlayout')

@section('admin')
    <div class="px-3 md:px-8 h-auto my-20">
        <div class="container mx-auto max-w-full">
            <div class="grid grid-cols-1 px-4 mb-16">
                <div class="w-8/12 mr-auto bg-white rounded-xl overflow-hdden shadow-md p-4 undefined">
                    <div
                        class="bg-indigo-400 -mt-10 mb-4 rounded-xl text-white flex items-center justify-between w-full h-24 py-4 px-8 shadow-lg-purple undefined">
                        <h2 class="text-white text-2xl">post</h2>
                        <a href="{{ route('post.index') }}" class="px-4 py-1 text-base font-normal text-white">Back</a>
                    </div>
                    <div class="p-4 undefined">
                        <div class="overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>

                                        <div class="block p-6 rounded-lg shadow-lg bg-white w-full">
                                            <form
                                                action="{{ isset($post) ? route('post.update', $post->id) : route('post.store') }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf

                                                @isset($post)
                                                    @method('PUT')
                                                @endisset
                                                <div class="form-group mb-6">
                                                    <label for="title"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">post
                                                        title</label>

                                                    <input type="text" name="title" placeholder="Enter post title"
                                                        value="{{ isset($post) ? $post->title : old('title') }}"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300" />
                                                    @error('title')
                                                        <small
                                                            class="text-red-700 font-normal text-base">{{ $message }}</small>
                                                    @enderror
                                                </div>


                                                <div class="form-group mb-6">
                                                    <label for=""
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">Tag
                                                    </label>
                                                    @isset($tag)
                                                        @foreach ($tags as $key => $item)
                                                            {{ $item->tag }} ,
                                                        @endforeach
                                                    @endisset
                                                    <select name="tags[]"
                                                        class="w-full font-normal text-base px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                                        id="" class="form-control" multiple="multiple">
                                                        <option value="" selected="" disabled="">Select Tag
                                                        </option>

                                                        @foreach ($tags as $tag)
                                                            <option value="{{ $tag->id }}">
                                                                {{ $tag->tagname }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                {{-- <div class="form-group mb-6">
                                                    <label for="tag"
                                                        class="form-label inline-block font-medium text-lg mb-2 text-gray-700">
                                                        Tags</label>

                                                    <br>
                                                    @isset($tag)
                                                        @foreach ($tag as $key => $item)
                                                            {{ $item->tag }} ,
                                                        @endforeach
                                                    @endisset


                                                    <select
                                                        class="w-full font-normal text-base text-gray-700 px-3 py-2 placeholder-gray-500 border border-gray-300 rounded-md  focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300"
                                                        name="tags[]" id="js-example-basic-multiple" class="form-control"
                                                        multiple="multiple">

                                                        @foreach ($tags as $tag)
                                                            <option value="{{ $tag->id }}"> {{ $tag->tag }}
                                                            </option>
                                                        @endforeach


                                                    </select>
                                                </div> --}}




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

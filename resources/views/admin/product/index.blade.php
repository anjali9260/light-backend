@extends('admin.body.adminlayout')

@section('admin')
    <div class="px-3 md:px-8 h-auto my-20">
        <div class="container mx-auto max-w-full">
            <div class="grid grid-cols-1 px-4 mb-16">
                <div class="w-full bg-white rounded-xl overflow-hdden shadow-md p-4 undefined">
                    <div
                        class="bg-indigo-400 -mt-10 mb-4 rounded-xl text-white flex items-center justify-between w-full h-24 py-4 px-8 shadow-lg-purple undefined">
                        <h2 class="text-white font-normal text-2xl">Product</h2>
                        <a href="{{ route('product.create') }}" class="px-4 py-1 text-base font-normal text-white">Create
                            Product</a>
                    </div>
                    <div class="p-4 undefined">
                        <div class="overflow-x-auto">
                            <table class="items-center w-full bg-transparent border-collapse">
                                <thead>
                                    <tr>
                                        <th
                                            class="px-2 text-indigo-400 align-middle border-b border-solid border-gray-200 py-3 text-lg whitespace-nowrap font-medium text-left">
                                            Sr.No.</th>

                                        <th
                                            class="px-2 text-indigo-400 align-middle border-b border-solid border-gray-200 py-3 text-lg whitespace-nowrap font-medium text-left">
                                            Product Name</th>
                                            <th
                                            class="px-2 text-indigo-400 align-middle border-b border-solid border-gray-200 py-3 text-lg whitespace-nowrap font-medium text-left">
                                            Unique_Id</th>
                                        <th
                                            class="px-2 text-indigo-400 align-middle border-b border-solid border-gray-200 py-3 text-lg whitespace-nowrap font-medium text-left">
                                            Action</th>

                                        <th
                                            class="px-2 text-indigo-400 align-middle border-b border-solid border-gray-200 py-3 text-lg whitespace-nowrap font-medium text-left">
                                            Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $item)
                                        <tr class="hover:bg-gray-100 transition duration-150 ease-in-out">
                                            <td
                                                class="border-b border-gray-200 align-middle font-medium text-lg whitespace-nowrap px-2 py-4 text-left">
                                                {{ $key + 1 }}
                                            </td>

                                                <td
                                                class="border-b border-gray-200 align-middle font-medium text-lg whitespace-nowrap px-2 py-4 text-left">
                                                {{ $item->product_name }}</td>
                                                <td
                                                class="border-b border-gray-200 align-middle font-medium text-lg whitespace-nowrap px-2 py-4 text-left">
                                                {{ $item->unique_id }}</td>

                                            <td class="px-2 py-4 border-b border-gray-200 border-solid">
                                                <a href="{{ route('product.edit', $item->id) }}"
                                                    class=" px-4 py-1 text-base whitespace-nowrap text-white bg-blue-500 rounded-sm shadow-md
                                                hover:bg-blue-600 hover:shadow-lg

                                                transition
                                                duration-150
                                                ease-in-out">Edit</a>
                                            </td>

                                            <td class="px-2 py-4 border-b border-gray-200 border-solid">
                                                <button type="button"
                                                    class="

                                                    px-4 py-1.5 text-base text-white bg-red-500 rounded-sm whitespace-nowrap shadow-md
                                                    hover:bg-red-600 hover:shadow-lg
                                                    transition
                                                    duration-150
                                                    ease-in-out
                                                    leading-tight "
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $key + 1 }}">
                                                    Delete
                                                </button>



                                                <div class="modal fade fixed top-0 hidden left-0 w-full h-full outline-none overflow-x-hidden overflow-y-auto"
                                                    id="exampleModal{{ $key + 1 }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog relative w-auto pointer-events-none ">
                                                        <div
                                                            class="modal-content border-solid border-sky-500 border-2 shadow-lg relative mx-auto my-auto flex flex-col w-full max-w-lg pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                                                            <div
                                                                class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                                                                <h5 class="text-xl font-medium leading-normal text-indigo-400"
                                                                    id="exampleModalLabel">Are You Sure</h5>
                                                                <button type="button"
                                                                    class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div
                                                                class="modal-body text-black font-medium text-lg relative p-4">
                                                                Are you Sure Want to Delete This?
                                                            </div>
                                                            <div
                                                                class="modal-footer flex flex-shrink-0 gap-1 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">

                                                                <form action="{{ route('product.destroy', $item->id) }}"
                                                                    method="post"
                                                                    class="px-4 py-1.5 bg-blue-600
                                                                text-white text-base leading-tight
                                                                rounded-sm shadow-md hover:bg-blue-700 hover:shadow-lg whitespace-nowrap
                                                                transition duration-150 ease-in-out ml-1">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit">Delete</button>
                                                                </form>

                                                                <button type="button"
                                                                    class="px-4
                                                                py-1.5
                                                                bg-purple-600
                                                                text-white
                                                                  text-base
                                                                 leading-tight
                                                                 rounded-sm
                                                                 shadow-md
                                                                 hover:bg-purple-700 hover:shadow-lg
                                                                 transition
                                                               duration-150
                                                                 ease-in-out"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

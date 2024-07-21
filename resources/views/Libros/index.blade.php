@extends('layouts.app')
@section('content')
    <div class="py-8">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <!--Table Libros-->

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="pb-4 bg-white dark:bg-gray-900">
                            <label for="table-search" class="sr-only">Search</label>
                            <div class="relative mt-1">
                                <div
                                    class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>

                                <!-- Button Modal -->
                                @can('libro-create')
                                    <div class="absolute top-0 right-5 text-sm text-white">
                                        <button
                                            class ="text-base bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center dark:bg-black dark:hover:bg-black dark:focus:ring-black"
                                            data-bs-toggle="modal" data-bs-target="#ModalCreate">
                                            Agregar Libro
                                        </button>
                                    </div>
                                @endcan
                                <form action="/Libros" method="GET">
                                    <input type="text" name="busqueda"
                                        class="block ml-1 pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        type="search" placeholder="Buscar Libro" aria-describedby="button-search">
                                </form>
                            </div>
                        </div>

                        <!-- Control Table -->

                        <table class="w-full text-base text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-base text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Titulo
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Año Academico
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Asignatura
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Cantidad
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Informacion
                                    </th>
                                </tr>
                            </thead>

                            @foreach ($libros as $libro)
                                <tbody>
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-sm">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $libro->titulo }}
                                        </th>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $libro->ano_academico->nombre }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $libro->asignaturas->nombre }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $libro->cantidad }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            @can('libro-edit')
                                                <button class="mr-2" data-bs-toggle="modal"
                                                    data-bs-target="#ModalEdit{{ $libro->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="currentColor" class="bi bi-nut-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M4.58 1a1 1 0 0 0-.868.504l-3.428 6a1 1 0 0 0 0 .992l3.428 6A1 1 0 0 0 4.58 15h6.84a1 1 0 0 0 .868-.504l3.429-6a1 1 0 0 0 0-.992l-3.429-6A1 1 0 0 0 11.42 1zm5.018 9.696a3 3 0 1 1-3-5.196 3 3 0 0 1 3 5.196" />
                                                    </svg>
                                                </button>
                                                <button data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $libro->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                        <path
                                                            d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                                    </svg>
                                                </button>
                                            @endcan
                                        </td>
                                        @include('Libros.modal.edit')
                                        @include('Libros.modal.delete')
                                    </tr>
                                </tbody>
                            @endforeach

                            <tfoot>
                                <tr>
                                    <td colspan="5" class="p-2">{{ $libros->links() }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            @include('Libros.modal.create')
        @endsection

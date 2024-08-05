@extends('layouts.app')
@section('content')
    <div class="py-8">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <!--Table Libros-->

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="pb-4 bg-white dark:bg-gray-900">
                            <h2 class="ml-5 pt-2 text-xl font-bold text-gray-900  rounded-lg w-80 dark:text-white ">Libros
                                Reclamados</h2>

                            <!-- Button Modal -->
                            @can('libro-create')
                                <div class="absolute top-0 right-5 text-sm text-white">
                                    <button
                                        class ="text-lg bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center dark:bg-black dark:hover:bg-black dark:focus:ring-black"
                                        data-bs-toggle="modal" data-bs-target="#reclamo">
                                        Reclamo de Libro
                                    </button>
                                </div>
                            @endcan
                        </div>

                        <!-- Control Table -->
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Libro
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Año Academico
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Nombre del Reclamante
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Cedula
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Matricula
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Sección
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Fecha Tope
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($reclamos as $reclamo)
                                @foreach ($persona as $personas)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-sm">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $reclamo->libros->titulo }}
                                        </th>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $reclamo->ano_academico->nombre}}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $personas->nombre }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $personas->cedula }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $personas->matricula->nombre}}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $personas->seccion->nombre}}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $reclamo->fecha_tope ?? 'X' }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">


                                            <button type="button"
                                                class="btn-close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-8 h-8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                </svg>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @include('Reclamos.modal.create')
@endsection

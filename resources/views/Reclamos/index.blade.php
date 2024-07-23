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
                                        Cantidad
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Fecha de Emision
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Fecha de Entrega
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($reclamos as $reclamo)
                                @foreach ($persona as $personas)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-sm">
                                        <td class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $reclamo->libros->titulo }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $reclamo->ano_academico->nombre }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $personas->nombre }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $personas->cedula ?? 'No Posee Cedula'}}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $personas->matricula->nombre}}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $personas->seccion->nombre}}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $reclamo->cantidad}}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $reclamo->created_at }}
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

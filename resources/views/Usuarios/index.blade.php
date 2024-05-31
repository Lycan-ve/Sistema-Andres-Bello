@extends('layouts.app')
@section('content')
    <div class="py-8">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <!--Table Libros-->

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="pb-4 bg-white dark:bg-gray-900">
                            <h2 class="ml-5 pt-2 text-xl font-bold text-gray-900  rounded-lg w-80 dark:text-white ">Usuarios
                            </h2>

                            <!-- Button Modal -->
                            <div class="absolute top-0 right-5 text-sm text-white">
                                <button
                                    class ="text-lg bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg px-5 py-2.5 text-center dark:bg-black dark:hover:bg-black dark:focus:ring-black"
                                    data-bs-toggle="modal" data-bs-target="#ModalCreate">
                                    Agregar Usuario
                                </button>
                            </div>
                        </div>

                        <!-- Control Table -->
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-sm text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="text-center px-6 py-3">
                                        #
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Rol
                                    </th>
                                    <th scope="col" class="text-center px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-sm">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $usuario->id }}
                                        </th>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $usuario->name }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            {{ $usuario->email }}
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            @if (!empty($usuario->getRoleNames()))
                                                @foreach ($usuario->getRoleNames() as $rolNombre)
                                                    {{ $rolNombre }}
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center text-black">
                                            <button data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $usuario->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-nut-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M4.58 1a1 1 0 0 0-.868.504l-3.428 6a1 1 0 0 0 0 .992l3.428 6A1 1 0 0 0 4.58 15h6.84a1 1 0 0 0 .868-.504l3.429-6a1 1 0 0 0 0-.992l-3.429-6A1 1 0 0 0 11.42 1zm5.018 9.696a3 3 0 1 1-3-5.196 3 3 0 0 1 3 5.196" />
                                                </svg>
                                            </button>

                                            <button class="mx-2" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete{{ $usuario->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                    <path
                                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                                </svg>
                                            </button>
                                        </td>
                                        @include('Usuarios.modal.edit')
                                        @include('Usuarios.modal.delete')
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    @include('Usuarios.modal.create')
                @endsection

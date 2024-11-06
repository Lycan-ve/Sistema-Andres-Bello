@extends('layouts.app')
@section('content')
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Card Usuario -->

            <div class="grid grid-cols-4 grid-rows-1 gap-4">
                <div class="col-span-2 col-start-2">
                    <a class="flex justify-center p-3 bg-white border border-gray-300 rounded-lg">
                        <span>
                            <h5 class="text-4xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                                Bienvenido - {{ auth()->user()->getRoleNames()[0] }}
                            </h5>
                            <p class="mt-2 font-normal text-gray-700 dark:text-gray-400 text-center text-4xl">
                                {{ auth()->user()->name }}
                            </p>
                        </span>
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!-- Card Information -->

    <div class="grid grid-cols-8 grid-rows-1 gap-4 mt-10">
        <div class="col-span-2 col-start-3">
            <a class="flex justify-center p-3 bg-white border border-gray-300 rounded-lg">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
                        class="bi bi-book mb-3 ml-[138px]" viewBox="0 0 16 16">
                        <path
                            d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                    </svg>
                    <h5 class="text-4xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                        N° De Libros Registrados
                    </h5>
                    <p class="mt-3 font-normal text-black dark:text-gray-400 text-center text-5xl">
                        {{ $CantidadLibros }}
                    </p>
                </span>
            </a>
        </div>
        <div class="col-span-2">
            <a class="flex justify-center p-3 bg-white border border-gray-300 rounded-lg">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor"
                        class="bi bi-book mb-3 ml-[137px]" viewBox="0 0 16 16">
                        <path
                            d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                    </svg>
                    <h5 class="text-4xl text-center font-bold tracking-tight text-gray-900 dark:text-white">
                        N° De Reclamos Realizados
                    </h5>
                    <p class="mt-3 font-normal text-black dark:text-gray-400 text-center text-5xl">
                        {{ $CantidadReclamos }}
                    </p>
                </span>
            </a>
        </div>
    </div>
    </div>
    </div>
@endsection

<!-- <a class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
<h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white">USUARIO</h5>
<p class="font-normal text-center text-gray-700 dark:text-gray-400">ADMINISTRADOR</p>
</a> -->

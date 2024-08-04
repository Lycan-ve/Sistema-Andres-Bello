<div class="modal fade" id="reclamo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Reclamar Libro</h1>
                <button type="button"
                    class="btn-close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-bs-dismiss="modal" aria-label="Close">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                    </button>
                </div>
                    <!-- Modal Body -->
    <form method="post" class="p-4 md:p-5">
        @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="Select"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Libro</label>
                        <select name="id_libros"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="Libro">Seleccione el Libro</option>
                            @foreach ($libros as $libro)
                                <option value="{{ $libro->id }}">{{ $libro->titulo }} -
                                    {{ $libro->ano_academico->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del Reclamante</label>
                        <input type="text" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nombre/Apellido" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="Select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año Academico</label>
                        <select name="id_ano_academico" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="Libro">Seleccione el Año Academico</option>
                            @foreach($ano_academico as $ano)
                                <option value="{{$ano->id}}">{{$ano->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cedula</label>
                        <input type="text" name="cedula" id="cedula" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Cedula" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="Select"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matricula</label>
                        <select name="id_matricula"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Seleccione la Matricula</option>
                            @foreach ($matricula as $matriculas)
                                <option value="{{ $matriculas->id }}">{{ $matriculas->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cedula</label>
                        <input type="text" name="cedula" id="cedula" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Cedula" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="Select"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sección</label>
                        <select name="id_seccion" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>Seleccione la Sección</option>
                            @foreach ($seccion as $seccions)
                                <option value="{{ $seccions->id }}">{{ $seccions->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="Select"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiempo de
                            Entrega</label>
                        <select name="fecha_entrega" id="fecha_entrega" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>Seleccione la Sección</option>
                            <option value="3">3 dias</option>
                            <option value="7">1 Semanas</option>
                            <option value="14">2 Semanas</option>
                        </select>
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-black dark:hover:bg-black dark:focus:ring-black">
                    Reclamar
                </button>
            </form>

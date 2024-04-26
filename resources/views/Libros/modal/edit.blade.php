<div class="modal fade" id="ModalEdit{{$libro->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Libro</h1>
                    <button type="button" class="btn-close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-bs-dismiss="modal" aria-label="Close">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                    </button>                       
                </div>
                
                        <!-- Modal Body -->
                {{-- Formulario de Agregacion de un Libro --}}
            
                <form action="{{route('Libros.update', $libro->id)}}" method="POST" enctype="multipart/form-data" class="p-4 md:p-5">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                        <div class="grid gap-4 mb-4 grid-cols-2">
                            <div class="col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                        <input type="text" name="titulo" id="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nombre del Libro" required value="{{$libro->titulo}}">
                            
                    </div>
                    <div class="col-span-2 ">
                        <label for="Select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año Academico</label>
                        <select name="id_ano_academico" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="anos" value="">Seleccione el Año Academico</option>
                            @foreach($anos_academicos as $anos)
                            <option value="{{$anos->id}}">{{$anos->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="Select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Asignatura</label>
                        <select name="id_asignatura" id= "" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="asignaturas" value="">Seleccione La Asignatura</option>
                            @foreach($asignaturas as $asignatura)
                            <option value="{{$asignatura->id}}">{{$asignatura->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="text-white inline-flex items-center bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-black dark:hover:bg-black dark:focus:ring-black">
                    Editar
            </button>
    </form>
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
                        <button type="button" id="mostrarPersonas"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Mostrar Personas con Reclamos
                        </button>
                    </div>
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
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del
                            Reclamante</label>
                        <input type="text" name="nombre" id="nombre"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Nombre/Apellido" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="Select" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Año
                            Academico</label>
                        <select name="id_ano_academico" id="id_ano_academico"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="Libro">Seleccione el Año Academico</option>
                            @foreach ($ano_academico as $ano)
                                <option value="{{ $ano->id }}">{{ $ano->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cedula</label>
                        <input type="text" name="cedula" id="cedula"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Cedula" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="Select"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matricula</label>
                        <select name="id_matricula" id="id_matricula"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option selected="">Seleccione la Matricula</option>
                            @foreach ($matricula as $matriculas)
                                <option value="{{ $matriculas->id }}">{{ $matriculas->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="Select"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sección</label>
                        <select name="id_seccion" id="id_matricula" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>Seleccione la Sección</option>
                            @foreach ($seccion as $seccions)
                                <option value="{{ $seccions->id }}">{{ $seccions->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Ingrese la Cantidad de Libros" required>
                    </div>
                    <div class="col-span-2">
                        <label for="Select"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tiempo de
                            Entrega</label>
                        <select name="fecha_entrega" id="fecha_entrega" required=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>Seleccione el Lapso de Tiempo</option>
                            <option value="3">3 dias</option>
                            <option value="5">5 dias</option>
                            <option value="7">1 semana</option>
                        </select>
                    </div>
                </div>
                <button type="submit"
                    class="text-white inline-flex items-center bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-black dark:hover:bg-black dark:focus:ring-black">
                    Reclamar
                </button>
            </form>

            <!-- Modal para la lista de personas -->
            <div id="personasModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Personas con Reclamos
                            </h3>
                            <div class="mt-2">
                                <ul id="listaPersonas" class="divide-y divide-gray-200">
                                    <!-- La lista de personas se llenará dinámicamente -->
                                </ul>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                id="cerrarModal">
                                Cerrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const mostrarPersonasBtn = document.getElementById('mostrarPersonas');
                    const modal = document.getElementById('personasModal');
                    const cerrarModalBtn = document.getElementById('cerrarModal');
                    const listaPersonas = document.getElementById('listaPersonas');

                    mostrarPersonasBtn.addEventListener('click', function() {
                        fetch('/personas-con-reclamos')
                            .then(response => response.json())
                            .then(data => {
                                listaPersonas.innerHTML = '';
                                data.forEach(persona => {
                                    const li = document.createElement('li');
                                    li.className = 'py-4 flex cursor-pointer hover:bg-gray-100';
                                    li.innerHTML = `
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">${persona.nombre}</p>
                                            <p class="text-sm text-gray-500">Cédula: ${persona.cedula}</p>
                                        </div>
                                    `;
                                    li.addEventListener('click', function() {
                                        document.getElementById('nombre').value = persona
                                        .nombre;
                                        document.getElementById('cedula').value = persona
                                        .cedula;
                                        document.querySelector('select[name="id_matricula"]')
                                            .value = persona.id_matricula;
                                        document.querySelector('select[name="id_seccion"]')
                                            .value = persona.id_seccion;
                                        modal.classList.add('hidden');
                                    });
                                    listaPersonas.appendChild(li);
                                });
                                modal.classList.remove('hidden');
                            })
                            .catch(error => console.error('Error:', error));
                    });

                    cerrarModalBtn.addEventListener('click', function() {
                        modal.classList.add('hidden');
                    });
                });
            </script>

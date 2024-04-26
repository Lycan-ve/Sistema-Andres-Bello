<x-app-layout>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <!-- Card Usuario -->

                    <div class="grid grid-cols-4 grid-rows-1 gap-4">
                        <div class="col-span-2 col-start-2">
                            <a class="flex justify-center p-3 bg-white border border-gray-300 rounded-lg">
                                <span>
                                    <h5 class="text-4xl text-center font-bold tracking-tight text-gray-900 dark:text-white">Bienvenido - {{ auth()->user()->getRoleNames()[0]}}</h5>
                                    <p class="mt-2 font-normal text-gray-700 dark:text-gray-400 text-center text-4xl">
                                            {{ auth()->user()->name}}
                                    </p>
                                </span>
                            </a>
                            </div>
                        </div>
                    </div>

                    <!-- Timeline de Procesos -->

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <ol class="border-l border-neutral-300 dark:border-neutral-500">

                        <!--First item-->
                        <li>
                            <div class="flex-start flex items-center pt-3">
                            <div
                                class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-neutral-300 dark:bg-neutral-500"></div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-300">
                                01.07.2021
                            </p>
                            </div>
                            <div class="mb-6 ml-4 mt-2">
                            <h4 class="mb-1.5 text-xl font-semibold">Title of section 1</h4>
                            <p class="mb-3 text-neutral-500 dark:text-neutral-300">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                                scelerisque diam non nisi semper, et elementum lorem ornare.
                                Maecenas placerat facilisis mollis. Duis sagittis ligula in
                                sodales vehicula.
                            </p>
                            </div>
                        </li>

                        <!--Second item-->
                        <li>
                            <div class="flex-start flex items-center pt-2">
                            <div
                                class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-neutral-300 dark:bg-neutral-500"></div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-300">
                                13.09.2021
                            </p>
                            </div>
                            <div class="mb-6 ml-4 mt-2">
                            <h4 class="mb-1.5 text-xl font-semibold">Title of section 2</h4>
                            <p class="mb-3 text-neutral-500 dark:text-neutral-300">
                                Libero expedita explicabo eius fugiat quia aspernatur autem
                                laudantium error architecto recusandae natus sapiente sit nam
                                eaque, consectetur porro molestiae ipsam an deleniti.
                            </p>
                            </div>
                        </li>

                        <!--Third item-->
                        <li>
                            <div class="flex-start flex items-center pt-2">
                            <div
                                class="-ml-[5px] mr-3 h-[9px] w-[9px] rounded-full bg-neutral-300 dark:bg-neutral-500"></div>
                            <p class="text-sm text-neutral-500 dark:text-neutral-300">
                                25.11.2021
                            </p>
                            </div>
                            <div class="ml-4 mt-2 pb-5">
                            <h4 class="mb-1.5 text-xl font-semibold">Title of section 3</h4>
                            <p class="mb-3 text-neutral-500 dark:text-neutral-300">
                                Voluptatibus temporibus esse illum eum aspernatur, fugiat suscipit
                                natus! Eum corporis illum nihil officiis tempore. Excepturi illo
                                natus libero sit doloremque, laborum molestias rerum pariatur quam
                                ipsam necessitatibus incidunt, explicabo.
                            </p>
                            </div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- <a class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow ">
<h5 class="mb-2 text-2xl font-bold tracking-tight text-center text-gray-900 dark:text-white">USUARIO</h5>
<p class="font-normal text-center text-gray-700 dark:text-gray-400">ADMINISTRADOR</p>
</a> -->

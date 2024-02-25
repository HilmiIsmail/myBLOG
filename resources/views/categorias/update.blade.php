<x-app-layout>
    <x-principal>
        <div class="flex justify-center items-center ">
            <div class="w-full max-w-md bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Editar Categoría</h2>
                    <form method="POST" action="{{ route('categories.update', $category) }}">
                        @csrf
                        @method('PUT')
                        {{-- NOMBRE --}}
                        <div class="mb-4">
                            <label for="nombre"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nombre</label>
                            <input type="text" id="nombre" value="{{ old('nombre', $category->nombre) }}"
                                class="appearance-none w-full bg-gray-100 border border-gray-300 text-gray-700 rounded-lg py-2 px-4 focus:outline-none focus:bg-white focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:bg-gray-900"
                                placeholder="Ingrese el nombre de la categoría..." name="nombre">
                            <x-input-error for="nombre" />
                        </div>

                        {{-- COLOR --}}
                        <div class="mb-4">
                            <label for="color"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Color</label>
                            <input type="color" id="color" value="{{ old('color', $category->color) }}"
                                class="h-8 w-full bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500"
                                name="color">
                        </div>

                        {{-- BOTONES --}}
                        <div class="flex justify-end">
                            <button type="submit"
                                class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                <i class="fas fa-save text-md mr-2"></i> Guardar
                            </button>
                            <a href="{{ route('categories.index') }}"
                                class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                <i class="fas fa-times-circle text-md mr-2"></i> Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-principal>
</x-app-layout>

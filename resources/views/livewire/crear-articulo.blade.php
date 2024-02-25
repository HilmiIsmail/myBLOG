<div>
    <div>
        <button wire:click="$set('openCrear', true)"
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            <i class="fas fa-add mr-2"></i>NUEVO
        </button>
    </div>
    <x-dialog-modal wire:model='openCrear' class="bg-white rounded-lg shadow-xl">
        <x-slot name="title" class="text-lg font-bold text-gray-900">
            NUEVO ARTÍCULO
        </x-slot>
        <x-slot name="content">
            {{-- TITULO --}}
            <div class="mb-4">
                <label for="titulo" class="block text-sm font-medium text-gray-700">Título del Artículo</label>
                <input id="titulo" type="text" placeholder="Título..." wire:model="titulo"
                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                <x-input-error for="titulo" />
            </div>

            {{-- CONTENIDO --}}
            <div class="mb-4">
                <label for="contenido" class="block text-sm font-medium text-gray-700">Contenido del Artículo</label>
                <textarea id="contenido" rows="4" placeholder="Contenido..." wire:model="contenido"
                    class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                <x-input-error for="contenido" />
            </div>

            {{-- CATEGORIA --}}
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría del Artículo</label>
                <select id="category_id" wire:model="category_id"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    <option value="">Selecciona una categoría</option>
                    @foreach ($misCategorias as $item)
                        <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                    @endforeach
                </select>
                <x-input-error for="category_id" />
            </div>

            {{-- ESTADO --}}
            <div class="mb-4 flex items-center">
                <input id="estado1" type="checkbox" value="PUBLICADO" wire:model="estado"
                    class="w-4 h-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="estado1" class="ml-2 text-sm font-medium text-gray-700">Publicar artículo</label>
            </div>

            {{-- IMAGEN --}}
            <div class="mb-4">
                <label for="imagen1" class="block text-sm font-medium text-gray-700">Imagen del artículo</label>
                <div class="relative w-full h-96 ">
                    <input type="file" accept="image/*" id="imagen1" hidden wire:model="imagen" />
                    <div class="bg-gray-200 h-full w-full rounded-md flex justify-center items-center">
                        @if ($imagen)
                            <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen del artículo" class="h-full w-full">
                        @else
                            <span class="text-gray-500">Selecciona una imagen</span>
                        @endif
                    </div>
                    <label for="imagen1"
                        class="absolute bottom-2 right-2 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                        <i class="fa-solid fa-cloud-arrow-up mr-1"></i>Upload</label>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer" class="flex justify-end">
            <button wire:click="store"
                class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                <i class="fas fa-save mr-1"></i> GUARDAR
            </button>
            <button wire:click="limpiarCrear"
                class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                <i class="fas fa-times mr-1"></i> CANCELAR
            </button>
        </x-slot>
    </x-dialog-modal>

</div>

<x-principal>
    <div class="flex w-full mb-2 items-center justify-between">
        {{-- BUSQUEDA --}}
        <div class="flex-1 w-3/4">
            <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-3/4 mr-1"
                type="search" placeholder="Buscar ..." wire:model.live="search">
            <i class="fas fa-search"></i>
        </div>

        {{-- MODAL CREAR --}}
        <div class="flex items-center justify-between space-x-4">
            <button wire:click="$set('openModalLikes', true)"
                class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5  me-2 mb-2">
                <i class="fa-solid fa-heart mr-2"></i>
                Ver Mis Likes
            </button>
            @livewire('crear-articulo')
        </div>
    </div>
    @if (count($articulos))
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-center">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500">
                            INFOS
                        </th>
                        <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500">
                            IMAGEN
                        </th>
                        <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 cursor-pointer"
                            wire:click="ordenar('titulo')">
                            <i class="fa-solid fa-sort mr-2"></i>TITULO
                        </th>
                        <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 cursor-pointer"
                            wire:click="ordenar('nombre')">
                            <i class="fa-solid fa-sort mr-2"></i>CATEGORIA
                        </th>
                        <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 cursor-pointer"
                            wire:click="ordenar('estado')">
                            <i class="fa-solid fa-sort mr-2"></i>ESTADO
                        </th>
                        <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500">
                            ACCIONES
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($articulos as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <a href="{{ route('articles.show', $item->id_art) }}">
                                    <i class="fas fa-info-circle text-xl text-blue-400 hover:text-blue-500"></i>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img class="w-16 h-16 rounded-full" src="{{ Storage::url($item->imagen) }}"
                                    alt="{{ $item->titulo }}">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $item->titulo }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <div style="background-color: {{ $item->color }}"
                                    class="inline-block rounded-full px-3 py-1 text-sm font-semibold opacity-60">
                                    {{ $item->nombre }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <div @class([
                                    'inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium cursor-pointer',
                                    'bg-green-100 text-green-800' => $item->estado == 'PUBLICADO',
                                    'bg-red-100 text-red-800' => $item->estado == 'BORRADOR',
                                ]) wire:click="cambiarEstado({{ $item->id_art }})">
                                    {{ $item->estado }}
                                </div>
                            </td>
                            <td
                                class="px-6
                                        py-4 whitespace-nowrap text-sm font-medium">
                                <button wire:click="editar({{ $item->id_art }})"
                                    class="text-blue-500 hover:text-blue-700 mr-2">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button wire:click="pedirPermisoBorrar({{ $item->id_art }})"
                                    class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $articulos->links() }}
        </div>
    @else
        <p class="p-4 bg-zinc-500 text-white rounded-lg text-xl"><i class="fa-solid fa-heart-crack text-xl mr-2"></i>No
            hay
            ningún artículo</p>
    @endif

    {{-- MODAL LIKES --}}
    <x-dialog-modal wire:model='openModalLikes' class="bg-white p-6 rounded-lg shadow-xl">
        <x-slot name="title" class="text-lg font-bold">
            MIS LIKES
        </x-slot>
        <x-slot name="content">
            @foreach ($misLikes as $item)
                <div class="flex justify-between items-center border-b py-2">
                    <p class="text-gray-800">{{ $item->titulo }}</p>
                    <p class="text-gray-600">{{ $item->user->email }}</p>
                </div>
            @endforeach
        </x-slot>
        <x-slot name="footer" class="flex justify-end">
            <button wire:click="closeModalLikes"
                class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                <i class="fas fa-times mr-2"></i> CANCELAR
            </button>
        </x-slot>
    </x-dialog-modal>
    {{-- FIN MODAL LIKES --}}

    {{-- MODAL UPDATE --}}
    <x-dialog-modal wire:model='openUpdate'>
        <x-slot name="title">
            NUEVO ARTÍCULO
        </x-slot>
        <x-slot name="content">
            {{-- TITULO --}}
            <label class="block font-medium text-sm text-gray-700" for="titulo">
                Título del Artículo
            </label>
            <input
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mb-2"
                id="titulo" placeholder="Título..." wire:model="form.titulo">
            <x-input-error for="form.titulo" />


            {{-- CONTENIDO --}}
            <label class="block font-medium text-sm text-gray-700" for="contenido">
                Contenido del Artículo
            </label>
            <textarea rows='4' class="w-full rounded mb-2" placeholder="Contenido..." wire:model="form.contenido"></textarea>
            <x-input-error for="form.contenido" />


            {{-- CATEGORIA --}}
            <label class="block font-medium text-sm text-gray-700" for="category_id">
                Categoria del Artículo
            </label>
            <select class="w-full rounded mb-2" id="category_id" wire:model="form.category_id">
                <option>Selecciona una categoría</option>
                @foreach ($misCategorias as $item)
                    <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                @endforeach
            </select>
            <x-input-error for="form.category_id" />

            {{-- ESTADO --}}
            <label class="block font-medium text-sm text-gray-700" for="estado1">
                Publicar artículo
            </label>
            <div class="flex items-center mb-2">
                <input id="estado1" type="checkbox" value="PUBLICADO" wire:model="form.estado"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-100 dark:border-gray-600">
                <label for="estado1" class="ms-2 text-sm font-medium text-gray-700">Publicar</label>
            </div>


            {{-- IMAGEN --}}
            <label class="block font-medium text-sm text-gray-700" for="imagenU">
                Imagen del artículo
            </label>
            <div class="w-full h-96  rounded relative bg-gray-200">
                <input type="file" accept="image/*" id="imagenU" hidden wire:model="imagen" />
                @if ($form->imagen)
                    <img class="h-full w-full" src="{{ Storage::url($form->imagen) }}" />
                @endif
                <label for="imagenU"
                    class="absolute bottom-2 right-2 bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fa-solid fa-cloud-arrow-up mr-1"></i>Upload</label>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row-reverse">
                <button wire:click="store"
                    class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    <i class="fas fa-save"></i> EDITAR
                </button>

                <button wire:click="limpiarCrear"
                    class="text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    <i class="fas fa-xmark"></i> CANCELAR
                </button>
            </div>
        </x-slot>
    </x-dialog-modal>
    {{-- FIN MODAL UPDATE --}}
</x-principal>

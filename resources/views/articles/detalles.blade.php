<x-app-layout>
    <x-principal>
        <div class="max-w-4xl mx-auto">
            <img class="w-full h-4/5 object-cover rounded-lg mb-8" src="{{ Storage::url($articulo->imagen) }}"
                alt="{{ $articulo->titulo }}" />

            <div class="px-4">
                <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $articulo->titulo }}</h2>
                <blockquote class="mb-4 border-l-4 border-blue-500 pl-4 italic text-lg text-gray-900 dark:text-white">
                    <p class="mb-2">{{ $articulo->contenido }}</p>
                    <footer class="text-xs text-gray-600 dark:text-gray-400">Artículo por <span
                            class="text-blue-500">{{ $articulo->user->name }}</span>
                    </footer>
                </blockquote>

                <div class="flex items-center mb-4">
                    {{-- <span class="text-sm text-gray-700 dark:text-gray-400 font-semibold">Por:</span> --}}
                    <span class="ml-2 flex items-center">
                        <span
                            class="rounded-full overflow-hidden w-8 h-8 flex items-center justify-center bg-blue-100 text-blue-500">
                            <i class="far fa-user"></i>
                        </span>
                        <span class="ml-2 italic text-blue-500 dark:text-green-200">{{ $articulo->user->name }}</span>
                    </span>
                </div>

                <div class="flex items-center mb-4">
                    <span class="text-sm text-gray-700 dark:text-gray-400 font-semibold">Categoría:</span>
                    <span class="ml-2 px-2 py-1 rounded text-sm text-white"
                        style="background-color:{{ $articulo->category->color }}">{{ $articulo->category->nombre }}</span>
                </div>

                <div class="flex items-center mb-4">
                    <span class="text-sm text-gray-700 dark:text-gray-400 font-semibold">Creado:</span>
                    <span
                        class="ml-2  text-blue-400 dark:text-blue-200">{{ $articulo->created_at->diffForHumans() }}</span>
                </div>

                <div class="flex items-center mb-4">
                    <span class="text-sm text-gray-700 dark:text-gray-400 font-semibold">Estado:</span>
                    <span @class([
                        'ml-2 font-bold',
                        'text-green-600 dark:text-green-300' => $articulo->estado == 'PUBLICADO',
                        'text-red-600 dark:text-red-300 line-through' =>
                            $articulo->estado == 'BORRADOR',
                    ])>{{ $articulo->estado }}</span>
                </div>

                <div class="flex items-center mb-4">
                    <span class="text-sm text-gray-700 dark:text-gray-400 font-semibold">Total Likes:</span>
                    <span class="ml-2">{{ $articulo->usersLike->count() }}</span>
                    <i class="fa-solid fa-heart text-red-500 hover:text-red-300 ms-1"></i>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Usuarios que han dado like:
                    </h3>
                    <ul class="list-disc list-inside">
                        @foreach ($articulo->usersLike as $user)
                            <li class="flex items-center text-sm text-blue-500 dark:text-blue-300 mb-2">
                                <span
                                    class="rounded-full overflow-hidden w-6 h-6 flex items-center justify-center bg-blue-100 text-blue-500">
                                    <i class="far fa-heart"></i>
                                </span>
                                <span class="ml-2">{{ $user->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="flex justify-end">
                    <button type="button" onclick="history.go(-1)"
                        class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                        <i class="fa-solid fa-backward mr-2"></i>Volver
                    </button>
                </div>
            </div>
        </div>
    </x-principal>
</x-app-layout>

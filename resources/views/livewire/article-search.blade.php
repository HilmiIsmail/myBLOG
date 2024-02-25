<div>
    <div class="flex items-center justify-center mb-6">
        <div class="relative w-full max-w-lg">
            <input wire:model.live="search"
                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                type="search" placeholder="Buscar por título...">
            <div class="absolute top-0 left-0 flex items-center h-full ml-3">
                <i class="fas fa-search text-gray-400"></i>
            </div>
        </div>
    </div>
    {{-- Resultados de la búsqueda --}}
    @if ($misArticulos->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($misArticulos as $articulo)
                <article @class([
                    'relative rounded-lg overflow-hidden bg-gray-100 shadow-md hover:shadow-lg',
                    'md:col-span-2' => $loop->first,
                ])>
                    <a href="{{ route('articles.show', $articulo->id) }}">
                        <img class="w-full h-72 object-cover object-center" src="{{ Storage::url($articulo->imagen) }}"
                            alt="{{ $articulo->titulo }}">
                    </a>
                    <div class="p-4">
                        <a href="{{ route('articles.show', $articulo->id) }}">
                            <h2 class="text-xl font-semibold text-gray-800 truncate">{{ $articulo->titulo }}</h2>
                        </a>
                        <p class="text-sm text-blue-900 italic mb-2">{{ $articulo->user->email }}</p>
                        <div class="flex items-center mb-2">
                            <span class="px-2 py-1 text-xs font-semibold text-white rounded-full"
                                style="background-color: {{ $articulo->category->color }}">
                                {{ $articulo->category->nombre }}
                            </span>
                        </div>
                        <div class="flex items-center justify-between text-sm text-gray-600">
                            <div>
                                <i class="fas fa-heart text-red-500 mr-1"></i>
                                <span>{{ $articulo->usersLike->count() }}</span>
                            </div>
                            @auth
                                <button wire:click="like({{ $articulo->id }})"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded focus:outline-none">
                                    <i class="far fa-thumbs-up"></i> Like
                                </button>
                            @endauth
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $misArticulos->links() }}
        </div>
    @else
        <p class="p-4 bg-zinc-500 text-white rounded-lg text-xl"><i class="fa-solid fa-heart-crack text-xl mr-2"></i>No
            hay
            ningún artículo</p>
    @endif
</div>

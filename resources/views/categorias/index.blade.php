<x-app-layout>
    <x-principal>
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Categorías</h2>
            <a href="{{ route('categories.create') }}"
                class="inline-flex items-center px-4 py-2 bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 text-white font-medium rounded-lg text-sm">
                <i class="fas fa-plus-circle mr-2"></i>
                Nueva Categoría
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">NOMBRE</th>
                        <th scope="col" class="px-6 py-3">COLOR</th>
                        <th scope="col" class="px-6 py-3">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $item)
                        <tr
                            class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-6 py-4 font-medium">{{ $item->id }}</td>
                            <td class="px-6 py-4">{{ $item->nombre }}</td>
                            <td class="px-6 py-4">
                                <div class="w-8 h-8 rounded-full mx-auto" style="background-color:{{ $item->color }}">
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center">
                                    <a href="{{ route('categories.edit', $item) }}"
                                        class="text-blue-500 hover:text-blue-700 text-lg mr-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('categories.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('¿Borrar Categoría?')"
                                            class="text-red-500 hover:text-red-700">
                                            <i class="fas fa-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $categorias->links() }}
        </div>
    </x-principal>
</x-app-layout>

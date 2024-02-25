<x-app-layout>
    <div class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-xl p-8 max-w-3xl w-full">
            <h2
                class="text-3xl text-purple-600 font-bold text-center mb-8  transition duration-700
                transform hover:text-purple-700 hover:scale-110">
                Bienvenido al Dashboard
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Gestionar Categorías -->
                <a href="{{ route('categories.index') }}"
                    class="bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-center p-6 text-white transition duration-300 ease-in-out transform hover:scale-105">
                    <div class="flex justify-center items-center mb-4">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mr-4">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path opacity="0.34"
                                    d="M5 10H7C9 10 10 9 10 7V5C10 3 9 2 7 2H5C3 2 2 3 2 5V7C2 9 3 10 5 10Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M17 10H19C21 10 22 9 22 7V5C22 3 21 2 19 2H17C15 2 14 3 14 5V7C14 9 15 10 17 10Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path opacity="0.34"
                                    d="M17 22H19C21 22 22 21 22 19V17C22 15 21 14 19 14H17C15 14 14 15 14 17V19C14 21 15 22 17 22Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M5 22H7C9 22 10 21 10 19V17C10 15 9 14 7 14H5C3 14 2 15 2 17V19C2 21 3 22 5 22Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </g>
                        </svg>
                        <span class="text-xl">Gestionar Categorías</span>
                    </div>
                    <p class="text-sm">Administra y organiza las categorías de tus artículos aquí.</p>
                </a>
                <!-- Gestionar Posts -->
                <a href="{{ route('articulos.index') }}"
                    class="bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-center p-6 text-white transition duration-300 ease-in-out transform hover:scale-105">
                    <div class="flex justify-center items-center mb-4">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="h-12 w-12 mr-4">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <g opacity="0.4">
                                    <path
                                        d="M13.2 14.4002C13.2 15.4602 12.74 16.4202 12 17.0802C11.36 17.6602 10.52 18.0002 9.59998 18.0002C7.60998 18.0002 6 16.3902 6 14.4002C6 12.7402 7.13002 11.3402 8.65002 10.9302C9.06002 11.9702 9.94999 12.7802 11.05 13.0802C11.35 13.1602 11.67 13.2102 12 13.2102C12.33 13.2102 12.65 13.1702 12.95 13.0802C13.11 13.4802 13.2 13.9302 13.2 14.4002Z"
                                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M15.6003 9.6C15.6003 10.07 15.5103 10.52 15.3503 10.93C14.9403 11.97 14.0504 12.78 12.9504 13.08C12.6504 13.16 12.3304 13.21 12.0004 13.21C11.6704 13.21 11.3504 13.17 11.0504 13.08C9.95035 12.78 9.06039 11.98 8.65039 10.93C8.49039 10.52 8.40039 10.07 8.40039 9.6C8.40039 7.61 10.0104 6 12.0004 6C13.9904 6 15.6003 7.61 15.6003 9.6Z"
                                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M18 14.3999C18 16.3899 16.39 17.9999 14.4 17.9999C13.48 17.9999 12.64 17.6499 12 17.0799C12.74 16.4299 13.2 15.4699 13.2 14.3999C13.2 13.9299 13.11 13.4799 12.95 13.0699C14.05 12.7699 14.94 11.9699 15.35 10.9199C16.87 11.3399 18 12.7399 18 14.3999Z"
                                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                                <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z"
                                    stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </g>
                        </svg>
                        <span class="text-xl">Gestionar Artículos</span>
                    </div>
                    <p class="text-sm">Crea, edita, elimina y ver tus artículos en esta sección.</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

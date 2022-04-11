<div class="p-6 sm:px-20 bg-white border-b border-gray-200">

    <div class="mt-8 text-2xl">
        {{ Auth::user()->name }}
    </div>

    <div class="mt-6 text-gray-500">
        Filme favorito: {{ var_dump(session('user_favorite'))  }}
        Filme favorito: {{ isset($favorite_movie) ? $favorite_movie : "Nenhum filme favorito" }}
    </div>

    <div class="mt-6 text-gray-500">
        Série favorita: {{ isset($favorite_movie) ? $favorite_movie : "Nenhuma série favorita" }}
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">

</div>

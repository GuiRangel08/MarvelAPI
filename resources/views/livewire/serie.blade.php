<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadown overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-150 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-3 bg-gray-150 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nome
                            </th>
                            <th class="px-6 py-3 bg-gray-150 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Temporadas
                            </th>
                            <th class="px-6 py-3 bg-gray-150 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Data de lançamento
                            </th>
                            <th class="px-6 py-3 bg-gray-150 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Favorito
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($series as $serie)
                        <tr>
                            <td class="px-6 py-4 text-sm whitespace-nowrap text-gray-900">
                                {{ $serie['id'] }}
                            </td>
                            <td class="px-6 py-4 text-sm whitespace-nowrap text-gray-900">
                                <div class="text-sm text-gray-900">
                                    {{ $serie['name'] }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm whitespace-nowrap text-gray-900">
                                <div class="text-sm text-gray-900">
                                    {{ $serie['seasons'] }}
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm whitespace-nowrap text-gray-900">
                                <div class="text-sm text-gray-900">{{ $serie['release_date'] }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm whitespace-nowrap text-sm font-medium">
                                <form class="inline-block" action="{{ route('user-favorite-serie') }}" method="post">
                                    <input type="hidden" name="serie_id" value="{{ $serie['id'] }}">
                                    <input type="hidden" name="_method" value="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit"> Selecionar </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
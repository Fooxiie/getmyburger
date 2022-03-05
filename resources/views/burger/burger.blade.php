<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('backoffice.burgers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach(\App\Models\Burger::all() as $burger)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                🍔
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-black">
                                    {{$burger->name}}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    {{$burger->description}}
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-black">
                                {{number_format($burger->price,2)}}
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <a href="{{route('burger.edit', ['id' => $burger->id])}}">✏</a>
                            <a href="{{route('burger.delete')}}">❌</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

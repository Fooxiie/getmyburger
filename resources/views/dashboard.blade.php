<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <a href="{{route('order.resume')}}" class="px-4 py-2 font-semibold text-sm bg-white text-slate-700 flex items-center mx-auto
                                    border border-slate-300 rounded-md shadow-sm mb-8 w-48 text-center">
            Générer la commmande du jour
        </a>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Nombre de commandes : {{\App\Models\Order::getTodayOrders()->count()}}
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Nombre de commandes (total) : {{\App\Models\Order::all()->count()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

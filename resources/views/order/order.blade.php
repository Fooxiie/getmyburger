<x-app-layout>
    <x-slot name="header">
        <h2 class="inline-flex font-semibold text-xl text-gray-800 leading-tight">
            {{ __('backoffice.orders') }}
        </h2>
        @if ($isfiltered)
            <a href="{{route('order.show', array('isfiltered' => false))}}"
               class="inline-flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                </svg>
            </a>
        @else
            <a href="{{route('order.show', array('isfiltered' => true))}}"
               class="inline-flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
        @endif
    </x-slot>

    <div class="py-12">
        <a href="{{route('order.resume')}}" class="px-4 py-2 font-semibold text-sm bg-white text-slate-700 flex items-center mx-auto
                                    border border-slate-300 rounded-md shadow-sm mb-8 w-48 text-center">
            Générer la commmande du jour
        </a>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($orders as $order)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex items-center space-x-4">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p data-tooltip-targer="tooltip-customer"
                                   class="text-sm font-medium text-gray-900 truncate dark:text-black">
                                    {{$order->customer}}
                                </p>
                                <div id="tooltip-customer" role="tooltip"
                                     class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                                    Tooltip content
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                    🍔 <b>{{$order->burger->name}}</b> 🍟 <b>{{$order->fries}}</b> 🥤
                                    <b>{{$order->drink}}</b> 🍗 <b>{{$order->crispy}}</b>
                                </p>
                                @if ($isfiltered)
                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                        📆 {{$order->created_at}}</p>
                                @endif
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-black">
                                {{number_format($order->totalPrice(), 2)}} €
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <a onclick="return confirm('Really nigga ?')"
                               href="{{route('order.delete', ['id' => $order->id])}}">❌</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

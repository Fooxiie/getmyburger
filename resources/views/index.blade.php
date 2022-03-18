<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="w-full bg-gray-800">
            <div class="bg-gradient-to-b from-blue-800 to-blue-600 h-96"></div>
            <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8 mb-12">
                <div class="bg-gray-900 w-full shadow rounded p-8 sm:p-12 -mt-72">
                    <p class="text-3xl font-bold leading-7 text-center text-white">
                        {{__('backoffice.burger_day')}} 🍔</p>
                    <form action="{{route('order.submit')}}" method="post">
                        @csrf
                        <div class="md:flex items-center mt-8">
                            <div class="w-full flex flex-col">
                                <label for="customer"
                                       class="font-semibold leading-none
                                    text-gray-300">{{__('backoffice.firstname')}}</label>
                                <input type="text" name="customer" id="customer" required
                                       class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"/>

                            </div>
                        </div>
                        <div class="md:flex items-center mt-12">
                            <div class="w-full md:w-1/2 flex flex-col">
                                <label for="drink"
                                       class="font-semibold leading-none text-gray-300">{{__('backoffice.drink')}}</label>
                                <select type="text" id="drink" name="drink" required
                                        class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded">
                                    @foreach(\App\Enums\Drinks::asArray() as $drink)
                                        <option>{{$drink}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div
                                class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                                <label for="fries"
                                       class="font-semibold leading-none text-gray-300">{{__('backoffice.nbfries')}}</label>
                                <input type="number" max="5" id="fries" name="fries" required
                                       class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"/>
                            </div>
                            <div
                                class="w-full md:w-1/2 flex flex-col md:ml-6 md:mt-0 mt-4">
                                <label for="crispy"
                                       class="font-semibold leading-none text-gray-300">{{__('backoffice.nbCrispy')}}</label>
                                <input type="number" max="5" id="crispy" name="crispy" required
                                       class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"/>
                            </div>
                        </div>
                        <div class="md:flex items-center mt-10 mb-2">
                            <div class="w-full grid grid-cols-4 gap-4">
                                @php($nbBurger = \App\Models\Burger::all()->count())
                                @foreach(\App\Models\Burger::all() as $burger)
                                    <div class="mt-4">
                                        <input required type="radio" id="burger{{$burger->id}}" name="burger"
                                               value="{{$burger->id}}"/>
                                        <label class="text-gray-200" for="burger{{$burger->id}}"
                                               class="font-semibold leading-none text-gray-300">🍔 {{$burger->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <button
                                class="mt-9 font-semibold leading-none text-white py-4 px-10 bg-blue-700 rounded hover:bg-blue-600 focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                                {{__('actions.submit')}} 🤑
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

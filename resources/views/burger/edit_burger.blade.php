<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('backoffice.burgers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{route('burger.edit_submit', array('id' => $burger->id))}}" method="post">
                @csrf
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <h1 style="margin-bottom: 0.5em;" class="text-xl font-bold">{{__('actions.editing')}}</h1>
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="name"
                                       class="block text-sm font-medium text-gray-700">{{__('backoffice.burger_name')}}</label>
                                <input type="text" name="name" id="name" value="{{$burger->name}}"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="price"
                                       class="block text-sm font-medium text-gray-700">{{__('backoffice.burger_price')}}</label>
                                <input type="text" name="price" id="price" value="{{number_format($burger->price, 2)}}"
                                       class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="description"
                                       class="block text-sm font-medium text-gray-700">{{__('backoffice.burger_description')}}</label>
                                <textarea type="text" name="description" id="description"
                                          class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$burger->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-xs text-right sm:px-6">
                        <p class="inline-flex text-gray-300">{{__('backoffice.created_at')}} : {{$burger->created_at}} | {{__('backoffice.updated_at')}} : {{$burger->updated_at}}</p>
                        <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">{{__('actions.save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

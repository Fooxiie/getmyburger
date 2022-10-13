<x-guest-layout>
    <div class="text-center text-gray-200 flex items-top justify-center
    min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div id="ticket" class="bg-gray-100 text-gray-700 px-10 mt-3"
             style="font-family: Consolas,sans-serif;padding: 2em;">
            <a style="float: right" href="#" onclick="window.print()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
            </a>
            {{__('backoffice.cmd_passed')}} : {{$order->customer}}
            <div style="margin-top: 10px;margin-bottom: 30px;" class="text-right">
                <label>{{__('backoffice.cmd_nb')}} : #{{$order->id}}</label>
                <hr/>
                <ul>
                    <li>{{$order->burger->name}} : <b>{{number_format($order->burger->price, 2)}}€</b></li>
                    <li>{{$order->fries}} {{__('backoffice.fries')}} :
                        <b>{{number_format($order->fries * 3, 2)}}
                            €</b></li>
                    <li>{{$order->crispy}} {{__('backoffice.crispy')}} :
                        <b>{{number_format($order->crispy * 5.50, 2)}}
                            €</b></li>
                    <li>{{$order->drink}} : <b>0.00€</b></li>
                </ul>
                <hr style="margin-top: 10px;"/>
                {{__('backoffice.total')}} <b>{{number_format($order->totalPrice(), 2)}}€</b>
            </div>
            {{__('backoffice.cmd_thx')}}
        </div>
    </div>
</x-guest-layout>

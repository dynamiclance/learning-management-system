<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Invoice') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:invoice-edit :invoice_id="$invoice->id" />

                    
                    @if($invoice->amount()['due'] > 0)
                    <div class="payment-form">
                        <h2 class="font-bold text-2xl mb-2">Add a Payment</h2>
                        <form action="{{route('stripe-payment')}}" method="post"> @csrf
                            <div class="flex">

                                <div class="w-full">
                                    <input value="4242424242424242" type="number" class="lms-input" name="card_number" placeholder="Type Card Number">
                                </div>

                                <div class="min-w-max ml-4">
                                    <input value="12/23" type="text" class="lms-input" name="card_expiry_date" placeholder="Expiry Month/Year">
                                </div>

                                <div class="min-w-max ml-4">
                                    <input value="4334" type="text" class="lms-input" name="card_cvc" placeholder="CCV">
                                </div>

                                <div class="min-w-max ml-4">
                                    <input type="text" value="${{number_format($invoice->amount()['due'], 2)}}" class="lms-input" name="amount" placeholder="amount">
                                </div>

                                <input type="hidden" name="invoice_id" value="{{$invoice->id}}">
        
                            </div>
    
                            <button type="submit" class="lms-btn mt-3">Pay Now</button>
    
                        </form>

                    </div>

                    @else

                    <h2> - No More Payments Available</h2>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
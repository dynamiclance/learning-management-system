<div>
    <table class="w-full table-auto">
        <tr class="bg-slate-700 text-white">
            <th class="border px-4 py-2 text-left">Id</th>
            <th class="border px-4 py-2 text-left">User</th>
            <th class="border px-4 py-2 text-left">Due Date</th>
            <th class="border px-4 py-2">Amount</th>
            <th class="border px-4 py-2">Paid</th>
            <th class="border px-4 py-2">Due</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach($invoices as $invoice)
        <tr>
            <td class="border px-4 py-2">{{$invoice->id}}</td>
            <td class="border px-4 py-2">{{$invoice->user->name}}</td>
            <td class="border px-4 py-2 text-center">{{date('F j, Y', strtotime($invoice->due_date))}}</td>
            <td class="border px-4 py-2">${{$invoice->amount()['total']}}</td>
            <td class="border px-4 py-2">${{$invoice->amount()['paid']}}</td>
            <td class="border px-4 py-2">${{$invoice->amount()['due']}}</td>
            <td class="border px-4 py-2 text-center">
                <div class="flex items-center justify-center">
                    <a class="mr-1 text-red-700" href="">
                        @include('components.icons.edit')
                    </a>

                    <a class="mr-1 text-red-700" href="{{route('invoice.show', $invoice->id)}}">
                        @include('components.icons.show')
                    </a>

                    <form class="ml-1 text-red-700" onsubmit="return confirm('Are you sure?');"
                        wire:submit.prevent="invoiceDelete({{$invoice->id}})">
                        <button type="submit">
                            @include('components.icons.delete')
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    {{--
    <div class="mt-4">
        {{$inovice->links()}}
    </div> --}}
</div>



{{-- <div>
    @foreach ($invoices as $invoice)
    <div>{{$invoice->id}}</div>
    <div>{{$invoice->user->name}}</div>
    @endforeach
</div> --}}
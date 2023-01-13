<div>
    <h2 class="text-center font-bold text-4xl mb-4">Single Invoice Details</h2>

    <table class="w-full table-auto">
        <tr class="bg-slate-700 text-white">
            <th class="border px-3 py-2">User Name</th>
            <th class="border px-3 py-2">Course Info</th>
            <th class="border px-3 py-2">Price</th>
            <th class="border px-3 py-2">Print</th>
        </tr>

        <tr>
            <td class="border px-3 py-2">{{$invoice->user->name}}</td>
            <td class="border px-3 py-2">
                <div>
                    <li>{{$courseItem->name}}</li>
                    <li>Qantity: {{$courseItem->quantity}}</li>
                    <li>Course Enroll Date: {{date('F j, Y', strtotime($courseItem->created_at))}}</li>
                </div>
            </td>
            <td class="border px-3 py-2">${{$courseItem->price}}</td>
            <td class="border px-3 py-2">
               <div class="flex justify-center">

                <a href="printDetails({{$invoice->id})">
                    @include('components.icons.print')
                </a>

                {{-- <form class="ml-1"  wire:submit="printDetails({{$invoice->id}})">
                    <button type="submit">
                        @include('components.icons.print')
                    </button>
                </form> --}}
             
               </div>
            </td>
        </tr>
    
    </table>
</div>

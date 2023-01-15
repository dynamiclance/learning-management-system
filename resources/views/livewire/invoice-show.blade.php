<div>
    <h2 class="text-center font-bold text-4xl mb-4">Single Invoice Details</h2>

    <table class="w-full table-auto">
        <tr class="bg-slate-700 text-white">
            <th class="border px-3 py-2">User Name</th>
            <th class="border px-3 py-2">Course Info</th>
            <th class="border px-3 py-2">Price</th>
        </tr>

        <tr>
            <td class="border px-3 py-2">{{$invoice->user->name}}</td>


            <td class="border px-3 py-2">
                @foreach ($invoice->items as $item)
                <div class="py-2">
                    <li>{{$item->name}}</li>
                    <li>Qantity: {{$item->quantity}}</li>
                    <li>Course Enroll Date: {{date('F j, Y', strtotime($item->created_at))}}</li>
                </div>
               <hr class="border-2">
                @endforeach

            </td>

            <td class="border px-3 py-2 text-center"> ${{number_format($invoice->amount()['total'], 2)}}</td>
          
        
        </tr>
    
    </table>
</div>

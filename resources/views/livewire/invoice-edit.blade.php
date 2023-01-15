<div>
    
    <div class="user-container flex justify-between p-4 py-4 mb-4">
       <div class="user-info">
            <h2 class="font-bold text-2xl">Seller Info</h2>
            <p>Name: {{$invoice->user->name}}</p>
            <p>Email: {{$invoice->user->email}}</p>
       </div>

       <div class="download-invoice-info">
        <h4 class="font-bold">Download Invoice</h4>
        <div class="flex justify-center">
            <a class="lms-btn" href="#">
                @include("components.icons.print")
            </a>
        </div>
       </div>
    </div>

    <div class="invoice-details flex gap-4">
        <div class="invoice-items w-3/4 bg-cyan-700 p-3 shadow-lg rounded">
            <div class="single-invoice-item ">
               <div class="single-invoice-heading bg-purple-800 text-white text-center py-2 p-4 my-4 grid grid-cols-5">
                    <h4>Name</h4>
                    <h4>Price</h4>
                    <h4>Quantity</h4>
                    <h4>Total</h4>
                    <h4>Action</h4>
               </div>
              
                    @foreach ($invoice->items as $item )
                    <div class="single-invoice-item-content text-center grid grid-cols-5 py-4 p-4 bg-slate-300 my-2">
                        <div>{{$item->name}}</div>
                        <div>${{$item->price}}</div>
                        <div>{{$item->quantity}}</div>
                        <div>{{number_format($item->price * $item->quantity)}}</div>
                        <div class="flex justify-center">
                        <form class="ml-1 font-bold text-blue-700" onsubmit="return confirm('Are you sure?');"
                            wire:submit.prevent="invoiceItemDelete({{$item->id}})">
                            <button type="submit">
                                @include('components.icons.delete')
                            </button>
                        </form>
                        </div>
                    </div>
                    @endforeach
               
            </div>




        <h2 class="font-bold text-2xl py-4">Add New item</h2>

        @if($isAddItem)
        <form wire:submit.prevent = "saveNewItem">
            <div class="flex mb-4 gap-2">
             <div class="w-full">
                 @include("components.form-field", [
                     'name' => 'name',
                     'label' => 'Name',
                     'type' => 'text',
                     'placeholder' => 'Enter Item name',
                     'required' => 'required',
 
                     
                 ])
             </div>
 
             <div class="min-w-max">
                 @include("components.form-field", [
                     'name' => 'price',
                     'label' => 'price',
                     'type' => 'number',
                     'placeholder' => 'Enter Price',
                     'required' => 'required',
                 ])
             </div>
 
             <div class="min-w-max">
                 @include("components.form-field", [
                     'name' => 'quantity',
                     'label' => 'Name',
                     'type' => 'number',
                     'placeholder' => 'Enter Quantity',
                     'required' => 'required',
                 ])
             </div>
            </div>

            <div class="flex gap-4">
                @include('components.wire-loading-btn')
                <button wire:click="addNewItem" type="button">Cancel</button>
            </div>

         </form>
        @else
         <button wire:click="addNewItem" class="underline" type="button">Add</button>

        @endif

        </div>

        <div class="invoice-total text-center w-4/12 bg-blue-300 py-3">
            <h2 class="text-center font-bold text-3xl">Total Cost</h2>
            
            @foreach ($invoice->items as $item)
            <div class="flex items-center justify-center py-3">
                <p class="text-justify">{{$item->id}}</p>.
                <p class="text-justify">{{$item->name}} - ${{$item->price * $item->quantity }}</p>
            </div>
            @endforeach
            <hr>

           <h2 class="mt-2 font-bold text-2xl">Sub Total:  ${{number_format($invoice->amount()['total'], 2)}}</h2>




                
        </div>
    </div>
</div>

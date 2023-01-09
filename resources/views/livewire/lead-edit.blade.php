<div>
    <form wire:submit.prevent="submitForm" class="mb-6">

        <div class="mb-4">
            <label for="" class="lms-label">Name</label>
            <input wire:model="name" type="
        text" class="lms-input">

            @error('name')
            <div class="text-red-500 text-sm">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="" class="lms-label">Emaill</label>
            <input wire:model="email" type="
        text" class="lms-input">

            @error('email')
            <div class="text-red-500 text-sm">{{$message}}</div>
            @enderror
        </div>
        <div class="mb-4">
            <label for="" class="lms-label">Phone</label>
            <input wire:model="phone" type="
        tel" class="lms-input">

            @error('phone')
            <div class="text-red-500 text-sm">{{$message}}</div>
            @enderror
        </div>

        <!-- <button type="submit" class="lms-btn">Submit</button> -->


        @include('components.wire-loading-btn')


    </form>

    <h2 class="mb-4">All Notes</h2>

    @foreach($notes as $note)
    <div class="mb-4 border border-gray-100 p-4 shadow-lg">
        <div class="flex items-center">
             <div class="font-bold mr-2">{{$note->id}}</div> 
            <div>{{$note->description}}</div>
        </div>

    </div>
    @endforeach



    <h4 class="font-semibold bg-slate-400 text-center py-4 mb-2 text-white text-3xl">Add new Note</h4>

    <form wire:submit.prevent="addNote">
        <div class="mb-5">
            <textarea wire:model.lazy="note" placeholder="Add Note" name="" id="" class="lms-input"></textarea>
        </div>

        <button type="submit" class="lms-btn">Submit</button>
    </form>



</div>
<div>

    <form class="p-4" wire:submit.prevent="UpdateQuiz">
            <div class="mb-4">
                @include("components.form-field", [
                    'name' => 'name',
                    'label' => 'name',
                    'type' => 'text',
                    'placeholder' => 'Enter name',
                    'required' => 'required',
                ])
        </div>

       <button class="lms-btn" type="submit">Update</button>
    </form>


    <form class="mb-2" wire:submit.prevent="addQuestion">
        <div class="min-w-max ml-3">
            <label for="question" class="block mb-2 text-sm font-medium text-gray-900">Add Question</label>
            <select wire:model="question" id="question" class="rounded-md w-full shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="#">Select</option>
                @foreach($questions as $question)
                    <option value="{{$question->id}}">{{$question->name}}</option>
                @endforeach
            </select>
        </div>

        <button class="lms-btn mt-2 ml-2" type="submit">Add</button>

    </form>


    <div class="questions-container p-4">
        <table class="w-full table-auto">
            <tr>
                <th class="border px-2 py-3 text-left">Name</th>
                <th class="border px-2 py-3">Action</th>
            </tr>
            @foreach ($quiz->questions as $question)
            <tr>

                <td class="border px-2 py-3">{{$question->name}}</td>
                <td class="border px-2 py-3">
                    <div class="flex gap-2 justify-center">
                        <form onsubmit="return confirm('Are you sure?');" wire:submit.prevent="questionDelete({{$question->id}})">
                           <button type="submit">
                             @include('components.icons.delete')
                           </button>
                        </form>
                    </div>
                </td>
               
            </tr>
            @endforeach
        </table>
        
    </div>

</div>

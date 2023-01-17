<div class="question-cotainer">

   <table class="w-full table-auto">

    <tr class="bg-blue-300">
        <th class="border px-2 py-3 text-left">Q. Name</th>
        <th class="border px-2 py-3 text-left">Answer a</th>
        <th class="border px-2 py- text-left">Answer b</th>
        <th class="border px-2 py-3 text-left">Answer C</th>
        <th class="border px-2 py-3 text-left">Answer d</th>
        <th class="border px-2 py-3 text-center">Correct Answer</th>
        <th class="border px-2 py-3 text-right">Action</th>
    </tr>


    @foreach ($questions as $question)
        <tr>
            <td class="border px-2 py- text-left">{{$question->name}}</td>
            <td class="border px-2 py-3 text-left">{{$question->answer_a}}</td>
            <td class="border px-2 py-3 text-left">{{$question->answer_b}}</td>
            <td class="border px-2 py- text-left">{{$question->answer_c}}</td>
            <td class="border px-2 py- text-left">{{$question->answer_d}}</td>
            <td class="border px-2 py- text-center">{{$question->correct_answer}}</td>
            <td class="border px-2 py-3 text-left">
                <div class="flex items-center justify-center">
                    <a href="{{route('question.edit', $question->id)}}">
                        @include('components.icons.edit')
                    </a>
                    <form onsubmit="return confirm('Are you sure?');" wire:submit.prevent="QuestionDelete({{ $question->id }})">
                       <button type="submit">
                               @include('components.icons.delete')
                       </button>
                   </form>
            </td>

      </tr>
    @endforeach  
   </table>

</div>

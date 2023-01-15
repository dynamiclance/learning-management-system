<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-2 py-3 text-left">Name</th>
            <th class="border px-2 py-3 text-center">Action</th>
        </tr>

        @foreach($quizzes as $quizz)
        <tr>
            <td class="border px-2 py-3 text-left">{{$quizz->name}}</td>
            <td class="border px-2 py-3 text-left">
                <div class="flex items-center justify-center">
                    <a class="mr-1 font-bold text-blue-700" href="{{route('quiz.edit', $quizz->id)}}">
                        @include('components.icons.edit')
                    </a>

                    <a class="mr-1 font-bold text-blue-700" href="{{route('quiz.show', $quizz->id)}}">
                        @include('components.icons.show')
                    </a>

                    <form class="ml-1 font-bold text-blue-700" onsubmit="return confirm('Are you sure to Delete?');"
                        wire:submit.prevent="QuizDelete({{$quizz->id}})">
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

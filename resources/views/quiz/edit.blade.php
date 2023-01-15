<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Quiz') }}
            </h2>

           
            <a class="lms-btn mr-4" href="{{route('quiz.index')}}">Back To All Quiz</a>
           
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:quiz-edit :quiz='$quiz'/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
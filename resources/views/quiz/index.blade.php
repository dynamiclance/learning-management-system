<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Quiz') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('quiz.store')}}" method="post" class="py-4">
                        @csrf
                        <div class="w-full mb-2">
                            <label for="name" class="lms-label">Name</label>
                            <input type="text" value="{{old('name')}}"  id="name" class="lms-input" name="name" placeholder="Type quiz name" />
                        </div>
                        @error('name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{$message}}</p>
                        @enderror
                        <input type="submit" class="lms-btn bg-green-600" value="Add" />
                    </form>
                    <livewire:quiz-index />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
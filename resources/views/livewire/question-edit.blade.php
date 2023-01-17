<div>
    <form wire:submit.prevent="updateQuestion">
        <div class="mb-4">
            @include('components.form-field', [
            'label' => 'Question Name',
            'type' => 'text',
            'name' => 'name',
            'required' => 'required',
            'placeholder' => 'Enter question name',
            'class' => 'w-1/2'
            ])
        </div>
    
        <div class="mb-4">
            @include('components.form-field', [
            'label' => 'Answer a',
            'type' => 'text',
            'name' => 'answer_a',
            'required' => 'required',
            'placeholder' => 'Enter answer',
            'class' => 'w-1/2 px-3 py-2'
            ])
        </div>
        <div class="mb-4">
            @include('components.form-field', [
            'label' => 'Answer b',
            'type' => 'text',
            'name' => 'answer_b',
            'required' => 'required',
            'placeholder' => 'Enter answer',
            'class' => 'w-1/2 px-3 py-2'
            ])
        </div>
        <div class="mb-4">
            @include('components.form-field', [
            'label' => 'Answer c',
            'type' => 'text',
            'name' => 'answer_c',
            'required' => 'required',
            'placeholder' => 'Enter answer',
            'class' => 'w-1/2 px-3 py-2'
            ])
        </div>

        <div class="mb-4">
            @include('components.form-field', [
            'label' => 'Answer d',
            'type' => 'text',
            'name' => 'answer_d',
            'required' => 'required',
            'placeholder' => 'Enter answer',
            'class' => 'w-1/2 px-3 py-2'
            ])
        </div>

        <div class="mb-4">
            @include('components.form-field', [
            'label' => 'Correct Answer',
            'type' => 'text',
            'name' => 'correct_answer',
            'required' => 'required',
            'placeholder' => 'Enter correct answer',
            'class' => 'w-1/2 px-3 py-2'
            ])
        </div>

    
        {{-- @include('components.wire-loading-btn') --}}
    
        <button wire:loading.delay.long.remove class="lms-btn mt-5" type="submit">Update</button>
    </form>
</div>

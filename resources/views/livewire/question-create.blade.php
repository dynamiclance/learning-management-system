<div>
    <form wire:submit.prevent="formSubmit">
        <div class="mb-4">
            @include("components.form-field", [
                'name' => 'name',
                'label' => 'Name',
                'type' => 'text',
                'placeholder' => 'Enter Question',
                'required' => 'required',
            ])
        </div>

        @foreach ($answers as $answer)
        <div class="mb-4">
            @include("components.form-field", [
                'name' => 'answer_' . $answer,
                'label' => 'Answer '. ucfirst($answer),
                'type' => 'text',
                'placeholder' => 'Answer ' . ucfirst($answer),
                'required' => 'required',
            ])
        </div>
        @endforeach

        <div class="mb-4">
            <label for="correct_answer">Correct Ans</label>
            <select class="lms-input" wire:model.prevent="correct_answer" name="correct_answer" id="correct_answer">
                <option value="#">select</option>
                @foreach ($answers as $answer)
                    <option value="{{$answer}}">{{ucfirst($answer)}}</option>
                @endforeach
            </select>
        </div>

        @include("components.wire-loading-btn")
    </form>
</div>

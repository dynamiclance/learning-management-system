<form wire:submit.prevent="formSubmit">
    {{-- {{var_dump($selectedCourse)}} --}}
    <div class="mb-4">
        @include("components.form-field", [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Enter Name',
            'required' => 'required',
        ])
    </div>

    <div class="mb-4">
        @include("components.form-field", [
            'name' => 'description',
            'label' => 'Description',
            'type' => 'textarea',
            'required' => 'required',
        ])
    </div>


    <div class="mb-4">
        @include("components.form-field", [
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number',
            'placeholder' => 'Course Price',
            'required' => 'required',
        ])
    </div>


    <div class="flex">
        <div class="w-full">
            <div class="mb-4">
                <div class="my-2">
                 <label for="days" class="font-bold">Days</label>
                </div>
                 <div class="flex flex-wrap items-center gap-2">
                    @foreach ($days as $day)
                    <input wire:model.lazy="selectedDays" type="checkbox" value="{{$day}}" id="{{$day}}">
                    <label for="{{$day}}">{{$day}}</label>
                    @endforeach
                 </div>
             </div>
        </div>

        <div class="min-w-max flex gap-2">
            <div class="mb-4">
                @include("components.form-field", [
                    'name' => 'time',
                    'label' => 'Start Time',
                    'type' => 'time',
                    'placeholder' => 'Enter Time',
                    'required' => 'required',
                ])
            </div>
            <div class="mb-4">
                @include("components.form-field", [
                    'name' => 'end_date',
                    'label' => 'End Date',
                    'type' => 'date',
                    'placeholder' => 'Enter Date',
                    'required' => 'required',
                ])
            </div>
        </div>
    </div>

    @include("components.wire-loading-btn")
</form>
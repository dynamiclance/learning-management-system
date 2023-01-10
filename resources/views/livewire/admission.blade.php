
<div> 
    <form wire:submit.prevent="search" class="flex items-center mb-4">
        <input wire:model.lazy="search" type="text" class="lms-input" placeholder="Search" required>
        <div class="ml-2"><button type="submit" class="lms-btn py-2">Search</button></div>
    </form>

    @if(count($leads) > 0) 
    <form wire:submit.prevent="admit">
        <div class="mb-4">
            <select wire:model.lazy="lead_id" class="lms-input">
                <option value="">Select Lead</option>
                @foreach($leads as $lead) 
                <option value="{{$lead->id}}">Name: {{$lead->name}} | Email: {{$lead->email}} | Phone: {{$lead->phone}}</option>
                @endforeach
            </select>
        </div>
            
        @if(!empty($lead_id))
        <div class="mb-4">
            <select wire:change="courseSelected" wire:model.lazy="course_id" class="lms-input">
                <option value="">Select Course</option>
                @foreach($courses as $course) 
                <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
        </div>
        @endif
    
    
        @if(!empty($selectedCourse))
            <p class="mb-4">Price: ${{number_format($selectedCourse->price)}}</p>
    
        <div class="mb-4">
            <input type="number" wire.model.lazy="payment" step=".01" max="{{number_format($selectedCourse->price, 2)}}" placeholder="payment now" class="lms-input">

        </div>
            @include('components.wire-loading-btn')

            {{-- <button type="submit">Get Enroll</button> --}}
        @endif
    </form>
    
    @endif

    {{-- <h2>Total Data Found {{ count($leads) }} </h2> --}}
</div>


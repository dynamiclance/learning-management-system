<label for="{{$name}}" class="lms-label">{{$label}}</label>

@if ($type === 'textarea')
    <textarea class="lms-input" wire:model.lazy="{{$name}}" name="{{$name}}" id="{{$name}}">
    
    </textarea>
@else
<input wire:model.lazy="{{$name}}" id="{{$name}}" type="{{$type}}"
class="rounded-md w-full shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="{{$placeholder}}" {{$required}}>

@endif

@error('{{$name}}')
<div class="text-red-600 text-sm mt-2">{{ $message }}</div>
@enderror
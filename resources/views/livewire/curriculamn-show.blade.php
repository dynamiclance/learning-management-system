<div class="class-details">


    <div class="course-info bg-slate-700 py-3 px-3 text-white mb-5">
        <h2>Course</h2>
        <h2 class="font-bold text-4xl">{{$classDetails->course->name}}</h2>
        <p>{{$classDetails->course->description}}</p>
        <small class="font-bold">Price: ${{$classDetails->course->price}}</small>
    </div>

    <div class="class-info bg-blue-700 py-3 px-2 text-white">
        <h2 class="font-bold text-3xl">Class details</h2>
        <p>{{$classDetails->name}}</p>
        <p>{{ date('F j Y', strtotime($classDetails->created_at)) }}</p>
        <p>{{ date('h:i A', strtotime($classDetails->class_time)) }}</p>
    </div>

    <div class="student-details my-3">
        <h2 class="font-bold text-3xl text-center my-4">Students</h2>
        <div class="font-bold py-3 text-lg mb-4 flex gap-4"> 
            <span class="text-green-700">Active Student - {{$classDetails->presentStudent()}}</span> ||
            <span class="text-red-700">Inactive Student - {{$classDetails->course->students()->count() - $classDetails->presentStudent() }} </span>
        </div>
        <table class="w-full table-auto">
            <tr>
                <th class="border px-2 py-2">Name</th>
                <th class="border px-2 py-2">Email</th>
                <th class="border px-2 py-2">Action</th>
            </tr>

         @foreach ($classDetails->course->students as $student)
         <tr>
            <td class="border px-2 py-3 text-center">{{$student->name}}</td>
            <td class="border px-2 py-3 text-center">{{$student->email}}</td>
            <td class="border px-2 py-3 text-center">
                <div class="flex justify-center gap-3">
                @if($student->is_present($classDetails->id))
                    Presented
                @else
                    <button wire:click="attendance({{$student->id}})" class="py-2 px-3 bg-green-500 text-white">Present</button>
                @endif
                </div>
            </td>
        </tr>
         @endforeach
        </table>
    </div>


    <div class="notes-container">
        
    <h2 class="font-bold text-4xl py-4">All Note</h2>
        @if(count($notes) > 0)

        @foreach($notes as $note)
        <div class="mb-3 border p-4 text-blue-600">{{$note->description}}</div>
        @endforeach
    
        @else
        <p class="py-4 bg-slate-100 text-red-700 px-3">Not Found Any Note!</p
    
        @endif
    </div>

    <div class="new-note py-3">
        <h2 class="text-3xl font-bold">Add New note</h2>

        <form wire:submit.prevent="addNote">
            <div class="mb-4">
                <textarea wire:model="note" class="lms-input" placeholder="Type note"></textarea>
            </div>
            <button class="lms-btn" type="submit">Save</button>
        </form>
    </div>

</div>

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
        <h2 class="font-bold text-3xl text-center my-4">Student</h2>
        <table class="w-full table-auto">
            <tr>
                <th class="border px-2 py-2">Name</th>
                <th class="border px-2 py-2">Email</th>
            </tr>

         @foreach ($classDetails->course->students as $student)
         <tr>
            <td class="border px-2 py-3 text-center">{{$student->name}}</td>
            <td class="border px-2 py-3 text-center">{{$student->email}}</td>
        </tr>
         @endforeach
        </table>
    </div>


    {{-- <h3 class="font-bold text-lg my-4">Notes</h3>

    @if (count($notes)>0)

    @foreach($notes as $note)
    <div class="mb-4 border border-gray-100 p-4">{{$note->description}}</div>
    @endforeach

    @else
    <p class="py-4 text-red-400">Not Found Any Note!</p>
    @endif

    <h4 class="font-bold mb-2">Add new note</h4>
    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea wire:model="note" class="lms-input" placeholder="Type note"></textarea>
        </div>
        <button class="lms-btn" type="submit">Save</button>
    </form> --}}


    <h2 class="font-bold text-4xl py-4">All Note</h2>

    @if(count($notes) > 0)

    @foreach($notes as $note)
    <div class="mb-3 border p-4 text-blue-600 text-2xl">{{$note->description}}</div>
    @endforeach

    @else
    <p class="py-4 bg-slate-700 text-red-400">Not Found Any Note!</p

    @endif

    <h2 class="font-bold text-3xl mb-3">Add new Note</h2>

    <form wire:submit.prevent="addNote">
        <div class="mb-4">
            <textarea wire:model="note" class="lms-input" placeholder="Type note"></textarea>
        </div>
        <button class="lms-btn" type="submit">Save</button>
    </form>

</div>

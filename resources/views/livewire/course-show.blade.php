<div>
   <div class="single-course-info mb-4">
        <h1 class="text-3xl font-bold">{{$course->name}}</h1>
        <p class=" font-semibold py-3">Price: ${{$course->price}}</p>
        <p class="text-md">Course Description: {{$course->description}}</p>
   </div>

   <div class="class-details">
      <h2 class="font-bold text-center text-3xl mb-4">Course Curriculamn</h2>
      <table class="w-full table-auo">
         <tr class="bg-blue-700 text-white">
            <th class="border px-3 py-2 text-left">Name</th>
            <th class="border px-3 py-2 text-left">Day</th>
            <th class="border px-3 py-2 text-left">Date</th>
            <th class="border px-3 py-2 text-left">Time</th>
            <th class="border px-3 py-2 text-center">Action</th>
         </tr>

         @foreach ($curriculums as $class)
         <tr>
            <td class="border px-3 py-2 text-let">{{$class->name}}</td>
            <td class="border px-3 py-2 text-let">{{$class->week_day}}</td>
            <td class="border px-3 py-2 text-let">{{date('F j, Y', strtotime($class->created_at))}}</td>
            <td class="border px-3 py-2 text-let">{{date('h:i A', strtotime($class->class_time)) }}</td>
            <td class="border px-3 py-2 text-center">
               <div class="flex justify-center ">
                  

                  <a href="{{route('class.edit', $class->id)}}">
                     @include('components.icons.edit')
                  </a>
               

                  <a href="{{route('class.show', $class->id)}}">
                     @include('components.icons.show')
                  </a>
               
           
                  <form class="ml-1" onsubmit="return confirm('Are you sure?');" wire:submit.prevent="curriculumDelete({{$class->id}})">
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
</div>

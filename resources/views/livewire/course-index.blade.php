<div>
    <h1 class="text-3xl font-bold mb-2 text-center">All courses</h1>

    <table class="w-full table-auto">
        <tr>
            <th class="border px-2 py-3 bg-purple-600 text-white">Name</th>
            <th class="border px-2 py-3 bg-purple-600 text-white">Description</th>
            <th class="border px-2 py-3 bg-purple-600 text-white">Price</th>
            <th class="border px-2 py-3 bg-purple-600 text-white">Action</th>
        </tr>

        @foreach ($courses as $course)
            <tr>
                <td class="border px-2 py-3 bg-orange-600 text-white">{{$course->name}}</td>
                <td class="border px-2 py-3 bg-orange-600 text-white">{{$course->description}}</td>
                <td class="border px-2 py-3 bg-orange-600 text-white">${{$course->price}}</td>
                <td class="border px-2 py-3 bg-orange-600 font-bold">
                    <div class="flex justify-between">
                        <a class="mr-2" href="{{route('course.show', $course->id)}}">
                            @include("components.icons.show")
                        </a>
                        <form onsubmit="return confirm('Are you sure to delete course')" wire:submit.prevent="deleteCourse({{$course->id}})">
                            <button>
                                @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
</div>
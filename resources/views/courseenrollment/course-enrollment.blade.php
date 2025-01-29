@extends('layouts.app')
@section('content')
<!-- Comment Form -->
<div class="max-w-[85rem] px-4 py-3 sm:px-6 lg:px-8 lg:py-3 mx-auto">
    <div class="mx-auto max-w-2xl">


        <!-- Card -->
        <div
            class="mt-1 p-4 relative z-10 bg-white border rounded-xl sm:mt-5 md:p-5 dark:bg-neutral-900 dark:border-neutral-700">
            <div>
                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                    Enroll Student
                </h2>
            </div>
            <form action="{{ route('courses.enroll') }}" method="POST">
                @csrf
              
                <div class="mt-4">
                    <label for="student_id" class="block mb-2 text-sm font-medium dark:text-white">Student</label>
                    <div class="mt-1">
                        <select name="student_id" id="student_id" 
                            class="block w-full px-3 py-2 text-sm dark:bg-neutral-800 dark:border-neutral-700 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="">Select a student</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                        @error('student_id') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
              
                <div class="mt-4">
                    <label for="course_id" class="block mb-2 text-sm font-medium dark:text-white">Course</label>
                    <div class="mt-1">
                        <select name="course_id" id="course_id" 
                            class="block w-full px-3 py-2 text-sm dark:bg-neutral-800 dark:border-neutral-700 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="">Select a course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                            @endforeach
                        </select>
                        @error('course_id') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>


                <div class="mt-6 grid">
                    <button type="submit"
                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Enroll
                    </button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
</div>
<!-- End Comment Form -->
@endsection
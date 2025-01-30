
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <!-- Table Section -->
        <div>
            <div class="max-w-[85rem] px-4 py-3 sm:px-6 lg:px-8 lg:py-3 mx-auto">
                <!-- Card -->
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                                <!-- Header -->
                                <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                                    <div>
                                        <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">Course Enrollment</h2>
                                        <p class="text-sm text-gray-600 dark:text-neutral-400">View and manage student enrollments.</p>
                                    </div>
                                    <div class="inline-flex gap-x-2">
                                        <div class="max-w-md space-y-3">
                                            <input type="search" class="peer py-3 px-4 block w-full bg-gray-100 border-blue-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                   title="search" placeholder="Search...">
                                        </div>
                                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        href="/courses/enrollment">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14" />
                                            <path d="M12 5v14" />
                                        </svg>
                                    </a>
                                    </div>
                                </div>
                                <!-- End Header -->

                                <!-- Table -->
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                    <thead class="bg-gray-50 dark:bg-neutral-800">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-start dark:text-neutral-200">#</th>
                                            <th scope="col" class="px-6 py-3 text-start dark:text-neutral-200">Student Name</th>
                                            <th scope="col" class="px-6 py-3 text-start dark:text-neutral-200">Course Name</th>
                                            <th scope="col" class="px-6 py-3 text-start dark:text-neutral-200">Enrollment Date</th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                        @if ($enrollments->count() > 0)
                                        @foreach ($enrollments as $student)
                                        @foreach ($student->courses as $course)
                                            <tr>
                                                <td class="px-6 py-3">
                                                    <span class="text-sm text-gray-800 dark:text-neutral-200">{{ $loop->parent->iteration }}</span>
                                                </td>
                                                <td class="px-6 py-3">
                                                    <span class="text-sm text-gray-800 dark:text-neutral-200">{{ $student->name }}</span>
                                                </td>
                                                <td class="px-6 py-3">
                                                    <span class="text-sm text-gray-800 dark:text-neutral-200">{{ $course->course_name }}</span>
                                                </td>
                                                <td class="px-6 py-3">
                                                    <span class="text-sm text-gray-800 dark:text-neutral-200">{{ \Carbon\Carbon::parse($course->pivot->created_at)->format('d-m-Y') }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    
                                   

                                        @else
                                            <tr>
                                                <td class="px-6 py-3" colspan="4">
                                                    <span class="text-sm text-gray-600 dark:text-neutral-400">No enrollments found.</span>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <!-- End Table -->

                                <!-- Pagination -->
                                {{ $enrollments->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
        <!-- End Table Section -->
    </div>
@endsection

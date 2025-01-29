@extends('layouts.app')

@section('content')
<div class="container">
	<!-- Table Section -->
	<div>
		<div class="max-w-[85rem] px-4 py-3 sm:px-6 lg:px-8 lg:py-3 mx-auto">
			<!-- Card -->
			<div class="flex flex-col">
				<div class="-m-1.5 overflow-x-auto">
					<div class="p-1.5 min-w-full inline-block align-middle">
			<div
				class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
				<!-- Header -->
				<div
					class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
					<div>
						<h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
							Students
						</h2>
						<p class="text-sm text-gray-600 dark:text-neutral-400">
							add student, edit and more.
						</p>
					</div>
				<div class="inline-flex gap-x-2">
					<div class="max-w-md space-y-3">
						<input type="search"
							class="peer py-3 px-4 block w-full bg-gray-100 border-blue-500 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:border-transparent dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
							title="add choice" placeholder="search...">

					</div>
					<a 
						class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
						href="/students/create">
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
					<thead class="bg-gray-50 dark:bg-neutral-800  px-5">
						<tr>
							<th scope="col" class="px-6 py-3 text-start dark:text-neutral-200">#</th>
												@include('theaders.th', [
					'name' => 'name',
					'columnName' => 'Student name',
					])

												@include('theaders.th', [
					'name' => 'email', //column name from db
					'columnName' => 'Email', //display name
					])

					@include('theaders.th', [
					'name' => 'phone', //column name from db
					'columnName' => 'Phone', //display name
					])

					@include('theaders.th', [
					'name' => 'created_at', //column name from db
					'columnName' => 'Created at', //display name
					])
					

					<th scope="col" class=" text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
						Edit
					</th>
					<th scope="col" class=" text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
						Delete
					</th>

					</tr>
					</thead>

					<tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
						@if (count($students) > 0)
							@foreach ($students as $item)
								<tr wire:key="{{$item->id}}">

						<td class="size-px p whitespace-nowrap">
							<div class="px-6 py-3">
							<span
								class="block text-sm  text-gray-800 dark:text-neutral-200">{{ ($loop->iteration) }}</span>
							</div>
						</td>

						<td class="size-px">
							<div class="px-6 py-3">
								<span
									class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium dark:text-neutral-200">
									{{ $item->name}}
								</span>
							</div>
						</td>

			<td class="size-px ">
			    <div class="px-6 py-3">
				<span
				class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium dark:text-neutral-200">
				{{ $item->email}}
				</span>
				</div>
			</td>

						<td class="size-px ">
							<div class="px-6 py-3">
								<span
									class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium dark:text-neutral-200">
									{{ $item->phone}}
								</span>
							</div>
						</td>

						<td class="size-px whitespace-nowrap">
							<div class="px-6 py-3">
								<span
									class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium dark:text-neutral-200">
									{{ date('d/m/Y H:m:i', strtotime($item->created_at)) }}
								</span>
							</div>
						</td>

						<td class="size-px whitespace-nowrap">
							<div class="px-6 py-1.5">
								<a 
									class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
									href="/students/edit/{{ $item->id }}">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none"
										viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
										class="size-4">
										<path stroke-linecap="round" stroke-linejoin="round"
											d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
									</svg>
								</a>
							</div>
						</td>
							<td class="size-px whitespace-nowrap">
								<div class="px-6 py-1.5">
							<a href="/students/destroy/{{$item->id}}" class="inline-flex items-center gap-x-1 text-sm text-red-500 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-red-500"
								onclick="return confirm('Are you sure you want to delete this student:{{ $item->name }}?')">
								<svg xmlns="http://www.w3.org/2000/svg" fill="none"
									viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
									class="size-4">
									<path stroke-linecap="round" stroke-linejoin="round"
										d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
								</svg>
							</a>
										</div>
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td class="size-px whitespace-nowrap" colspan="5">
									<div class="px-6 py-3">
										<span
											class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
											no data found
										</span>
									</div>
								</td>
							</tr>
						@endif
					</tbody>
				</table>
				<!-- End Table -->

				<!-- Pagination -->
				{{ $students->links() }}
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
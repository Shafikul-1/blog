@extends('admin.dashboard')
@section('title', 'Tags')
@section('adminContent')
@php
    $updownIcon = '<i class="fa-solid fa-up-down w-3 h-3 fill-gray-500 inline cursor-pointer ml-2"></i>';
@endphp
<div class="text-3xl font-bold text-center capitalize dark:text-white">All Tags</div>
<div class="md:flex justify-between my-4">
      <div class="">
        <form method="get" action="{{ route('tag.index') }}">
          <input type="text" name="search" placeholder="Search Tag Name ..." value="{{ request()->input('search') }}" />
          <button type="submit"></button>
      </form>
      </div>
    <div class="flex justify-evenly">
        <p class="bg-indigo-500 text-white px-4 py-2 shadow-lg shadow-indigo-600 capitalize rounded-md mx-1 font-bold"><i class="fa-solid fa-file-arrow-down"></i> Export</p>
        <a href="{{ route('tag.create') }}"><p class="bg-indigo-500 text-white px-4 py-2 shadow-lg shadow-indigo-600 capitalize rounded-md mx-1 font-bold">+ add user</p></a>
    </div>
</div>
<div class="font-[sans-serif] overflow-x-auto shadow-[0px_5px_16px_0px_#d6bcfa] ">
    <table class="min-w-full bg-white dark:bg-gray-700 p-4">
      <thead class="whitespace-nowrap">
        <tr>
          <th class="pl-4 w-8">
            <input id="allSelected" type="checkbox" class="hidden peer" onclick="allChecked()"/>
            <label for="allSelected"
              class="relative flex items-center justify-center p-0.5 peer-checked:before:hidden before:block before:absolute before:w-full before:h-full before:bg-white w-5 h-5 cursor-pointer bg-blue-500 border border-gray-400 rounded overflow-hidden">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-white" viewBox="0 0 520 520">
                <path
                  d="M79.423 240.755a47.529 47.529 0 0 0-36.737 77.522l120.73 147.894a43.136 43.136 0 0 0 36.066 16.009c14.654-.787 27.884-8.626 36.319-21.515L486.588 56.773a6.13 6.13 0 0 1 .128-.2c2.353-3.613 1.59-10.773-3.267-15.271a13.321 13.321 0 0 0-19.362 1.343q-.135.166-.278.327L210.887 328.736a10.961 10.961 0 0 1-15.585.843l-83.94-76.386a47.319 47.319 0 0 0-31.939-12.438z"
                  data-name="7-Check" data-original="#000000" />
              </svg>
            </label>
          </th>
          <th class="p-4 text-left text-sm font-semibold text-gray-800 dark:text-white uppercase">
            Name
            {!! $updownIcon !!}
          </th>
          <th class="p-4 text-left text-sm font-semibold text-gray-800 dark:text-white uppercase">
            Slug
            {!! $updownIcon !!}
          </th>
          <th class="p-4 text-left text-sm font-semibold text-gray-800 dark:text-white uppercase">
            Action
          </th>
        </tr>
      </thead>

      <tbody class="whitespace-nowrap ">
        @foreach ($allData as $data)
        <tr class=" dark:bg-gray-800 hover:shadow-[0px_7px_16px_2px_#667eea] hover:bg-indigo-600 transition-all my-3">
          <td class="pl-4 w-8">
            <input id="checkBoxId{{ $data->id }}" name="allId[]" type="checkbox" class="hidden peer" value="{{ $data->id }}"/>
            <label for="checkBoxId{{ $data->id }}" class="relative flex items-center justify-center p-0.5 peer-checked:before:hidden before:block before:absolute before:w-full before:h-full before:bg-white w-5 h-5 cursor-pointer bg-blue-500 border border-gray-400 rounded overflow-hidden">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-white" viewBox="0 0 520 520">
                <path
                  d="M79.423 240.755a47.529 47.529 0 0 0-36.737 77.522l120.73 147.894a43.136 43.136 0 0 0 36.066 16.009c14.654-.787 27.884-8.626 36.319-21.515L486.588 56.773a6.13 6.13 0 0 1 .128-.2c2.353-3.613 1.59-10.773-3.267-15.271a13.321 13.321 0 0 0-19.362 1.343q-.135.166-.278.327L210.887 328.736a10.961 10.961 0 0 1-15.585.843l-83.94-76.386a47.319 47.319 0 0 0-31.939-12.438z"
                  data-name="7-Check" data-original="#000000" />
              </svg>
            </label>
          </td>
          <td class="p-4 text-sm text-gray-800 dark:text-white">
            {{ $data->name }}
          </td>
          <td class="p-4 text-sm text-gray-800 dark:text-white">
            {{ $data->slug }}
          </td>
          <td class="p-4 dark:text-white">
           <div class="flex justify-around">
               <a href="{{ route('tag.edit', $data->id) }}"><i class="fa-regular fa-pen-to-square text-green-400 hover:text-green-600"></i></a>
               <x-form action="{{ route('tag.destroy', $data->id) }}" method="DELETE" iconBtn='<i class="fa-solid fa-trash-can text-red-500 hover:text-red-600"></i>'></x-form>
           </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {{ $allData->links() }}
  </div>

  <script>
     function allChecked() {
        // Get the state of the "allSelected" checkbox
        const isChecked = document.getElementById('allSelected').checked;
        
        // Get all checkboxes with the name "messageId[]"
        const checkboxes = document.querySelectorAll('input[name="allId[]"]');
        
        // Loop through each checkbox and set its checked property to the state of the "allSelected" checkbox
        checkboxes.forEach(checkbox => {
            checkbox.checked = isChecked;
        })
      }
  </script>
@endsection
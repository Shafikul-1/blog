@extends('admin.dashboard')
@section('title', 'Category View')
@section('adminContent')

    @php
        $inputStyle =
            'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer';
        $labelClass =
            'peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 capitalize';
    @endphp

    <x-form id="selectAction" action="{{ route('menu.store') }}" animationBtn="Submit" method="POST" formHeading="Menu Add Form"
        :fields="[
            [
                'type' => 'text',
                'name' => 'menu_name',
                'id' => 'menu_name',
                'placeholder' => '',
                'label' => [
                    'name' => 'Enter Your  menu Name here',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
            ],
            [
                'type' => 'text',
                'name' => 'sub_menu_name',
                'id' => 'sub_menu_name',
                'placeholder' => '',
                'label' => [
                    'name' => 'Enter Your Sub menu Name here',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
            ],
            [
                'type' => 'text',
                'name' => 'menu_link',
                'id' => 'menu_link',
                'placeholder' => '',
                'label' => [
                    'name' => 'Enter Your menu Link Name here',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
            ],
            [
                'type' => 'text',
                'name' => 'menu_icon',
                'id' => 'menu_icon',
                'placeholder' => '',
                'label' => [
                    'name' => 'Enter Your menu icon here',
                    'class' => $labelClass,
                ],
                'class' => $inputStyle,
            ],
           
        ]" class="max-w-md mx-auto">
        <div class="subMenuShow">
            <label for="main_menu_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white capitalize">Select Main menu <sub class="text-green-400">( if you need )</sub> </label>
            <select id="main_menu_id" name="main_menu_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected disabled>Select Menu</option>
                @foreach ($mainMenu as $menus)
                    <option value="{{ $menus['id'] }}"> {{ ($menus['menu_name'] == null) ? $menus['sub_menu_name'] : $menus['menu_name'] }} </option>
                @endforeach
            </select>
        </div>
    </x-form>


    @error('main_menu_id')
        <x-alert error="please select main menu"></x-alert>
    @enderror

@endsection

@extends('admin.dashboard')
@section('title', 'User Edit')
@section('adminContent')
@php
    $inputStyle =
        'block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer';
    $labelClass =
        'peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 capitalize';
@endphp

<x-form action="{{ route('users.update', $userData->id) }}" animationBtn="update" method="PUT" formHeading="User Details Update Form"
    :fields="[
        [
            'type' => 'text',
            'name' => 'name',
            'id' => 'name',
            'placeholder' => '',
            'value' => $userData->name,
            'label' => [
                'name' => 'Enter Your  Name here',
                'class' => $labelClass,
            ],
            'class' => $inputStyle,
        ],
        [
            'type' => 'text',
            'name' => 'email',
            'id' => 'email',
            'placeholder' => '',
            'value' => $userData->email,
            'label' => [
                'name' => 'Enter Your  Email here',
                'class' => $labelClass,
            ],
            'class' => $inputStyle,
        ],

    ]" class="max-w-md mx-auto">
</x-form>
@endsection
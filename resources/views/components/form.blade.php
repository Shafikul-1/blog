@props([
    'submit',
    'action',
    'method' => 'POST',
    'fields' => [],
    'formHeading' => '',
    'animationBtn' => '',
    'simpleBtn' => '',
    'iconBtn' => '',
])

<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}" {{ $attributes }}>
    @csrf
    @unless (in_array($method, ['GET', 'POST']))
        @method($method)
    @endunless

    @if ($formHeading)
        <h2 class="font-bold text-3xl text-center dark:text-white capitalize mb-6">{{ $formHeading }}</h2>
    @endif

    @foreach ($fields as $field)
        <div class="relative z-0 w-full mb-5 group">
            <input type="{{ $field['type'] }}" name="{{ $field['name'] }}"
                @if (isset($field['id'])) id="{{ $field['id'] }}" @endif
                @if (isset($field['placeholder'])) placeholder="{{ $field['placeholder'] }}" @endif
                @if (isset($field['value'])) value="{{ $field['value'] }}"
                @else
                    value="{{ old($field['name']) }}" @endif
                @if (isset($field['class'])) class="{{ $field['class'] }}" @endif />

                @if (isset($field['label']))
                    @if ($field['type'] != 'hidden')
                        <label for="{{ $field['id'] }}"
                            class="{{ $field['label']['class'] }}">{{ $field['label']['name'] }}</label>


                    @endif
                @endif

                @error($field['name'])
                <p class="text-red-600" style="text-shadow:3px 5px 4px black">{{ $message }}</p>
            @enderror
        </div>
    @endforeach


    {{ $slot }}


    @if ($animationBtn)
        <div class="flex items-center justify-center w-full h-full button mt-4">
            <button value="{{ $animationBtn }}" type="submit"
                class="relative inline-flex items-center justify-start px-6 py-3 overflow-hidden font-medium transition-all bg-white rounded hover:bg-white group">
                <span
                    class="w-48 h-48 rounded rotate-[-40deg] bg-purple-600 absolute bottom-0 left-0 -translate-x-full ease-out duration-500 transition-all translate-y-full mb-9 ml-9 group-hover:ml-0 group-hover:mb-32 group-hover:translate-x-0"></span>
                <span
                    class="relative w-full text-left text-black transition-colors duration-300 ease-in-out group-hover:text-white capitalize">{{ $animationBtn }}</span>
            </button>
        </div>
    @endif

    @if ($simpleBtn)
        <input type="submit" value="{{ $simpleBtn }}" class="cursor-pointer">
    @endif

    @if ($iconBtn)
        <button type="submit">
            {!! $iconBtn !!}
        </button>
    @endif

</form>

@extends('layouts.app')

@section('content')
<div class="flex items-center">
    <div class="w-full">
        <div class="w-full p-6">
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md mb-8">

                <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                    {{ __('Villages') }}
                </div>

                <form class="w-full p-6" method="POST" action="{{ route('villages.store') }}">
                    @csrf

                    <div class="flex flex-wrap mb-6">
                        <label for="location" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Location') }}:
                        </label>

                        <input id="location" type="text"
                            class="form-input w-full @error('location')  border-red-500 @enderror" name="location"
                            value="{{ old('location') }}" required autocomplete="location" autofocus>

                        @error('location')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap mb-6">
                        <label for="homes" class="block text-gray-700 text-sm font-bold mb-2">
                            {{ __('Number of Homes') }}:
                        </label>

                        <input id="homes" type="number"
                            class="form-input w-full @error('homes')  border-red-500 @enderror" name="homes"
                            value="{{ old('homes') }}" required autocomplete="homes">

                        @error('homes')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                            class="inline-block align-middle text-center select-none border font-bold whitespace-no-wrap py-2 px-4 rounded text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700">
                            {{ __('Record') }}
                        </button>
                    </div>
                </form>

            </div>

            @foreach ($villages as $village)
            <div class="bg-white border border-2 rounded shadow-md px-8 py-6 flex">
                <div class="w-4/5">
                    <h4 class="font-bold mb-3 text-lg">{{$village->location}}</h4>
                    <p class="text-sm">{{$village->homes}} Home(s)</p>
                </div>
                <div class="w-1/5 text-right">
                    <form method="POST" action="{{ route('villages.destroy',[$village->id]) }}">
                        @csrf
                        @method('delete')
                     <button class="outline-none focus:outline-none text-red-700"> <i class="fas fa-trash"></i></button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

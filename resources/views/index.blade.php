@extends('layouts.master')

@section('content')

<form action="{{ route('gemini.storeTeste') }}" method="POST">
    @csrf
    <div class="flex h-screen flex-col items-center justify-center bg-white">
        <div>
            <img class="h-[89px] w-[273px]" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Google_Gemini_logo.svg/220px-Google_Gemini_logo.svg.png" />
        </div>

        <div class="md:w-[584px] mx-auto mt-7 flex w-[92%] items-center rounded-full">
            <div class="pl-5"></div>
            <input type="url" class="w-full bg-transparent rounded-full py-[14px] pl-4 outline-none" placeholder="Link da Imagem" name="image_url" id="image_url">
        </div>
        <div class="mt-3 flex space-x-12">
            <button class="bg-[#f8f9fa] px-2 py-1">Desvende a Imagem</button>
        </div>
        @if (session('message'))
        <div>
            <img class="h-[89px]" />
        </div>
        <div class="md:w-[584px] mx-auto mt-7 flex w-[92%] bg-white shadow-md rounded px-8 pt-8 pb-8 mb-4">{{ session('message') }}</div>
        @endif
    </div>
</form>
@endsection

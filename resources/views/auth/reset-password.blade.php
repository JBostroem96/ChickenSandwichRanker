@extends('layouts.app')

@section('title', $page_title ?? 'Reset Password')
@section('h1', $h1 ?? 'Reset Password')

@section('content')
    <div class="border-2 border-brandOrange text-brandOrange font-bold p-6 rounded-lg">
        
        @if ($errors->any())
            <div class="mb-4">
                <ul class="mt-1 list-disc list-inside text-sm text-red-600 dark:text-red-400">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email -->
            <div class="mb-4">
                <label for="email">
                    {{ __('Email') }}
                </label>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    value="{{ old('email', $request->email) }}" 
                    required 
                    autofocus 
                    autocomplete="username"
                    class="mt-1 block w-full rounded-md border-gray-300 focus:border-orange-500 focus:ring-orange-500" 
                />
                @error('email')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password">
                    {{ __('Password') }}
                </label>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="new-password"
                    class="mt-1 block w-full rounded-md border-gray-300 focus:border-orange-500 focus:ring-orange-500" 
                />
                @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password Confirmation -->
            <div class="mb-4">
                <label for="password_confirmation">
                    {{ __('Confirm Password') }}
                </label>
                <input 
                    id="password_confirmation" 
                    type="password" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                    class="mt-1 block w-full rounded-md border-gray-300 focus:border-orange-500 focus:ring-orange-500" 
                />
                @error('password_confirmation')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-center mt-4">
                <button 
                    type="submit"
                    class="bg-orange-500 hover:bg-orange-600 border-4 border-orange-300 text-white text-lg font-bold py-2 px-4 rounded-xl">
                
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
@endsection

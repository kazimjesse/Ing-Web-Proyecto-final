@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-slate-300 focus:border-university-500 focus:ring-university-500 rounded-md shadow-sm']) !!}>
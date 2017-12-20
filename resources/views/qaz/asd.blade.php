<h1>Привет, {{ $name or 'гость' }}!</h1>
<h1>Мне {{ $age }} лет!</h1>


@verbatim
    <div class="container">
        Hello, {{ name }}.
    </div>
@endverbatim


@unless (true)
    You are not signed in.
@endunless


@guest
    Я гость
@endguest


@forelse ($users as $user)
    @if ($loop->first)
        This is the first iteration.
    @endif
    <li>{{ $user->name }}</li>

@empty
    <p>Нет данных для отображения</p>
@endforelse

<select>
@for ($i = 1920; $i < 2017; $i++)
    <option value="{{ $i }}">{{ $i }}</option>
@endfor
</select>

{{-- This comment will not be present in the rendered HTML --}}

@php
    echo date('d.m.Y');
@endphp

@include('welcome')
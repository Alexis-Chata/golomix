@props(['disabled' => false, 'cvens'])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
    <option value=""> --- Seleccionar Cod. Vendedor --- </option>
    @forelse ($cvens as $cven)
        <option value="{{ $cven->cven }}">{{ $cven->cven }}</option>
    @empty
    @endforelse
</select>

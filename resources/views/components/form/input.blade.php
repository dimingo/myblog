@props(['name', 'type' => 'text'])

<x-form.label>{{$slot}}</x-form-label>
<input name="{{$name}}" type="{{$type}}" class="focus:ring title rounded-xl bg-gray-100 border border-gray-300 p-2 mb-4 outline-none" spellcheck="false" type="text">

<x-form.error name="{{$name}}" />

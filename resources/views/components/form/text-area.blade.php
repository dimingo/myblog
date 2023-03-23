@props(['name'])
<x-form.label>{{$slot}}</x-form-label>
<textarea name="{{$name}}" {{ $attributes(["class"=> "focus:ring rounded-xl  description bg-gray-100 sec p-3 border border-gray-300 outline-none"])}} spellcheck="true"></textarea>
<x-form.error name="{{$name}}" />

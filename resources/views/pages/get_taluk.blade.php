<option selected value="" disabled>Select District Name</option>
@foreach ($talukas as $taluk)
    <option value="{{ $taluk->taluk_name }}">{{ $taluk->taluk_name }}</option>
@endforeach


<div class="container">

    @props(['route', 'title', 'fields'])

    <h2 style="text-align: center">{{ $title }}</h2>
    @if ($errors->any())
        <div class="container">
            @foreach ($errors->all() as $error)
                <div class="alert4">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    {{ $error }}
                </div>
                <br>
            @endforeach
        </div>
    @endif

    <div class="container">
        <div class="div">
            <form action="{{ $route }}" method="POST" class="form">
                @csrf
             
                    @method('PUT')
        

                @foreach ($fields as $field)
                    @if (isset($field['name']) && isset($field['label']) && isset($field['type']))
                        @if ($field['type'] == 'select')
                            <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                            <select name="{{ $field['name'] }}"
                                class="form-control @error($field['name']) is-invalid @enderror">
                                @foreach ($field['options'] as $optionValue => $optionName)
                                    <option value="{{ $optionValue }}"
                                        {{ old($field['name']) == $optionValue ? 'selected' : '' }}>
                                        {{ $optionName }}
                                    </option>
                                @endforeach
                            </select>
                            @error($field['name'])
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <pre>{{ var_export($field, true) }}</pre>

                        @elseif ($field['type'] == 'text')
                            <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                            <input type="text" name="{{ $field['name'] }}"
                                class="form-control @error($field['name']) is-invalid @enderror"
                                placeholder="{{ $field['placeholder'] }}"
                                value="{{ old($field['name']) ?? (isset($object) ? $object->{$field['name']} : '') }}">
                            @error($field['name'])
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        @endif
                        <br>
                    @endif
                @endforeach

                <input type="submit" class="button button1" value="Submit">
            </form>
        </div>
    </div>

</div>

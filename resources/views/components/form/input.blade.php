
    @props([
        'type'  => 'text',
        'name',
        'value' => ''
    ])
    <input type="{{$type}}" name="{{$name}}" @class([
        'form-control',
        'is-invalid'  => $errors->has($name),

    ])
     value="{{old($name,$value)}}">

     @error($name)
     <div class="text-danger">
         {{$message}}
     </div>
 @enderror

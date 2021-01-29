@extends('layouts.base')

@section('title', 'Senarai Post')

@section('content')

    {{-- this is the components --}}
    @component('components.alert', ['class' => 'warning'])
        <strong>Whoops!</strong> Something went wrong!
    @endcomponent

    {{-- this is the components will send success --}}
    @component('components.alert', ['class' => 'success'])
        <strong>Wow!</strong> its success
    @endcomponent

    {{-- <ul>
        @foreach($posts as $post)
        <li>{{$post->title}} - {{$post->body}}</li>
        @endforeach
    </ul> --}}


    <textarea name="test" id="editor" cols="30" rows="10"></textarea>

    <form action="{{route('bus.store')}}" method="post">
        @csrf
        <input type="text" name="test" id="" required>
        @error('test')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit">send</button>
    </form>
@endsection


@push('_styles')
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
@endpush
@push('_scripts')
<script>
    ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endpush


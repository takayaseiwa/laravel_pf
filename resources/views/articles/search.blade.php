@extends('layouts.app')

@section('content')
                        <div class="form-group mb-4">
                            <p>カテゴリー<span class="text-danger">(※)</span></p>
                            <select id="category_id" name="category_id" class="form-control">
                                @foreach($categories as $id => $name)
                                    <option value="{{ $id }}">
                                        {{ $name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

@endsection

@extends('layouts.app')
@section('title','Edit Data')
@section('page.title','Edit Data')
@section('content')
    <div class="card" style="min-height: 70vh">
        <div class="title">
            <h4>Edit Data</h4>
        </div>
        <div class="content">
            <form action="{{route('medicine.update', $medicine->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-row">
                    <label for="descriptionUpdate">Description</label>
                    <input type="text" name="description" id="descriptionUpdate" value="{{$medicine->description ?? ''}}">
                    <div class="validation-error">
                        @error('description')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="priceUpdate">Price</label>
                    <input type="number" name="price" id="priceUpdate" value="{{$medicine->price ?? ''}}">
                    <div class="validation-error">
                        @error('price')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="stockUpdate">Stock</label>
                    <input type="number" name="stock" id="stockUpdate" value="{{$medicine->stock ?? ''}}">
                    <div class="validation-error">
                        @error('stock')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('medicines-center').classList.add('active');
    </script>
@endsection

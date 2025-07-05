@extends('layouts.app')
@section('title','Store Medicine')
@section('page.title','Store Medicine Data')
@section('content')
    <div class="card">
        <div class="title">
            <h4>Fill The Data</h4>
        </div>
        <div class="content">
            <form action="{{route('medicine.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="nameStore">Name</label>
                        <input type="text" name="name" id="nameStore" required>
                        <div class="validation-error">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="manuStore">Manufacturer</label>
                        <input type="text" name="manufacturer" id="manuStore" required>
                        <div class="validation-error">
                            @error('manufacturer')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row flex-row space-between gap-10">
                    <div class="flex flex-col w-50">
                        <label for="priceStore">Price</label>
                        <input type="number" name="price" id="priceStore" required>
                        <div class="validation-error">
                            @error('price')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col w-50">
                        <label for="stockStore">Stock</label>
                        <input type="number" name="stock" id="stockStore">
                        <div class="validation-error">
                            @error('stock')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <label for="categoryStore">Category</label>
                    <select name="category" id="categoryStore" required>
                        <option value="" selected disabled>-- Please Select --</option>
                        <option value="Cardiovascular Drugs">Cardiovascular Drugs</option>
                        <option value="Analgesics">Analgesics</option>
                        <option value="Antibiotics">Antibiotics</option>
                        <option value="Antidiabetics">Antidiabetics</option>
                        <option value="Antidepressants & Anxiolytics">Antidepressants & Anxiolytics</option>
                        <option value="Gastrointestinal">Gastrointestinal</option>
                        <option value="Respiratory Medications">Respiratory Medications</option>
                        <option value="CNS & Neurological Drugs">CNS & Neurological Drugs</option>
                        <option value="Hormonal & Endocrine Drugs">Hormonal & Endocrine Drugs</option>
                        <option value="Immunosuppressants & Biologics">Immunosuppressants & Biologics</option>
                    </select>
                    <div class="validation-error">
                        @error('category')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <label for="descriptionStore">Description</label>
                    <textarea name="description" id="descriptionStore"></textarea>
                    <div class="validation-error">
                        @error('description')
                        {{$message}}
                        @enderror
                    </div>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('medicines-center').classList.add('active');
    </script>
@endsection

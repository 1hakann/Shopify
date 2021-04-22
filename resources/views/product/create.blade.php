<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
           
                <div class="col-md-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight pl-4">
                {{ __('Ürün Ekle') }}
                </h2>
                </div>
                <div class="col-md-4 text-right pr-4">
               <a class="text-right" href="{{route('product.index')}}"><button class="btn btn-primary">Ürün Listesine Dön</button></a>
                 </div>
             
            </div>
        </div>
       
    </x-slot>

    <div class="container">
        <div class="col-md-12 pt-3">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (Session::has('message'))
                    <div class="alert alert-success">{{Session::get('message')}}</div>
                @endif
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
               
                <div class="form-group col-md-8">
                    <label for="name" class="pt-1">Name</label>
                    <input type="text" name="name" value="{{old('name')}}" autofocus class="form-control @error('name') is-invalid @enderror">
                    <div class="invalid-feedback" role="alert">
                        @if($errors->any()) @foreach($errors->all() as $error) <div class="text-info"> {{$error}} </div> @endforeach @endif
                    </div>
                </div>
                <div class="form-group col-md-8">
                    <label for="name" class="pt-1">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror"  autofocus></textarea>
                    <div class="invalid-feedback" role="alert">
                        @if($errors->any()) @foreach($errors->all() as $error) <div class="text-info"> {{$error}} </div> @endforeach @endif
                    </div>
                </div>
                <div class="form-group col-md-8">
                    <label for="name" class="pt-1">Price</label>
                    <input type="number" name="price" autofocus class="form-control" @error('price') is-invalid @enderror">
                    <div class="invalid-feedback" role="alert">
                        @if($errors->any()) @foreach($errors->all() as $error) <div class="text-info"> {{$error}} </div> @endforeach @endif
                    </div>
                </div>
                <div class="form-group col-md-8">
                    <label for="name" class="pt-1">Category</label>
                    <select name="category"  class="form-control" @error('category_id') is-invalid @enderror>
                        <option value="">Kategori Seçin</option>
                        @foreach (App\Models\Category::all() as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div class="invalid-feedback" role="alert">
                        @if($errors->any()) @foreach($errors->all() as $error) <div class="text-info"> {{$error}} </div> @endforeach @endif
                    </div>
                </div>
                <div class="form-group col-md-8">
                    <label for="name" class="pt-1">Image</label>
                    <input type="file" name="image" autofocus class="form-control @error('image') is-invalid @enderror">
                    <div class="invalid-feedback" role="alert">
                        @if($errors->any()) @foreach($errors->all() as $error) <div class="text-info"> {{$error}} </div> @endforeach @endif
                    </div>
                </div>
                <div class="form-group col-md-8">
                    <button type="submit" class="btn btn-outline-primary">Ekle</button>
                </div>  
                
            </form>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
           
                <div class="col-md-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight pl-4">
                {{ __('Kategori Düzenle') }}
                </h2>
                </div>
                <div class="col-md-4 text-right pr-4">
               <a class="text-right" href="{{route('category.index')}}"><button class="btn btn-primary">Kategoriye Dön</button></a>
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
                <form action="{{route('category.update',$category->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group col-md-8">
                    <label for="name" class="pt-1">Name</label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control @error('name') is-invalid @enderror">
                    <div class="invalid-feedback" role="alert">
                        @if($errors->any()) @foreach($errors->all() as $error) <div class="text-info"> {{$error}} </div> @endforeach @endif
                    </div>
                </div>
                <div class="form-group col-md-8">
                    <button class="btn btn-outline-primary">Güncelle</button>
                </div>  
            </form>
            </div>
        </div>
    </div>
</x-app-layout>

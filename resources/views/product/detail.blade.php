<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('||-Ürün Detay Sayfası-||-') }}
            <a href="{{route('product.list')}}"><button class="btn btn-outline-primary">Ürünlere Dön </button></a>
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">Ürün</div>
                            <div class="card-body">
                                <img class="responsive" src="{{asset('images')}}/{{$product->image}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Detaylar</div>
                            <div class="card-body">
                                <p><h2>{{$product->name}}</h2></p>
                                <p class="lead">{{$product->description}}</p>
                                <p><h4>{{$product->price}} tl</h4></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

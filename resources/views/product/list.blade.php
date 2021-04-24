<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Homepage') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                            @foreach ($categories as $category)
                                
                            <div class="col-md-12">
                                <h2>{{$category->name}}</h2>
                                <div class="jumbotron">
                                    <div class="row">
                                        @foreach (App\Models\Product::where('category_id',$category->id)->get() as $product)
                                            
                                    <div class="col-md-3">
                                        <img src="{{asset('images')}}/{{$product->image}}" alt="" class="img-thumbnail" style="height: 10rem">
                                        <p class="text-center">{{$product->name}}
                                            <span>{{$product->price}}tl</span>
                                        </p>
                                        <p class="text-center">
                                            <a class="text-center" href="{{route('product.detail',$product->id)}}"><button class="btn btn-success">Görüntüle</button></a>
                                        </p>
                                    </div>
                                    @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
        </div>
    </div>

</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <div class="row">
           
                <div class="col-md-8">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight pl-4">
                {{ __('Kategori Sayfası') }}
                </h2>
                </div>
                <div class="col-md-4 text-right pr-4">
               <a class="text-right" href="{{route('category.create')}}"><button class="btn btn-primary">Kategori Ekle</button></a>
                 </div>
            </div>
        </div>     
    </x-slot>
    <div class="container">
        <div class="col-md-12 pt-3">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="form-group col-md-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                           
                            <table class="table">
                                <thead class="thead-dark">
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @if ($categories->count() > 0)                                
                                    @foreach ($categories as $key => $category)
                                  <tr>
                                    <th scope="row">{{$key+1}}</th>
                                    <td>{{$category->name}}</td>
                                    <td> <a href="{{route('category.edit',$category->id)}}"><button class="btn btn-success" title="Düzenle">Düzenle</button></a></td>
                                    <td> 
                                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal{{$category->id}}">
                                        Sil
                                      </button>
                                    
                                      <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Kategori Silme Alanı</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              Silmek istediğine emin misin?
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                              <a href="{{route('category.destroy',$category->id)}}"><button class="btn btn-warning" title="Sil">Sil</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      
                                 
                                  
                                  </td>
                                  </tr> 
                                  @endforeach
                                </tbody>
                              </table>
                                    @else
                                    <div class="alert alert-warning">Gösterilecek Kategori Bulunamadı</div>
                                    @endif

                                  

                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
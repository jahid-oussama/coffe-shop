<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b >Editl Categories</b>
        </h2>
    </x-slot>

    <form  enctype="multipart/form-data" action="{{ route('update.product',$Prodacts->id) }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="input-title">Product name :</label>
          <input type="text" value="{{$Prodacts->name}}" id="input-title" name="name" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="input-title">description :</label>
          <input type="text" value="{{$Prodacts->description}}" id="input-title" name="description" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Category :</label>
          <select class="form-control"  id="exampleFormControlSelect1" name="category">
        <option selected disabled>Choose a category</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach  
      </select>
        </div>
        <div class="form-group">
          <label for="input-title">Price :</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <div class="input-group-text">€</div>
            </div>
            <input type="number" value="{{$Prodacts->prix}}" id="input-price" name="prix" class="form-control" required>
          </div>
        <div class="form-group">
          <label>Add pictures :</label>
          <div class="row">
            <div class="col-md-4">
              <div class="input-pic">
                <input type="file" onchange="previewFile()"  class="form-control" name="image">
                <input type="hidden" value="{{$Prodacts->image}}" name="old_imge">
                <img src="{{ asset("/uploads/$Prodacts->image") }}" alt="Image preview..." class="img-fluid mh-100 mw-100">
              </div>
            </div>

          </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </x-app-layout>
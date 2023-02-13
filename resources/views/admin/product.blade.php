<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b >All Categories</b>
        </h2>
    </x-slot>

    {{-- <div class="py-5"> --}}

<!-- component -->
<!--Container-->
<div class="container w-full md:w-4/5 xl:w-3/5  mx-auto px-2">
      		 

    
    
    <!--Card-->
     <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
     
        
        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <th data-priority="1" style="width: 209px;">picture</th>
                    <th data-priority="1" style="width: 209px;">Name</th>
                    <th data-priority="2" style="width: 209px;">discription</th>
                    <th data-priority="3" style="width: 209px;">category</th>
                    <th data-priority="4" style="width: 209px;">prix</th>
                    <th data-priority="5" style="width: 209px;">created at</th>
                    <th data-priority="5" style="width: 209px;">actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td><img style="height: 162px;" src="{{ asset("/uploads/$product->image") }}" alt=""></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description}}</td>
                    <td>{{ $product->category_id }}</td>
                    <td>{{ $product->prix }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                      <a href="{{route('edit.product',$product->id)}}" class="btn btn-sm btn-success">Edit</a>
                  <form action="{{ route('delete.product', $product->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit">delete</button>
                      
                  </form>
              </td>
                </tr>
                @endforeach
                
                <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->
                
            </tbody>
            
        </table>
        
        
    </div>
    <!--/Card-->


</div>

<div class="container" style="margin-top: 200px">
    <form action="{{ route('add.product') }}" method="POST" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
        <label for="input-title">Product name :</label>
        <input type="text" id="input-title" name="name" class="form-control" required>
     @error('name')
        <span class="text text-danger">{{ $message }}</span>
     @enderror
      </div>
      <div class="form-group">
        <label for="input-title">discreption :</label>
        <input type="text" id="input-title" name="description" class="form-control" required>
        @error('description')
        <span class="text text-danger">{{ $message }}</span>
     @enderror
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Category :</label>
        <select class="form-control" id="exampleFormControlSelect1" name="category">
      <option selected disabled>Choose a category</option>
@foreach($categories as $category)
<option value="{{$category->id}}">{{$category->name}}</option>
@endforeach      
      
      {{-- <option value="1">Category 2</option>
      <option value="1">Category 3</option> --}}
    </select>
      </div>
      <div class="form-group">
        <label for="input-title">Price :</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">€</div>
          </div>
          <input type="number" id="input-price" name="prix" class="form-control" required>
          @error('prix')
          <span class="text text-danger">{{ $message }}</span>
       @enderror
        </div>
      </div>

      <div class="form-group">
        <label>Add pictures :</label>
        <div class="row">
          <div class="col-md-4">
            <div class="input-pic">
              <input type="file" onchange="previewFile()" class="form-control" name="image">
              @error('image')
              <span class="text text-danger">{{ $message }}</span>
           @enderror
              <img src="{{ asset("/uploads/$product->image") }}" alt="Image preview..." class="img-fluid mh-100 mw-100 ">
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
<!--/container-->


    {{-- </div> --}}
</x-app-layout>
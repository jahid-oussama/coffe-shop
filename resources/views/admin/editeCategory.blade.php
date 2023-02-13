<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b >Editl Categories</b>
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="container">
            <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Category
                </div>
                <div class="card-body">
                    <form action="{{ route('update.category',$categories->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail">Category Name Update</label>
                            <input value="{{ $categories->name }}" name="name" type="text" class="form-control" id=""/>
                            @error('name')
                                <span class="text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</x-app-layout>
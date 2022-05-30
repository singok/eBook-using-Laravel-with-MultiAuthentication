<div>
    @section('title')
     Dashboard
    @endsection

    <div class="row mt-4">
      <div class="col-md-8">
          <!-- Table -->
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Book Title</th>
                <th scope="col">Book Category</th>
                <th scope="col">Short Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php
                $count = 1;
              @endphp
              @foreach ($dataInfo as $info)
                <tr>
                  <th scope="row">{{ $count++ }}</th>
                  <td>{{ $info->title }}</td>
                  <td>{{ $info->category }}</td>
                  <td>{{ $info->description }}</td>
                  <td>
                      <i class="fa-solid fa-download"></i>
                      <i class="fa-solid fa-pen-to-square"></i>
                      <i class="fa-solid fa-trash"></i>
                  </td>
                </tr>
              @endforeach
              
            </tbody>
          </table>
      </div>
      <div class="col-md-4 border border-right-0 shadow p-3 mb-5 bg-white rounded">
        <form wire:submit.prevent="insert" id="addBook" class="px-3 py-3">
          <div class="form-group">
            <label for="exampleFormControlSelect1">Book Category:</label>
            <select wire:model="category" class="form-control" id="exampleFormControlSelect1">
              <option value="" selected>Choose...</option>
              <option value="nobel">Nobel</option>
              <option value="educational">Educational</option>
              <option value="comics">Comics</option>
            </select>
            @error('category')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="book-title">Title:</label>
            <input wire:model="title" type="text" class="form-control" id="book-title" placeholder="Enter book title">
            @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Short Description:</label>
            <textarea wire:model="description" class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Enter short description"></textarea>
            @error('description')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Cover Image:</label>
            <input wire:model="coverImage" type="file" class="form-control-file" id="exampleFormControlFile1">
            @error('coverImage')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile2">Book (PDF):</label>
            <input wire:model="book" type="file" class="form-control-file" id="exampleFormControlFile2">
            @error('book')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Book</button>
        </form>
      </div>
    </div>
    
    @push('script')
    <script>
        $(document).ready(function () {
          toastr.options = {
              "progressBar" : true,
              "positionClass" : "toast-top-right"
          };
        });

        // display book insert toaster
        window.addEventListener('book-insert', event => {
          toastr.success(event.detail.message);
          $('#addBook')[0].reset();
        });

        $('#add-book-button').on('click', function() {
          $('#book-add').modal('show');
        });
        
    </script>
    @endpush
</div>

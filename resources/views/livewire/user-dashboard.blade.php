<div>
    @section('title')
     Dashboard
    @endsection

    <button type="button" id="add-book-button" class="btn btn-primary"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Book</button>
    <!-- Table -->
    <table class="table table-striped mt-4">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Book Title</th>
            <th scope="col">Book Category</th>
            <th scope="col">Short Description</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
                <i class="fa-solid fa-download"></i>
                <i class="fa-solid fa-pen-to-square"></i>
                <i class="fa-solid fa-trash"></i>
            </td>
          </tr>
          
        </tbody>
      </table>

      <div class="modal fade" id="book-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New Book</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="inputState">Category:</label>
                    <select wire:model.defer="category" id="inputState" class="form-control">
                      <option value="" selected>Choose...</option>
                      <option value="Nobel">Nobel</option>
                      <option value="Educational">Educational</option>
                      <option value="Literature">Literature</option>
                    </select>
                </div>
                <div class="form-group">
                  <label for="book-name" class="col-form-label">Title:</label>
                  <input wire:model.defer="title" type="text" class="form-control" id="book-name">
                </div>
                <div class="form-group">
                  <label for="description-text" class="col-form-label">Description:</label>
                  <textarea wire:model.defer="description" class="form-control" id="description-text"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Book (PDF):</label>
                    <input wire:model.defer="file" type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button wire:click.prevent="insert" type="button" class="btn btn-primary">Add</button>
            </div>
          </div>
        </div>
      </div>

    @push('script')
    <script>
        $(document).ready(function () {
            
        });

        $('#add-book-button').on('click', function() {
            $('#book-add').modal('show');
        });
        
    </script>
    @endpush
</div>

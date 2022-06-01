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
                                <a href="#" wire:click.prevent="export('{{ $info->file }}','{{ $info->title }}')"
                                    style="color:black" onmouseover="this.style.color='green'"
                                    onmouseout="this.style.color='black'"><i class="fa-solid fa-download"></i></a>
                                <a href="#"
                                    wire:click.prevent="edit('{{ $info->id }}','{{ $info->title }}','{{ $info->category }}','{{ $info->description }}')"
                                    style="color:black" onmouseover="this.style.color='blue'"
                                    onmouseout="this.style.color='black'"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="#"
                                    wire:click.prevent="deleteModal('{{ $info->id }}', '{{ $info->cover_image }}', '{{ $info->file }}')"
                                    style="color:black" onmouseover="this.style.color='red'"
                                    onmouseout="this.style.color='black'"><i class="fa-solid fa-trash"></i></a>
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
                    <input wire:model="title" type="text" class="form-control" id="book-title"
                        placeholder="Enter book title">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Short Description:</label>
                    <textarea wire:model="description" class="form-control" id="exampleFormControlTextarea1" rows="4"
                        placeholder="Enter short description"></textarea>
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
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add
                    Book</button>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to delete book details ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button wire:click="delete" type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- update-Moal -->
    <div class="modal fade" id="editModalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Edit Book Details</h5>
                    <button type="button" class="btn-close" id="update-cross" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Book Category:</label>
                        <select wire:model.defer="update_category" class="form-control" id="exampleFormControlSelect2">
                            <option value="" selected>Choose...</option>
                            <option value="nobel">Nobel</option>
                            <option value="educational">Educational</option>
                            <option value="comics">Comics</option>
                        </select>
                        @error('update_category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="update-book-title">Title:</label>
                        <input wire:model.defer="update_title" type="text" class="form-control" id="update-book-title"
                            placeholder="Enter book title">
                        @error('update_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea2">Short Description:</label>
                        <textarea wire:model.defer="update_description" class="form-control" id="exampleFormControlTextarea2" rows="4"
                            placeholder="Enter short description"></textarea>
                        @error('update_description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close-update">Close</button>
                    <button wire:click.prevent="update" type="button" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            $(document).ready(function() {
                toastr.options = {
                    "progressBar": true,
                    "positionClass": "toast-top-right"
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

            //display confirm delete
            window.addEventListener('show-delete-modal', event => {
                $('#deleteModal').modal('show');
            });

            window.addEventListener('delete-success', event => {
                $('#deleteModal').modal('hide');
                toastr.error(event.detail.message);
            });

            // show edit form 
            window.addEventListener('show-update-form', event => {
                $('#editModalForm').modal('show');
            });
            $('#close-update, #update-cross').on('click', () => {
                $('#editModalForm').modal('hide');
            });
            
            window.addEventListener('update-success', event => {
                $('#editModalForm').modal('hide');
                toastr.success(event.detail.message);
            });
        </script>
    @endpush
</div>

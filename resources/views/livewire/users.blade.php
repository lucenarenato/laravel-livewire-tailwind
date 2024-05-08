{{-- @livewireStyles --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<div>
    <div class="card">
          <div class="card-header">
            Laravel Livewire Delete Confirmation Example
          </div>

          <div class="card-body">

            <table class="table-auto" style="width: 100%;">
              <thead>
                <tr>
                  <th class="px-4 py-2">ID</th>
                  <th class="px-4 py-2">Name</th>
                  <th class="px-4 py-2">Email</th>
                  <th class="px-4 py-2">Action</th>
                </tr>
              </thead>
              <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="border px-4 py-2">{{ $user->id }}</td>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2">
                                <button type="button" wire:click="deleteId({{ $user->id }})" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>
                            </td>
                        </tr>
                    @endforeach
              </tbody>
            </table>

            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true close-btn">×</span>
                            </button>
                        </div>
                       <div class="modal-body">
                            <p>Are you sure want to delete?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                            <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- @livewireScripts --}}

      {{-- sweetalert2 --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

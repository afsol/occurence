
<div>
    <div class="card mt-3">
        <div class="card-body">
            <button class="btn btn-primary mb-2" wire:click="openModal" data-toggle="modal" data-target="#exampleModal">Add Occurrence Type</button>

            <input wire:model.live="filters.query" class="form-control mr-sm-2 mb-2" type="search" placeholder="Search" aria-label="Search">
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($occurrenceTypes as $occurrenceType)
                        <tr>
                            <td>{{ $occurrenceType->name }}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal" wire:click="editOccurrenceType({{ $occurrenceType->id }})">Edit</button>
                                <button class="btn btn-sm btn-danger"  wire:confirm="Are you sure  to delete this ?" wire:click="deleteOccurrenceType({{ $occurrenceType->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $occurrenceTypes->links() }}
        </div>
    </div>


        <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $selectedOccurrenceType ? 'Edit' : 'Add' }} Occurrence Type</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="closeModal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="newOccurrenceType" class="form-label">New Occurrence Type:</label>
                            <input wire:model="newOccurrenceType" type="text" class="form-control">
                            @error('newOccurrenceType') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal" data-dismiss="modal" aria-label="Close">Cancel</button>
                        <button type="button" class="btn btn-primary" wire:click="{{ $selectedOccurrenceType ? 'updateOccurrenceType' : 'saveOccurrenceType' }}">{{ $selectedOccurrenceType ? 'Update' : 'Save' }}</button>
                    </div>
                </div>
            </div>
        </div>
</div>



@script
<script>
    $wire.on('hide-modal', () => {
        console.log('Event received!');
        $('#exampleModal').modal('hide');
    });
</script>
@endscript



















@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form method="POST" wire:submit.prevent="saveOccurrence" class="w-75 mx-auto mt-5">
    <div class="mb-3">
        <label for="occurrenceType" class="form-label">Occurrence Type:</label>
        <select wire:model="occurrenceType" class="form-select">
            <option >Select an occurrence type</option>
            @foreach($occurrenceTypes as $id => $name)
                <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </select>
        @error('occurrenceType') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea wire:model="description" class="form-control" ></textarea>
        @error('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3">
        <label for="attachment" class="form-label">Attachment:</label>
        <input wire:model="attachment[]" type="file" class="form-control multiple" multiple >
        {{-- <livewire:media-library wire:model="attachment" /> --}}
        @error('attachment') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save Occurrence</button>
    <div wire:loading >Uploading...</div>
</form>
@script
<script>
    $(document).ready(function() {
      $('textarea#description').summernote({
        placeholder: 'Description',
        height: 200,
      });
});
</script>
@endscript


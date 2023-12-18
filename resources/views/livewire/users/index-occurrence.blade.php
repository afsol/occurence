<div>
    <div class="card mt-3">
        <div class="card-body">
            <input wire:model.live="filters.query" class="form-control mr-sm-2 mb-2" type="search" placeholder="Search">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Occurrence Type</th>
                        <th>Description</th>
                        <th>Attachment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($occurrences as $occurrence)
                        <tr>
                            <td>{{ $occurrence->type->name }}</td>
                            <td>{!! $occurrence->description !!}</td>
                            <td>
                                @if($occurrence->media->isNotEmpty())
                                    @foreach ($occurrence->media as $images)
                                        <img src="{{ $images->getUrl() }}" alt="Occurrence Image" width="50" height="50">
                                        
                                    @endforeach
                                @else
                                    No Image
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Display pagination links -->
            {{ $occurrences->links() }}
        </div>
    </div>
</div>


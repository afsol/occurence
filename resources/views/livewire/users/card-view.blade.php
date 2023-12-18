<div>
    <div class="row">
        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <h3 wire:poll="totalOccurrence" >{{ $occurrenceSum }}</h3>
                    <p>Occurrence</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-success">
                <div class="inner">
                    <h3 wire:poll="totalOccurrenceType">{{ $occurrenceTypeSum }}<sup style="font-size: 20px"></sup></h3>
                    <p>Occurrence Type</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>                
            </div>
        </div>
    </div>
</div>

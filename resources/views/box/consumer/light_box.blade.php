
<div class="row">
    <div class="col-md-6">
        <h4 class="mb-5">{{$table->name}}</h4>

        <div class="mb-5">
            <img class="img-thumbnail img-responsive" src="data:image/png;base64,{{DNS2D::getBarcodePNG(route('login-ref',['id' =>Auth::user()->id]), 'QRCODE', 7,7)}}" alt="barcode" title="Share your barcode for getting reference point."  />
            <p class="text-size-small">Shareable QR-code</p>
        </div>

    </div>
    <div class="col-md-6">
        <p><b>ID: </b>{{$table->id}}</p>
        @if($table->points == 'Customer')
        <p><b>Point: </b>{{$table->points}}</p>
        @endif
        <p><b>Referral: </b>{{$table->ref == null ? 'No Referral': $table->ref}}</p>

        <h5 class="mt-5 text-primary">Personal Info</h5>
        <p><b>Contact: </b>{{$table->contact}}</p>
        <p><b>Email: </b>{{$table->email}}</p>
        <p><b>Address: </b>{{$table->address}}, {{$table->state}}, {{$table->city}}, {{$table->postCode}}</p>
        <p><b>Location: </b>{{$table->location['name'] ?? ''}}</p>
    </div>
</div>




@extends('layouts.avatar')
@section('title')
Subscribed Succussfully | Know Your Inventory
@endsection
@section('avatar_content')
<div class="container">
    <div class="row justify-content-center">
        
		<div class="col-12 text-center">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="py-5 mt-5">
                <h1 class="display-3">Subscription purchased successfully!</h1>
            </div>
        </div>
        
        {{-- <div class="col-12 ">
			<div class="card">
				<div class="card-body">
					<div class="alert alert-success">
						Subscription purchase successfully!
					</div>
				</div>
			</div>
		</div> --}}
	</div>
</div>
<script>
    // Add a JavaScript redirect after 3 seconds
    setTimeout(function () {
        window.location.href = '/home'; // Replace with your desired redirect URL
    }, 3000);
</script>
@endsection
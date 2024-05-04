@extends('layouts.avatar')
@section('title')
Subscription Purchase | Know Your Inventory
@endsection
@section('avatar_content')
<div class="container pb-5">
    <div class="row justify-content-center pb-5">
		<div class="col-12 text-center">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="">
                <h1 class="display-5" style="">You will be charged ${{ number_format($plan->price * 0.01, 2) }} for {{ $plan->name }}</h1>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-8 col-12 mx-auto ">
			<div class="card">
				<div class="card-body">
					<form id="payment-form" action="{{ route('subscription.create') }}" method="POST">
						@csrf
						<input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="">Name</label>
									<input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="Name on the card">
								</div>
							</div>
						</div>
						<div class="row mt-3">
							<div class="col-12">
								<div class="form-group">
									<label for="">Card details</label>
									<div id="card-element"></div>
								</div>
							</div>
							<div class="col-xl-12 col-lg-12">
								<hr>
								<button type="submit" class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">Purchase</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script>
	const stripe = Stripe('{{ env('STRIPE_KEY') }}')	
	const elements = stripe.elements()
	const cardElement = elements.create('card', {hidePostalCode: true})	
	cardElement.mount('#card-element')
	
	const cardHolderName = document.getElementById('card-holder-name')
	const cardBtn = document.getElementById('card-button')
    const form = document.getElementById('payment-form')
		
	form.addEventListener('submit', async (e) => {
	    e.preventDefault()	
	    cardBtn.disabled = true
	    const { setupIntent, error } = await stripe.confirmCardSetup(
	        cardBtn.dataset.secret, {
	            payment_method: {
	                card: cardElement,
	                billing_details: {
	                    name: cardHolderName.value
	                }   
	            }
	        }
	    )
	
	    if(error) {	
	        cardBtn.disable = false
	    } else {
	        let token = document.createElement('input')
	        token.setAttribute('type', 'hidden')
	        token.setAttribute('name', 'token')
	        token.setAttribute('value', setupIntent.payment_method)
	        form.appendChild(token)
	        form.submit();
	    }
	})
	
</script>
@endsection
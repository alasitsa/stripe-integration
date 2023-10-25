@extends('layouts.app')

@section('content')
    <div>
        <h1>{{ $plan->name }} {{ $plan->price }}$/month</h1>
        <form action="{{ route('subscription.create') }}" method="POST" id="card-form">
            @csrf
            <input type="hidden" name="plan" id="plan" value="{{ $plan->id }}">
            <label for="card-name">Your name</label>
            <input type="text" name="name" id="card-name">
            <label for="email" class="inline-block font-bold mb-2 uppercase text-sm tracking-wider">Email</label>
            <input type="email" name="email" id="email" class="border-2 border-gray-200 h-11 px-4 rounded-xl w-full">
            <label for="card" class="inline-block font-bold mb-2 uppercase text-sm tracking-wider">Card details</label>
            <div id="card"></div>
            <button type="submit" class="w-full bg-indigo-500 uppercase rounded-xl font-extrabold text-white px-6 h-12">Pay</button>
        </form>
    </div>
@endsection
@push('js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        let stripe = Stripe('{{ env("STRIPE_KEY") }}')
        const elements = stripe.elements()
        const cardElement = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px'
                }
            }
        })
        const cardForm = document.getElementById('card-form')
        const cardName = document.getElementById('card-name')
        cardElement.mount('#card')
        cardForm.addEventListener('submit', async (e) => {
            e.preventDefault()
            const { paymentMethod, error } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    name: cardName.value
                }
            })
            if (error) {
                console.log(error)
            } else {
                let input = document.createElement('input')
                input.setAttribute('type', 'hidden')
                input.setAttribute('name', 'payment_method')
                input.setAttribute('value', paymentMethod.id)
                cardForm.appendChild(input)
                cardForm.submit()
            }
        })
    </script>
@endpush


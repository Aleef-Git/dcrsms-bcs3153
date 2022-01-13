<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Delivery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="overflow-x-auto">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form action="{{ route('delivery.update',['delivery'=>$delivery]) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <label class="label" for="id">Delivery ID</label>
                            <input type="text" name="id" placeholder="Delivery ID" class="input input-bordered" value="{{ $delivery->id }}" disabled>
                            <br>
                            <label class="label" for="name">Cash on Delivery</label>
                            @if ($delivery->cash_on_delivery == 'yes')
                                <input type="text" name="cash_on_delivery" placeholder="Cash on Delivery" class="input input-bordered" value="Yes" disabled>
                            @else
                                <input type="text" name="cash_on_delivery" placeholder="Cash on Delivery" class="input input-bordered" value="No" disabled>
                            @endif
                            <br>
                            @if ($delivery->cash_on_delivery == 'yes')
                                <label class="label" for="amount">Amount to be Collected</label>
                                <input type="text" name="amount" placeholder="Amount to be Collected" class="input input-bordered" value="RM {{ $delivery->service_request->payment->amount }}" disabled>
                            @endif
                            <br>
                            <select class="select select-bordered w-full max-w-xs mt-3" name="status">
                                <option disabled="disabled" selected="selected">Select New Status</option>
                                <option value="completed">Completed</option>
                                <option value="failed">Failed</option>
                            </select>
                            <br>
                            <input class="btn mt-3" type="submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

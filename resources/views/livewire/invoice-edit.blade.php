<div>
  <div class="mt-5 mb-5">
    <h2 class="font-blod">Information</h2>
    <p class="font-blod ">Invoice to : 
      <span class="text-green-700 font-bold text-xl">{{$invoice->user->name}}</span> 
    </p>
  </div>

  <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name </th>
            <th class="border px-4 py-2 text-center">Price</th>
            <th class="border px-4 py-2  text-center"> Quantity </th>
            <th class="border px-4 py-2 text-right">Total</th>
            <th class="border px-4 py-2 text-center">Action</th>
        </tr>
        @foreach ($invoice->items as $item)
        <tr>
            <td class="border px-4 py-2 text-left">{{$item->name}}</td>
            <td class="border text-right">${{number_format($item->price, 2)}}</td>
            <td class="border px-4 py-2  text-center">{{$item->quantity}}</td>
            <td class="border px-4 py-2 text-right">$
               {{number_format($item->price * $item->quantity, 2)}}
            </td>
            <td class="border px-4 py-2 text-right">
                <div class="flex items-center justify-center">
                    <a href="#">
                        @include('components.icons.edit')
                    </a>
                    <a class="px-2" href="#">
                        @include('components.icons.view')
                    </a>
                    <form wire:submit.prevent="invoiceItemDelete({{ $item->id }})">
                        <button onclick="return confirm('Are you sure?');" type="submit" > 
                            @include('components.icons.trash')
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3" class="border text-center">Subtotal</td>
            <td class="border text-right">${{number_format($invoice->amount()['total'], 2)}}</td>
        </tr>
        <tr>
            <td colspan="3" class="border text-center">Paid</td>
            <td class="border text-right">- ${{number_format($invoice->amount()['paid'], 2)}}</td>
        </tr>
        <tr>
            <td colspan="3" class="border text-center">Due</td>
            <td class="border text-right">${{number_format($invoice->amount()['due'], 2)}}</td>
        </tr>
  </table>
  
  
  @if ($enableAddItem)
  <form wire:submit.prevent="saveNewItem" class="mt-5 mb-5">
    <div class="flex">
      <div class="w-full">
        @include('components.form-field', [
            'name' => 'name',
            'label' => 'Name',
            'type' => 'text',
            'placeholder' => 'Enter name',
            'required' => 'required'
        ])
      </div>
      <div class="min-w-max ml-4">
        @include('components.form-field', [
            'name' => 'price',
            'label' => 'Price',
            'type' => 'Number',
            'placeholder' => 'Enter Price',
            'required' => 'required'
        ])
      </div>
      <div class="min-w-max ml-4">
        @include('components.form-field', [
            'name' => 'quantity',
            'label' => 'Quantity',
            'type' => 'number',
            'placeholder' => 'Quantity',
            'required' => 'required'
        ])
      </div>
    </div>
    <div class="flex">
      @include('components.wire-loading-btn')
      <button wire:click="addNewItem" type="button" class="ml-5 cancel-btn">Cancel</button>
    </div>   
  </form>
  @else
  <button wire:click="addNewItem"  class="mt-4 mb-4 lms-btn-2">Add New</button>
  @endif
  
  <h3 class="font-bold text-lg mb-2">Payments</h3>
    <ul class="mb-4">
        @foreach($invoice->payments as $payment)
        <li class="flex justify-between border bg-gray-200">
          <span class="m-3">
          {{date('F j, Y - g:i:a', strtotime($payment->created_at))}} - ${{number_format($payment->amount, 2)}} - transaction ID: {{$payment->transaction_id}} 
          </span>
          <button wire:click="refund({{$payment->id}})" class="text-xs cancel-btn m-2">Refund</button>
        </li>
       
        @endforeach
    </ul>
</div>

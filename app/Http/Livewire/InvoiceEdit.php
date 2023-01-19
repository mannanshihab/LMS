<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use Livewire\Component;

class InvoiceEdit extends Component
{

    public $invoice_id;
    public $name;
    public $price;
    public $quantity;
    public $invoice;
    
    public $enableAddItem = false;

    public function mount(){
        $this->invoice = Invoice::findOrFail($this->invoice_id);
    }

    public function render()
    {
        return view('livewire.invoice-edit');
    }

    public function addNewItem(){
        $this->enableAddItem = !$this->enableAddItem;
    }

    public function saveNewItem(){
        InvoiceItem::create([
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'invoice_id' => $this->invoice_id,
        ]);

        // reset field
        $this->name =" ";
        $this->price =" ";
        $this->quantity =" ";

        flash()->addSuccess('Add Success');
        return redirect(route('invoice-show', $this->invoice_id));
    }

    public function invoiceItemDelete($id){

        $item = InvoiceItem::findOrFail($id);
        $item->delete();
        flash()->addSuccess('Item Delete Success');
        return redirect(route('invoice-show', $this->invoice_id));
    }

}

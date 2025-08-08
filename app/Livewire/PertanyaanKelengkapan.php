<?php

namespace App\Livewire;

use App\Models\PertanyaanKelengkapan as ModelsPertanyaanKelengkapan;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PertanyaanKelengkapan extends Component
{
    public $questions;
    public $parents;
    public $orders = [1];

    #[Validate('required')]
    public $question;
    public $id_parent;
    #[Validate('required')]
    public $order = 1;

    public $listeners = ['updateOrder', 'closeModal'];

    public function render()
    {
        $this->questions = ModelsPertanyaanKelengkapan::with(['children' => function($query) {$query->orderBy('order');}])->where('id_parent', null)->orderBy('order')->get();
        $this->parents = ModelsPertanyaanKelengkapan::where('id_parent', null)->orderBy('order')->get();
        return view('livewire.pertanyaan-kelengkapan');
    }

    #[On('updateOrder')]
    public function updateOrder(){
        // hitung jumlah record yang sudah ada untuk id_parent ini
        $countOrder = ModelsPertanyaanKelengkapan::where('id_parent', $this->id_parent)->count();

        // total urutan = jumlah record saat ini + 1 (untuk baris baru)
        $total = max(1, $countOrder + 1);

        // set orders menjadi [1,2,3,...,$total]
        $this->orders = range(1, $total);

        $this->order = $this->orders[$total - 1] ?? null;
    }

    public function store(){
        $this->validate();

        ModelsPertanyaanKelengkapan::create([
            'question' => $this->question,
            'id_parent' => $this->id_parent,
            'order' => $this->order,
        ]);

        $this->reset(['question', 'id_parent', 'order']);
        $this->dispatch('closeModal');
    }
}

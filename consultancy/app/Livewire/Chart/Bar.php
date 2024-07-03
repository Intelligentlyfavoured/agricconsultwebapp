<?php

namespace App\Livewire\Chart;

use Livewire\Component;

class Bar extends Component
{
    public $data;

    public function mount()
    {
        $this->data = $this->barChart();
    }

    
    public function barChart()
    {
        // Adjusted dummy data to reflect consultancy in farming
        $grainFarmersCount = 120;
        $vegetableFarmersCount = 200;
        $fruitFarmersCount = 150;
        $dairyFarmersCount = 80;
    
        // Prepare the data for the chart
        $data = [
            'labels' => ['Grain Farmers', 'Vegetable Farmers', 'Fruit Farmers', 'Dairy Farmers'],
            'data' => [$grainFarmersCount, $vegetableFarmersCount, $fruitFarmersCount, $dairyFarmersCount],
        ];
    
        return $data;
    }

    public function render()
    {
        return view('livewire.chart.bar', [
            'data' => $this->data,
        ]);
    }
}

<?php

namespace App\Http\ViewComposer;

use Illuminate\View\View;

class AreaComposer
{
  private $area;
  public function compose(View $view)
  {
    //US in config
    if (!$this->area){
      $this->area = \App\Area::where('slug', session()->get('area', config()->get('classifieds.defaults.area')))->first();
    }
  return $view->with('area', $this->area);
  }
}

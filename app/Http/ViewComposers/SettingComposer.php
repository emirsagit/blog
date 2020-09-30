<?php

namespace App\Http\ViewComposers;


use App\Models\Setting;
use Illuminate\View\View;


class SettingComposer
{
    //birden fazla query sorgusu yapmamak için bu yöntemi kullandık.
    private $_setting;
    public function compose(View $view)
    {
        if (!$this->_setting) {
          $this->_setting = Setting::first();
        }
        return $view->with([
            'setting' => $this->_setting,
    ]);
    }
}

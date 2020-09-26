<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;


class UnreadNotificationComposer
{
    //birden fazla query sorgusu yapmamak için bu yöntemi kullandık.
    private $_unreadNotifications;
    public function compose(View $view)
    {
        if ($user = auth()->user()) {
            if (!$this->_unreadNotifications) {
                $this->_unreadNotifications = $user->unreadNotifications;
            }
            return $view->with([
                'unreadNotifications' => $this->_unreadNotifications,
            ]);
        }
    }
}

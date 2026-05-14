<?php
 
namespace App\Http\View\Composers;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
class NotificationComposer
{
    /**
     * Create a new profile composer.
     */
    public function __construct(
       
    ) {}
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $current = Carbon::now();
        Carbon::setLocale('vi');
        $notification = null;
        if(Auth::user()) {
            $user = Auth::user();
            $notification = Notification::where('user_id', $user->id)->orderByDesc('created_at')->where('status', 0)->get();
        }
        
        $view->with(compact('notification', 'current'));
    }
}
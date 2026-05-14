<?php
 
namespace App\Http\View\Composers;

use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\menu;
class MenusComposer
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
        $menus = menu::where('parent_id',0)->get();
        $allMenus = menu::pluck('name','id')->all();
        $view->with(compact('menus', 'allMenus'));
    }
}
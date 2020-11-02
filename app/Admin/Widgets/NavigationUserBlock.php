<?php
namespace App\Admin\Widgets;

use App\Models\Language;
use SleepingOwl\Admin\Widgets\Widget;

class NavigationUserBlock extends Widget
{
    /**
     * Get content as a string of HTML.
     *
     * @return string
     */
    public function toHtml()
    {
        $languages = \Cache::remember('languages', 3600, function () {
            return Language::all();
        });

        return view('admin.auth.navbar', [
            'languages' => $languages
        ])->render();
    }
    /**
     * @return string|array
     */
    public function template()
    {
        return \AdminTemplate::getViewPath('_partials.header');
    }
    /**
     * @return string
     */
    public function block()
    {
        return 'navbar.right';
    }
}

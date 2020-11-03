<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;

class AdminController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return mixed
     */
    public function setLanguage($id)
    {
        $language = Language::find($id);

        if ($language) {
            \Cache::forget('lang_' . auth()->user()->id);

            auth()->user()->language_id = $language->id;
            auth()->user()->save();
        }

        return redirect()->back();
    }
}

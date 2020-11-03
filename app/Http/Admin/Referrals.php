<?php

namespace App\Http\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use KodiCMS\Assets\Facades\Meta;
use SleepingOwl\Admin\Contracts\Initializable;
use SleepingOwl\Admin\Section;
use AdminDisplay;
use AdminColumn;

/**
 * Class Referrals
 *
 * @property \App\Models\User $model
 *
 * @see https://sleepingowladmin.ru/#/ru/model_configuration_section
 */
class Referrals extends Section implements Initializable
{
    /**
     * @var bool
     */
    protected $checkAccess = false;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $alias = 'referrals';

    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->addToNavigation()->setPriority(2)->setIcon('fa fa-user');
    }

    public function getTitle()
    {
        return __('sleeping_owl::lang.referrals');
    }

    public function onDisplay($payload = [])
    {
//        $table = AdminDisplay::tree('SleepingOwl\Admin\Display\Tree\SimpleTreeType')
//            ->setValue('email')
//            ->setParentField('referred_id')
//            ->setRootParentId(auth()->user()->id)
//            ->setMaxDepth(5)
//            ->setReorderable(false);
//
//        return $table;

        Meta::addCss( 'test', 'css/test.css' );
        Meta::addJs( 'test', 'js/test.js' );

        $id = auth()->user()->id;
        $refers = User::with(['referrals'])->where('referred_id', $id)->get();

        return view('referer', compact('id', 'refers'));
    }

    /**
     * @return bool
     */
    public function isDeletable(Model $model)
    {
        return false;
    }
}

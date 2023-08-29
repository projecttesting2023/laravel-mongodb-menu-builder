<?php

namespace Harimayco\Menu\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Menus extends Model
{
    protected $collection = 'menus';

    public function __construct(array $attributes = [])
    {
        //parent::construct( $attributes );
        $this->collection = config('menu.table_prefix') . config('menu.table_name_menus');
    }

    public static function byName($name)
    {
        return self::where('name', '=', $name)->first();
    }

    public function items()
    {
        return $this->hasMany('Harimayco\Menu\Models\MenuItems', 'menu')->with('child')->where('parent', 0)->orderBy('sort', 'ASC');
    }
}

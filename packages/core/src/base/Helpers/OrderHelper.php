<?php
namespace QH\Core\base\Helpers;
class OrderHelper{
    public static function active($active): string
    {
        return $active === 'pending' ? '<span class="btn btn-warning btn-xs">Pending</span>'
            : '<span class="btn btn-success btn-xs">Finished</span>';
    }
}

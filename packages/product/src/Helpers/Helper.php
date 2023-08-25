<?php

namespace QH\Product\Helpers;

class Helper{
    public static function active($active): string
    {
        return ($active === 'pending') ? '<span class="btn btn-warning btn-xs">Pending</span>'
            : ($active === 'shipped' ? '<span class="btn btn-success btn-xs">Shipped</span>'
                : '<span class="btn btn-info btn-xs">Delivered</span>');
    }
        public static function status($status): string
    {
        return $status === 'inactive' ? '<span class="btn btn-warning btn-xs">Inactive</span>'
            : '<span class="btn btn-success btn-xs">Active</span>';
    }
}

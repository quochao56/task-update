<?php

namespace QH\Customer\Helpers;

class Helper{
    public static function status($status): string
    {
        return ($status === 'pending') ? '<span class="btn btn-warning btn-xs">Pending</span>'
            : ($status === 'shipped' ? '<span class="btn btn-success btn-xs">Shipped</span>'
                : '<span class="btn btn-info btn-xs">Delivered</span>');
    }
}

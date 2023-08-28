<?php

namespace QH\Customer\Helpers;

class Helper{
    public static function status($status): string
    {
        switch ($status) {
            case 'pending':
                $statusHtml = '<span class="btn btn-warning btn-xs">Pending</span>';
                break;
            case 'shipped':
                $statusHtml = '<span class="btn btn-success btn-xs">Shipped</span>';
                break;
            case 'canceled':
                $statusHtml = '<span class="btn btn-danger btn-xs">Canceled</span>';
                break;
            case 'delivered':
                $statusHtml = '<span class="btn btn-info btn-xs">Delivered</span>';
                break;
            default:
                $statusHtml = '';
        }
        return $statusHtml;

    }
}

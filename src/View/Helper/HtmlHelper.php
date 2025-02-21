<?php

namespace SweetAlertHelper\View\Helper;

use Cake\View\Helper\HtmlHelper as BaseHelper;
use Cake\View\View;

class HtmlHelper extends BaseHelper
{
    public function __construct(View $view, array $config = [])
    {
        parent::__construct($view, $config);
    }

    protected function _confirm(string $message, string $okCode, string $cancelCode = '', array $options = []): string
    {
        $swal = [
            'text' => $message,
            'showCancelButton' => true,
            'dangerMode' => true,
            'icon' => 'error' // Changed 'type' to 'icon' for CakePHP 5.x
        ];
        $confirm = "(function(e,obj){ e.preventDefault(); e.stopPropagation(); swal.fire(" . json_encode($swal) . ").then(function(res){ if(res.isConfirmed){ window.location.href = obj.getAttribute('href'); } }); })(event,this)";

        $escape = $options['escape'] ?? true;
        if ($escape === false) {
            $confirm = h($confirm);
        }

        return $confirm;
    }
}

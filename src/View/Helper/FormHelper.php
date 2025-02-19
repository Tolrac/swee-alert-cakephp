<?php

namespace SweetAlertHelper\View\Helper;

use Cake\View\Helper\FormHelper as BaseHelper;
use Cake\View\View;
use Cake\Utility\Hash;

class FormHelper extends BaseHelper
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
        $confirm = "(function(e,obj){ e.preventDefault(); e.stopPropagation(); swal(" . json_encode($swal) . ").then(function(res){ if(res.isConfirmed){ " . $okCode . " } }); })(event,this)";

        $escape = $options['escape'] ?? true;
        if ($escape === false) {
            $confirm = h($confirm);
        }

        return $confirm;
    }

    public function postLink(string $title, $url = null, array $options = []): string
    {
        $options += ['block' => null, 'confirm' => null];

        $requestMethod = 'POST';
        if (!empty($options['method'])) {
            $requestMethod = strtoupper($options['method']);
            unset($options['method']);
        }

        $confirmMessage = $options['confirm'] ?? null;
        unset($options['confirm']);

        $formName = str_replace('.', '', uniqid('post_', true));
        $formOptions = [
            'name' => $formName,
            'style' => 'display:none;',
            'method' => 'post',
        ];
        if (isset($options['target'])) {
            $formOptions['target'] = $options['target'];
            unset($options['target']);
        }
        $templater = $this->templater();

        $restoreAction = $this->_lastAction;
        $this->_lastAction($url);

        $action = $templater->formatAttributes(
            [
                'action' => $this->Url->build($url),
                'escape' => false
            ]
        );

        $out = $this->formatTemplate(
            'formStart',
            [
                'attrs' => $templater->formatAttributes($formOptions) . $action
            ]
        );
        $out .= $this->hidden(
            '_method',
            [
                'value' => $requestMethod,
                'secure' => static::SECURE_SKIP
            ]
        );
        $out .= $this->_csrfField();

        $fields = [];
        if (isset($options['data']) && is_array($options['data'])) {
            foreach (Hash::flatten($options['data']) as $key => $value) {
                $fields[$key] = $value;
                $out .= $this->hidden($key, ['value' => $value, 'secure' => static::SECURE_SKIP]);
            }
            unset($options['data']);
        }
        $out .= $this->secure($fields);
        $out .= $this->formatTemplate('formEnd', []);
        $this->_lastAction = $restoreAction;

        if ($options['block']) {
            if ($options['block'] === true) {
                $options['block'] = __FUNCTION__;
            }
            $this->getView()->append($options['block'], $out);
            $out = '';
        }
        unset($options['block']);

        $url = '#';
        $onClick = 'document.' . $formName . '.submit();';
        if ($confirmMessage) {
            $options['onclick'] = $this->_confirm($confirmMessage, $onClick, '', $options);
        } else {
            $options['onclick'] = $onClick . ' ';
        }

        $out .= $this->Html->link($title, $url, $options);

        return $out;
    }
}

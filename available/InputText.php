<?php
namespace Field;

class InputText
{
    private $fieldService;

    public function __construct($fieldService)
    {
        $this->fieldService = $fieldService;
    }

    public function render($field, $document, $formObject)
    {
        if (isset($field['uneditable'])) {
            $field['attributes']['disabled'] = 'disabled';
            $this->fieldService->addClass($field['attributes'], 'uneditable-input');
        }
        if (isset($field['data'])) {
            $field['attributes']['value'] = $field['data'];
        }
        $field['attributes']['type'] = 'text';
        if (isset($field['placeholder'])) {
            $field['attributes']['placeholder'] = $field['placeholder'];
        }
        $field['attributes']['name'] = $field['marker'].'['.$field['name'].']';

        return $this->fieldService->tag($field, 'input', $field['attributes']);
    }
}

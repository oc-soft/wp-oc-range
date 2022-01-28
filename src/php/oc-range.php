<?php

/**
 *  customize range control
 */
class OC_Range extends WP_Customize_Control {

    /**
     * input type
     */
    public $type = '<%= controlType %>';

    /**
     * data list for range input
     */
    public $datalist = [];

    /**
     * json for control
     */
    public function to_json() {
        parent::to_json();
        $this->json['id'] = $this->id;
        $this->json['inputAttrs'] = $this->input_attrs; 
        $value = $this->value();
        if (!empty($value)) {
            $this->json['inputAttrs']['value'] = $value;
        }

        if (isset($this->datalist)
            && is_array($this->datalist)
            && !empty($this->datalist)) {
            $this->json['datalist'] = $this->datalist;
        }
    }
    
    /**
     * output template for wp template engine
     */
    public function content_template() {
?>
<#
const inputId = `_customize-input-${data.id}` 
const descId = `_customize-description-${data.id}`
let datalistId = undefined
let rangeAttr = Object.keys(data.inputAttrs).map(
    function(key) {
        return `${key}="${data.inputAttrs[key]}"`
    }).join(' ')
if (Array.isArray(data.datalist)) {
    datalistId = `_customize-input-datalist-${data.id}`
    rangeAttr = `${rangeAttr} list="${datalistId}"`
}
if (data.label) { #>
<label for="{{inputId}}" class="customize-control-title">{{{data.label}}}</label>  
<# } 
if (data.description) {
    rangeAttr=`${rangeAttr} aria-describedby="${descId}"`
#>
<span id="{{descId}}"
  class="description customize-control-description">{{data.description}}</span>
<#
}
#>
<input id="{{inputId}}" type="range" 
    class="customize-control"
    data-customize-setting-key-link="default"
    {{{rangeAttr}}}>
<#
if (datalistId != void 0) {
#>
<datalist id="{{datalistId}}">
<#
    data.datalist.forEach(function(elem) {
        if (elem.value != void 0) {
            let label = ''
            if (typeof elem.label) {
                label=`label="${elem.label}"`
            }
#>
<option value={{elem.value}} {{{label}}}>
<#
        }
    })
#>
</datalist>
<#
}
#>
<?php
    }
}

// vi: se ts=4 sw=4 et:

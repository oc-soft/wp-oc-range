import wp from 'wp'
import controlType from 'control-type'

const api = wp.customize
api.controlConstructor[controlType] = api.Control


// vi: se ts=2 sw=2 et:

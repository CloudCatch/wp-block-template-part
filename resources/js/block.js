import TemplatePartEdit from './edit';

( function ( blocks, element, blockEditor, coreData, components, i18n ) {
	const 
		RawHTML = element.RawHTML,
		registerBlockType = blocks.registerBlockType,
		useBlockProps = blockEditor.useBlockProps,
		useEntityProp = coreData.useEntityProp,
		InspectorControls = blockEditor.InspectorControls,
		SelectControl = components.SelectControl,
		PanelBody = components.PanelBody,
		__ = i18n.__;

	const icon = <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.8 5.9H6.2C5 5.9 4 6.9 4 8.1v8.7C4 18 5 19 6.2 19h12.6c1.2 0 2.2-1 2.2-2.2V8.1c0-1.2-1-2.2-2.2-2.2zm-13.3 11v-6.1h3.6v6.9H6.2c-.4-.1-.7-.4-.7-.8zm13.3.7h-8.2v-6.9h9v6.1c-.1.5-.4.8-.8.8z"/></svg>

	registerBlockType( 'swc/template-part', {
		apiVersion: 2,
		title     : 'Template Part',
		icon      : icon,
		category  : 'design',
		example   : {},
		edit      : TemplatePartEdit,
	} );
} )( 
	window.wp.blocks,
	window.wp.element,
	window.wp.blockEditor,
	window.wp.coreData,
	window.wp.components,
	window.wp.i18n
);

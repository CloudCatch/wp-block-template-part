/**
 * WordPress dependencies
 */
const {useState, RawHTML, useEffect, useRef} = wp.element;

const {
	PanelBody,
	Placeholder,
	Spinner,
	SelectControl,
} = wp.components;

const {__} = wp.i18n;
const {
	InspectorControls,
	useBlockProps
} = wp.blockEditor;

export default function TemplatePartEdit( props ) {
	const { 
		attributes: {templatePart}, 
		setAttributes,
	} = props;

	const blockProps = useBlockProps();

	const selectTemplatePart = ( val ) => {
		setAttributes( {templatePart: val} );
	};

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Template Part Settings' ) }>
					{ wpbtp.templateParts && (
						<SelectControl
							label={ __( 'Template Part' ) }
							value={ templatePart }
							onChange={ selectTemplatePart }
							options={ [
								{value: null, label: __( 'Default' )},
								...
								Object.values( wpbtp.templateParts ).map(
									( item ) => {
										return {
											label: item.name,
											value: item.slug,
										};
									}
								)] }
						/>
					) }
				</PanelBody>
			</InspectorControls>
			<div { ...blockProps }>
				<p>{ __( 'Rendered template part unavailable in the editor' ) }</p>
			</div>
		</>
	);
}

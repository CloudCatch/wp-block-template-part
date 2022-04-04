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

const ServerSideRender = wp.serverSideRender;

export default function TemplatePartEdit( props ) {
	const {
		attributes,
		setAttributes,
		context
	} = props;

	const {
		templatePart
	} = attributes;

	const {
		postId
	} = context;

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
				{ ! templatePart && (
					<p>
						{ __( 'Please select a template part' ) }
					</p>
				) }
				{ templatePart && (
					<ServerSideRender
						block="wpbtp/template-part"
						attributes={ attributes }
						urlQueryArgs={ {postId: postId} }
					/>
				) }
			</div>
		</>
	);
}

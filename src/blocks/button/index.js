import { addFilter } from "@wordpress/hooks";
import { createHigherOrderComponent } from "@wordpress/compose";
import { TextControl, SelectControl, PanelBody } from "@wordpress/components";
import { Fragment } from "@wordpress/element";
import { InspectorControls } from "@wordpress/block-editor";

const enableToolbarButtonOnBlocks = ["core/button"];

function extendAttributes(settings, name) {
	if (!enableToolbarButtonOnBlocks.includes(name)) {
		return settings;
	}

	return Object.assign({}, settings, {
		attributes: Object.assign({}, settings.attributes, {
			checkoutUrl: {
				type: "string",
				default: "",
			},
			behavior: {
				type: "string",
				default: "",
			},
		}),
	});
}

addFilter(
	"blocks.registerBlockType",
	"checkoutpage/custom-attributes",
	extendAttributes
);

const extendControls = createHigherOrderComponent((BlockEdit) => {
	return (props) => {
		// If current block is not allowed
		if (!enableToolbarButtonOnBlocks.includes(props.name)) {
			return <BlockEdit {...props} />;
		}

		const { attributes, setAttributes } = props;

		// set default behavior if behavior is not set
		if (!attributes.behavior) {
			setAttributes({ behavior: "popup" });
		}

		return (
			<Fragment>
				<BlockEdit {...props} />

				<InspectorControls>
					<PanelBody title="Checkout Page" initialOpen={false}>
						<TextControl
							label={
								<div style={{ marginBottom: "-8px", fontWeight: "bold" }}>
									Checkout link
								</div>
							}
							value={attributes.checkoutUrl}
							onChange={(value) => setAttributes({ checkoutUrl: value })}
							help={
								<div>
									Paste your checkout's payment link here.{" "}
									<a href="https://checkoutpage.co/help/wordpress-plugin">
										Learn more
									</a>
								</div>
							}
						/>

						<SelectControl
							label={<div style={{ fontWeight: "bold" }}>Button action</div>}
							value={attributes.behavior}
							options={[
								{ label: "Open checkout pop up", value: "popup" },
								{ label: "Open checkout in new tab", value: "link" },
							]}
							onChange={(value) => setAttributes({ behavior: value })}
						/>
					</PanelBody>
				</InspectorControls>
			</Fragment>
		);
	};
}, "extendControls");

addFilter(
	"editor.BlockEdit",
	"checkoutpage/custom-advanced-control",
	extendControls
);

const saveExtendedOptions = (extraProps, blockType, attributes) => {
	if (enableToolbarButtonOnBlocks.includes(blockType.name)) {
		const { checkoutUrl, behavior } = attributes;

		extraProps.checkoutUrl = checkoutUrl;
		extraProps.behavior = behavior;
	}

	return extraProps;
};

wp.hooks.addFilter(
	"blocks.getSaveContent.extraProps",
	"checkoutpage/save-extended-options",
	saveExtendedOptions
);

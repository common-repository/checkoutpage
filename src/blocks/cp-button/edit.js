import cpLogo from "../../images/logo.svg";

import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import { View } from "@wordpress/primitives";

import {
	TextControl,
	SelectControl,
	Placeholder,
	ExternalLink,
} from "@wordpress/components";

import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	// set default behavior if behavior is not set
	if (!attributes.behavior) {
		setAttributes({ behavior: "popup" });
	}

	return (
		<View {...useBlockProps()}>
			<Placeholder
				icon={() => <img src={cpLogo} className="cp-logo" />}
				label="Checkout Page"
				instructions="Add a buy button to your posts & pages."
			>
				<div style={{ width: "100%" }}>
					<div style={{ marginBottom: "1rem", width: "100%" }}>
						<TextControl
							label="Checkout link"
							value={attributes.checkoutUrl}
							onChange={(value) => setAttributes({ checkoutUrl: value })}
						/>
						Paste your checkout's payment link here.{" "}
						<ExternalLink href="https://checkoutpage.co/help/wordpress-plugin">
							Learn more
						</ExternalLink>
					</div>

					<div style={{ marginBottom: "1rem" }}>
						<TextControl
							label="Button text"
							value={attributes.buttonText}
							onChange={(value) => setAttributes({ buttonText: value })}
						/>
					</div>

					<div>
						<SelectControl
							label="Button action"
							value={attributes.behavior}
							options={[
								{ label: "Open checkout pop up", value: "popup" },
								{ label: "Open checkout in new tab", value: "link" },
							]}
							onChange={(value) => setAttributes({ behavior: value })}
						/>
					</div>
				</div>
			</Placeholder>
		</View>
	);
}

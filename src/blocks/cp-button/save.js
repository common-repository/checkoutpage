import { __ } from "@wordpress/i18n";

export default function save({ attributes }) {
	const { checkoutUrl, behavior, buttonText } = attributes;

	if (behavior === "popup") {
		return (
			<div className="wp-block-buttons">
				<div className="wp-block-button">
					<a className="cp-button wp-block-button__link" href={checkoutUrl}>
						{buttonText}
					</a>
				</div>
			</div>
		);
	}

	return (
		<div className="wp-block-buttons">
			<div className="wp-block-button">
				<a className="wp-block-button__link" href={checkoutUrl} target="_blank">
					{buttonText}
				</a>
			</div>
		</div>
	);
}

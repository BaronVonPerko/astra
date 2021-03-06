import PropTypes from 'prop-types';
import { Component } from '@wordpress/element';

class CustomizerLinkComponent extends Component {

	constructor( props ) {

		super( props );

		this.onLinkClick = this.onLinkClick.bind(this);
	}

	onLinkClick() {

		const {
			linked,
			link_type,
		} = this.props.control.params

		switch ( link_type ) {

			case 'section':
				var section = wp.customize.section( linked );
				section.expand();
				break;

			case 'control':
				wp.customize.control( linked ).focus();
				break;

			default:
				break;
		}
	}

	render() {

		const {
			linked,
			link_text,
			link_type,
		} = this.props.control.params

		let linkHtml = null;

		if ( linked && link_text ) {

			linkHtml = (
				<a href="#" onClick= { () => { this.onLinkClick() } } className="customizer-link" data-customizer-linked={ linked } data-ast-customizer-link-type={ link_type } dangerouslySetInnerHTML={ { __html: link_text } } >
				</a>
			);

		}

		return (
			<>
				{ linkHtml }
			</>
		);
	}
}

CustomizerLinkComponent.propTypes = {
	control: PropTypes.object.isRequired
};

export default CustomizerLinkComponent;

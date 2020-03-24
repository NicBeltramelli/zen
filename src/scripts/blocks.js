/* Gutenberg Blocks JS entry point */

// CSS
import './../styles/editor.scss';

// JS
wp.domReady( () => {

	// Remove buttons styles
	wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'circular' );
	wp.blocks.unregisterBlockStyle( 'core/button', '3d' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'shadow' );

	// Add custom buttons styles
	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'default',
		label: 'Default',
		isDefault: true,
	});

	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'outline',
		label: 'Outline',
	} );

	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'small',
		label: 'Small',
	});

	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'small-outline',
		label: 'Small Outline',
	} );

	// Add custom separator style
	wp.blocks.registerBlockStyle( 'core/separator', {
		name: 'empty',
		label: 'Empty',
	});

} );

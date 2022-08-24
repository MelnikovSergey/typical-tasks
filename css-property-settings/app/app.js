new Vue({
	el: '#app',

	data() {
		return {
			fontFamily: 'sans',
			fontSize: null,
			colorScheme: 'auto',
			appFontSize: null };
		},
	
	watch: {
		fontFamily(newFamily) {
			document.body.style.setProperty(
				'--font-family-base',
				`var(--font-family-${newFamily}`);
			},
	
			fontSize(newSize) {
				document.documentElement.style.setProperty(
				'--font-size-root',
				`${newSize / this.appFontSize}em`);
			},
	
			colorScheme(newScheme, oldScheme) {
	
				if (newScheme !== 'auto') {
					document.documentElement.classList.add(`scheme-${newScheme}`);
	 			}
	
				document.documentElement.classList.remove(`scheme-${oldScheme}`);
			} 
		},
	
		created() {
			const { fontSize } = window.getComputedStyle(document.documentElement);
			this.appFontSize = parseInt(fontSize, 10);
			this.fontSize = this.appFontSize;
		}
});
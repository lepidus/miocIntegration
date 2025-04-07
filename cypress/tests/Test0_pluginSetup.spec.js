
describe('Plugin configuration', function () {
	it('Configures plugin', function() {
		cy.login('dbarnes', null, 'publicknowledge');
		cy.contains('a', 'Website').click();

		cy.waitJQuery();
		cy.get('#plugins-button').click();

		cy.get('input[id^=select-cell-miocintegrationplugin]').check();
		cy.get('input[id^=select-cell-miocintegrationplugin]').should('be.checked');
	});
});

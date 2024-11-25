describe("Nombre que tendrá el set de pruebas", () => {
    it('Login Correcto', () =>  {
        cy.visit('https://www.saucedemo.com/');
        cy.get('input_error form_input').type('standard_user');
        cy.get('input_error form_input').type('secret_sauce');
        cy.get('submit-button btn_action').click();
        cy.get('inventory_item_name').click();
        cy.get('inventory_details_name large_size').should('contain', 'Sauce Labs Backpack');
        cy.get('inventory_details_desc large_size').should('contain', 'carry.allTheThings() with the sleek, streamlined Sly Pack that melds uncompromising style with unequaled laptop and tablet protection.');
        cy.get('btn btn_primary btn_small btn_inventory').should('contain', 'Add to cart');
      })
  })
describe ("Pruebas examen", ()=>{

    it("Ver los detalles de un producto de compra", ()=>{
        cy.visit("https://saucedemo.com");
        cy.get('[data-test="username"]').type("standard_user");
        cy.get('[data-test="password"]').type("secret_sauce");
        cy.get('[data-test="login-button"]').click();
        cy.wait(1000);
        cy.get('[data-test="item-4-title-link"] > [data-test="inventory-item-name"]').click();
        cy.wait(1000);
        cy.get('[data-test="inventory-item-name"]').should('have.text', "Sauce Labs Backpack");
        cy.get('[data-test="inventory-item-desc"]').should('have.text', "carry.allTheThings() with the sleek, streamlined Sly Pack that melds uncompromising style with unequaled laptop and tablet protection.");      
        cy.get('[data-test="inventory-item-price"]').should('have.text', "$29.99");
        cy.get('[data-test="add-to-cart"]').should('have.text', "Add to cart");
    });

});
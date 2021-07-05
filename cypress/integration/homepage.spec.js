/// <references types="cypress" />

describe("Carga la página principal", () => {
    it("Prueba el header de la página principal", function () {
        cy.visit("/");

        cy.get('[data-cy="heading-sitio"]').should("exist");
        cy.get('[data-cy="heading-sitio"]')
            .invoke("text")
            .should(
                "equal",
                "Venta de Casas y Departamentos Exclusivos de Lujo"
            );

        cy.get('[data-cy="heading-sitio"]')
            .invoke("text")
            .should("not.equal", "Bienes Raices");
    });

    it("Prueba el bloque de los iconos principales", function () {
        cy.visit("/");

        cy.get('[data-cy="heading-nosotros"]').should("exist");
        cy.get('[data-cy="heading-nosotros"]')
            .should("have.prop", "tagName")
            .should("equal", "H2");

        // Verifica que exista la seccion de iconos y que sean 3 los div existentes.
        cy.get('[data-cy="iconos-nosotros"]').should("exist");
        cy.get('[data-cy="iconos-nosotros"]')
            .find(".icono")
            .should("have.length", 3);
        cy.get('[data-cy="iconos-nosotros"]')
            .find(".icono")
            .should("not.have.length", 4);
    });
});

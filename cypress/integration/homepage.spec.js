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
});

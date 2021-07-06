/// <reference types="cypress" />

describe("Probar la autenticación", () => {
    it("Prueba la autenticación en /login", () => {
        cy.visit("/login");

        cy.get('[data-cy="heading-login"]').should("exist");
        cy.get('[data-cy="heading-login"]').should(
            "have.text",
            "Iniciar Sesión"
        );

        // Verificando que ambos campos sean obligatorios
        cy.get('[data-cy="formulario-login"]').should("exist");
        cy.get('[data-cy="formulario-login"]').submit();

        cy.get('[data-cy="alerta-login"]').should("exist");
        cy.get('[data-cy="alerta-login"]')
            .eq(0)
            .should("have.class", "alert")
            .and("have.class", "error");
        cy.get('[data-cy="alerta-login"]')
            .eq(0)
            .should("have.text", "El email es obligatorio");

        cy.get('[data-cy="alerta-login"]')
            .eq(1)
            .should("have.class", "alert")
            .and("have.class", "error");
        cy.get('[data-cy="alerta-login"]')
            .eq(1)
            .should("have.text", "El password es obligatorio");
    });
});

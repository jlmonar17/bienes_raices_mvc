/// <references types="cypress" />

describe("Hola mundo", () => {
    it("Prueba 1", () => {
        cy.visit("http://localhost:5000/");
    });

    it("Prueba 2", () => {
        console.log("Prueba 2 ejecutada.");
    });

    it("Prueba 3", () => {
        console.log("Prueba 3 ejecutada.");
    });

    it("Prueba 4", () => {
        console.log("Prueba 4 ejecutada.");
    });
});

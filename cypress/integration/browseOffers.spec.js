describe("Browse offers", () => {
  before(() => {
    cy.visit("/");
  });

  it("Browses offers", () => {
    cy.get('[data-test-id="searchShort"]').click({ force: true });
    cy.url().should("include", "/offers.php?");
  });
});

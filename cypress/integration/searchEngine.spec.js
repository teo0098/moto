describe("Search engine", () => {
  before(() => {
    cy.visit("/");
  });

  it("Searches for offers", () => {
    cy.get("input[name=brand]").clear({ force: true }).type("Audi");
    cy.get("input[name=model]").clear({ force: true }).type("A8");
    cy.get("input[name=runFrom]").clear({ force: true }).type("90000");
    cy.get("input[name=runTo]").clear({ force: true }).type("200000");
    cy.get("input[name=priceFrom]").clear({ force: true }).type("50000");
    cy.get("input[name=priceTo]").clear({ force: true }).type("115000");
    cy.get("input[name=production_year]").clear({ force: true }).type("2010");
    cy.get("select[name=fuel]").select("Benzyna", { force: true });
    cy.get('[data-test-id="searchShort"]').click({ force: true });
    cy.url().should(
      "include",
      "/offers.php?brand=Audi&model=A8&runFrom=90000&runTo=200000&priceFrom=50000&priceTo=115000&production_year=2010&fuel=1"
    );
  });
});

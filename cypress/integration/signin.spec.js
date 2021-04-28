describe("Login user into a service", () => {
  before(() => {
    cy.visit("/signin.php");
    cy.scrollTo(0, 0);
    //cy.clearDB() - wlasna funkcja do cypress, ktora wyczysci nam baze przed zalogowaniem
    //cy.registerUser() - stworz konto, na ktore uzytkownik bedzie mogl sie zalogowac
    // login - teodor.tkaczyk98@gmail.com
    // password - haslo123
  });

  it("Wrong credentials", () => {
    cy.get("input[name=email]")
      .clear({ force: true })
      .type("teodor.tkaczyk98@gmail.com");
    cy.get("input[name=password]").clear({ force: true }).type("haslo1234");
    cy.get('button[type="submit"]').click({ force: true });
    cy.get('[data-test-id="error__box"]').should("be.visible");
  });

  it("Successfully logged into a service", () => {
    cy.get("input[name=email]")
      .clear({ force: true })
      .type("teodor.tkaczyk98@gmail.com");
    cy.get("input[name=password]").clear({ force: true }).type("haslo123");
    cy.get('button[type="submit"]').click({ force: true });
    cy.url().should("include", "/index.php");
  });
});
